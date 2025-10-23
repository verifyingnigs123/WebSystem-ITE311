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
}
