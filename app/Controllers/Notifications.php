<?php

namespace App\Controllers;

use App\Models\NotificationModel;

class Notifications extends BaseController
{
    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
    }

    /**
     * Get notifications for the current user (AJAX endpoint)
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function get()
    {
        // Set JSON response header
        $this->response->setContentType('application/json');

        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to view notifications.'
            ]);
        }

        $userId = session()->get('user_id');

        // Get unread count and notifications
        $unreadCount = $this->notificationModel->getUnreadCount($userId);
        $notifications = $this->notificationModel->getNotificationsForUser($userId);

        return $this->response->setJSON([
            'success' => true,
            'unread_count' => $unreadCount,
            'notifications' => $notifications
        ]);
    }

    /**
     * Mark a notification as read (AJAX endpoint)
     *
     * @param int $notificationId
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function mark_as_read($notificationId)
    {
        // Set JSON response header
        $this->response->setContentType('application/json');

        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to mark notifications as read.'
            ]);
        }

        $userId = session()->get('user_id');

        // Check if notification exists and belongs to the user
        $notification = $this->notificationModel->find($notificationId);
        if (!$notification || $notification['user_id'] != $userId) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Notification not found.'
            ]);
        }

        // Mark as read
        if ($this->notificationModel->markAsRead($notificationId)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Notification marked as read.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to mark notification as read.'
            ]);
        }
    }

    /**
     * Server-Sent Events endpoint for real-time notifications
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function stream()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return $this->response->setStatusCode(401)->setBody('Unauthorized');
        }

        $userId = session()->get('user_id');

        // Set SSE headers
        $this->response->setHeader('Content-Type', 'text/event-stream');
        $this->response->setHeader('Cache-Control', 'no-cache');
        $this->response->setHeader('Connection', 'keep-alive');
        $this->response->setHeader('Access-Control-Allow-Origin', '*');
        $this->response->setHeader('Access-Control-Allow-Headers', 'Cache-Control');

        // Send initial connection event
        $this->sendSSEEvent('connected', ['message' => 'Connected to notification stream']);

        // Keep track of last notification ID to avoid duplicates
        $lastNotificationId = 0;

        // Keep the connection alive and check for new notifications
        while (true) {
            // Check if client disconnected
            if (connection_aborted()) {
                break;
            }

            // Get new notifications since last check
            $newNotifications = $this->notificationModel->getNewNotifications($userId, $lastNotificationId);
            
            foreach ($newNotifications as $notification) {
                $this->sendSSEEvent('notification', [
                    'id' => $notification['id'],
                    'message' => $notification['message'],
                    'type' => $notification['type'] ?? 'info',
                    'created_at' => $notification['created_at'],
                    'is_read' => $notification['is_read']
                ]);
                
                // Update last notification ID
                $lastNotificationId = max($lastNotificationId, $notification['id']);
            }

            // Send heartbeat every 30 seconds
            $this->sendSSEEvent('heartbeat', ['timestamp' => time()]);

            // Sleep for 2 seconds before next check
            sleep(2);
        }

        return $this->response;
    }

    /**
     * Send Server-Sent Event
     *
     * @param string $event
     * @param array $data
     */
    private function sendSSEEvent($event, $data)
    {
        echo "event: {$event}\n";
        echo "data: " . json_encode($data) . "\n\n";
        
        if (ob_get_level()) {
            ob_flush();
        }
        flush();
    }

    /**
     * Mark all notifications as read for current user
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function mark_all_read()
    {
        $this->response->setContentType('application/json');

        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to mark notifications as read.'
            ]);
        }

        $userId = session()->get('user_id');

        if ($this->notificationModel->markAllAsRead($userId)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'All notifications marked as read.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to mark notifications as read.'
            ]);
        }
    }

    /**
     * Get notification history with pagination
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function history()
    {
        $this->response->setContentType('application/json');

        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to view notification history.'
            ]);
        }

        $userId = session()->get('user_id');
        $page = $this->request->getGet('page') ?? 1;
        $limit = $this->request->getGet('limit') ?? 10;

        $notifications = $this->notificationModel->getNotificationHistory($userId, $page, $limit);
        $total = $this->notificationModel->getTotalNotifications($userId);

        return $this->response->setJSON([
            'success' => true,
            'notifications' => $notifications,
            'pagination' => [
                'current_page' => $page,
                'per_page' => $limit,
                'total' => $total,
                'total_pages' => ceil($total / $limit)
            ]
        ]);
    }

    /**
     * Send test notification (for testing purposes)
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */
    public function test()
    {
        $this->response->setContentType('application/json');

        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'You must be logged in to send test notifications.'
            ]);
        }

        $message = $this->request->getPost('message');
        $type = $this->request->getPost('type') ?? 'info';
        $recipient = $this->request->getPost('recipient') ?? 'current';

        if (!$message) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Message is required.'
            ]);
        }

        $notificationService = new \App\Libraries\NotificationService();

        try {
            switch ($recipient) {
                case 'current':
                    $result = $notificationService->sendToUser(session()->get('user_id'), $message, $type);
                    break;
                case 'all':
                    $result = $notificationService->sendAnnouncement($message, $type);
                    break;
                case 'admin':
                    $result = $notificationService->sendToRole('admin', $message, $type);
                    break;
                case 'teacher':
                    $result = $notificationService->sendToRole('teacher', $message, $type);
                    break;
                case 'student':
                    $result = $notificationService->sendToRole('student', $message, $type);
                    break;
                default:
                    $result = $notificationService->sendToUser(session()->get('user_id'), $message, $type);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Test notification sent successfully.',
                'result' => $result
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to send test notification: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Display test page for notifications
     *
     * @return string
     */
    public function test_page()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('notifications/test');
    }
}
