<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['user_id', 'message', 'type', 'is_read', 'created_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = '';
    protected $deletedField = '';

    // Validation
    protected $validationRules = [
        'user_id' => 'required|integer',
        'message' => 'required|string|max_length[255]',
        'type' => 'permit_empty|string|max_length[50]',
        'is_read' => 'integer|in_list[0,1]',
    ];

    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    /**
     * Get the count of unread notifications for a user
     *
     * @param int $userId
     * @return int
     */
    public function getUnreadCount($userId)
    {
        return $this->where('user_id', $userId)
                    ->where('is_read', 0)
                    ->countAllResults();
    }

    /**
     * Get notifications for a user (latest 5)
     *
     * @param int $userId
     * @return array
     */
    public function getNotificationsForUser($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->limit(5)
                    ->findAll();
    }

    /**
     * Mark a notification as read
     *
     * @param int $notificationId
     * @return bool
     */
    public function markAsRead($notificationId)
    {
        return $this->update($notificationId, ['is_read' => 1]);
    }

    /**
     * Get new notifications since last notification ID
     *
     * @param int $userId
     * @param int $lastNotificationId
     * @return array
     */
    public function getNewNotifications($userId, $lastNotificationId = 0)
    {
        return $this->where('user_id', $userId)
                    ->where('id >', $lastNotificationId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Mark all notifications as read for a user
     *
     * @param int $userId
     * @return bool
     */
    public function markAllAsRead($userId)
    {
        return $this->where('user_id', $userId)
                    ->where('is_read', 0)
                    ->set(['is_read' => 1])
                    ->update();
    }

    /**
     * Get notification history with pagination
     *
     * @param int $userId
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function getNotificationHistory($userId, $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        
        return $this->where('user_id', $userId)
                    ->orderBy('created_at', 'DESC')
                    ->limit($limit, $offset)
                    ->findAll();
    }

    /**
     * Get total number of notifications for a user
     *
     * @param int $userId
     * @return int
     */
    public function getTotalNotifications($userId)
    {
        return $this->where('user_id', $userId)
                    ->countAllResults();
    }

    /**
     * Create a new notification
     *
     * @param int $userId
     * @param string $message
     * @param string $type
     * @return bool|int
     */
    public function createNotification($userId, $message, $type = 'info')
    {
        $data = [
            'user_id' => $userId,
            'message' => $message,
            'type' => $type,
            'is_read' => 0
        ];

        return $this->insert($data);
    }

    /**
     * Get notifications by type
     *
     * @param int $userId
     * @param string $type
     * @param int $limit
     * @return array
     */
    public function getNotificationsByType($userId, $type, $limit = 10)
    {
        return $this->where('user_id', $userId)
                    ->where('type', $type)
                    ->orderBy('created_at', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Delete old notifications (older than specified days)
     *
     * @param int $days
     * @return bool
     */
    public function deleteOldNotifications($days = 30)
    {
        $cutoffDate = date('Y-m-d H:i:s', strtotime("-{$days} days"));
        
        return $this->where('created_at <', $cutoffDate)
                    ->where('is_read', 1)
                    ->delete();
    }
}
