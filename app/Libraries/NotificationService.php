<?php

namespace App\Libraries;

use App\Models\NotificationModel;

class NotificationService
{
    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
    }

    /**
     * Send notification to a specific user
     *
     * @param int $userId
     * @param string $message
     * @param string $type
     * @return bool|int
     */
    public function sendToUser($userId, $message, $type = 'info')
    {
        return $this->notificationModel->createNotification($userId, $message, $type);
    }

    /**
     * Send notification to multiple users
     *
     * @param array $userIds
     * @param string $message
     * @param string $type
     * @return array
     */
    public function sendToUsers($userIds, $message, $type = 'info')
    {
        $results = [];
        foreach ($userIds as $userId) {
            $results[$userId] = $this->sendToUser($userId, $message, $type);
        }
        return $results;
    }

    /**
     * Send notification to all users with a specific role
     *
     * @param string $role
     * @param string $message
     * @param string $type
     * @return array
     */
    public function sendToRole($role, $message, $type = 'info')
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->where('role', $role)->findAll();
        
        $userIds = array_column($users, 'id');
        return $this->sendToUsers($userIds, $message, $type);
    }

    /**
     * Send course-related notification
     *
     * @param int $courseId
     * @param string $message
     * @param string $type
     * @return array
     */
    public function sendCourseNotification($courseId, $message, $type = 'course')
    {
        $enrollmentModel = new \App\Models\EnrollmentModel();
        $enrollments = $enrollmentModel->where('course_id', $courseId)->findAll();
        
        $userIds = array_column($enrollments, 'user_id');
        return $this->sendToUsers($userIds, $message, $type);
    }

    /**
     * Send announcement notification
     *
     * @param string $message
     * @param string $type
     * @return array
     */
    public function sendAnnouncement($message, $type = 'announcement')
    {
        $userModel = new \App\Models\UserModel();
        $users = $userModel->findAll();
        
        $userIds = array_column($users, 'id');
        return $this->sendToUsers($userIds, $message, $type);
    }

    /**
     * Send material upload notification
     *
     * @param int $courseId
     * @param string $materialName
     * @return array
     */
    public function sendMaterialUploadNotification($courseId, $materialName)
    {
        $message = "New material '{$materialName}' has been uploaded to your course.";
        return $this->sendCourseNotification($courseId, $message, 'material');
    }

    /**
     * Send course enrollment notification
     *
     * @param int $userId
     * @param string $courseName
     * @return bool|int
     */
    public function sendEnrollmentNotification($userId, $courseName)
    {
        $message = "You have been enrolled in the course '{$courseName}'.";
        return $this->sendToUser($userId, $message, 'success');
    }

    /**
     * Send course creation notification to admin
     *
     * @param string $courseName
     * @param string $teacherName
     * @return array
     */
    public function sendCourseCreationNotification($courseName, $teacherName)
    {
        $message = "New course '{$courseName}' has been created by {$teacherName}.";
        return $this->sendToRole('admin', $message, 'course');
    }

    /**
     * Send system maintenance notification
     *
     * @param string $message
     * @return array
     */
    public function sendSystemMaintenanceNotification($message)
    {
        return $this->sendAnnouncement($message, 'warning');
    }

    /**
     * Send welcome notification to new user
     *
     * @param int $userId
     * @param string $userName
     * @return bool|int
     */
    public function sendWelcomeNotification($userId, $userName)
    {
        $message = "Welcome to the system, {$userName}! We're glad to have you here.";
        return $this->sendToUser($userId, $message, 'success');
    }

    /**
     * Send password reset notification
     *
     * @param int $userId
     * @return bool|int
     */
    public function sendPasswordResetNotification($userId)
    {
        $message = "Your password has been successfully reset. Please log in with your new password.";
        return $this->sendToUser($userId, $message, 'info');
    }

    /**
     * Send profile update notification
     *
     * @param int $userId
     * @return bool|int
     */
    public function sendProfileUpdateNotification($userId)
    {
        $message = "Your profile has been successfully updated.";
        return $this->sendToUser($userId, $message, 'success');
    }

    /**
     * Send course completion notification
     *
     * @param int $userId
     * @param string $courseName
     * @return bool|int
     */
    public function sendCourseCompletionNotification($userId, $courseName)
    {
        $message = "Congratulations! You have completed the course '{$courseName}'.";
        return $this->sendToUser($userId, $message, 'success');
    }

    /**
     * Send deadline reminder notification
     *
     * @param int $userId
     * @param string $assignmentName
     * @param string $deadline
     * @return bool|int
     */
    public function sendDeadlineReminderNotification($userId, $assignmentName, $deadline)
    {
        $message = "Reminder: Assignment '{$assignmentName}' is due on {$deadline}.";
        return $this->sendToUser($userId, $message, 'warning');
    }

    /**
     * Send grade notification
     *
     * @param int $userId
     * @param string $assignmentName
     * @param string $grade
     * @return bool|int
     */
    public function sendGradeNotification($userId, $assignmentName, $grade)
    {
        $message = "Your grade for '{$assignmentName}' is {$grade}.";
        return $this->sendToUser($userId, $message, 'info');
    }

    /**
     * Clean up old notifications
     *
     * @param int $days
     * @return bool
     */
    public function cleanupOldNotifications($days = 30)
    {
        return $this->notificationModel->deleteOldNotifications($days);
    }
}
