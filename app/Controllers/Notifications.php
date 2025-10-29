<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotificationModel;

class Notifications extends BaseController
{
    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
    }

    // GET /notifications
    public function get()
    {
        $session = session();
        $userId = $session->get('user_id'); // Make sure your login sets this session key

        if (!$userId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Not logged in']);
        }

        $unreadCount = $this->notificationModel->getUnreadCount($userId);
        $notifications = $this->notificationModel->getNotificationsForUser($userId);

        return $this->response->setJSON([
            'success' => true,
            'unread_count' => $unreadCount,
            'notifications' => $notifications
        ]);
    }

    // POST /notifications/mark_read/{id}
    public function mark_as_read($id = null)
    {
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId || !$id) {
            return $this->response->setJSON(['success' => false]);
        }

        $notif = $this->notificationModel->find($id);

        if (!$notif || $notif['user_id'] != $userId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid notification']);
        }

        $this->notificationModel->markAsRead($id);

        return $this->response->setJSON(['success' => true]);
    }
}
