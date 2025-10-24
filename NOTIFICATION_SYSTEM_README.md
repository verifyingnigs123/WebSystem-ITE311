# Real-Time Notification System

## Overview

The notification system has been completely updated to provide real-time notifications using Server-Sent Events (SSE) instead of polling. This provides a much more efficient and responsive user experience.

## Features

### ✅ Real-Time Notifications
- **Server-Sent Events (SSE)**: Real-time push notifications without polling
- **Automatic Reconnection**: Handles connection drops gracefully
- **Fallback to Polling**: Falls back to polling if SSE fails
- **Connection Status Indicator**: Visual indicator of connection status

### ✅ Notification Types
- **Info**: General information notifications
- **Success**: Success messages and confirmations
- **Warning**: Important warnings and alerts
- **Error**: Error messages and failures
- **Course**: Course-related notifications
- **Announcement**: System announcements
- **Material**: Material upload notifications

### ✅ Enhanced UI/UX
- **Toast Notifications**: Pop-up notifications for new messages
- **Rich Notification Display**: Icons, timestamps, and status indicators
- **Mark as Read**: Individual and bulk mark as read functionality
- **Notification History**: Complete history with pagination and filtering
- **Search and Filter**: Search by message content and filter by type/status

### ✅ System Integration
- **NotificationService**: Centralized service for sending notifications
- **Event Triggers**: Automatic notifications for system events
- **Role-based Notifications**: Send to specific user roles
- **Course Notifications**: Notify all students in a course
- **Bulk Operations**: Send to multiple users at once

## Technical Implementation

### Backend Components

#### 1. NotificationModel (`app/Models/NotificationModel.php`)
```php
// Key methods:
- getNewNotifications($userId, $lastNotificationId)
- markAllAsRead($userId)
- getNotificationHistory($userId, $page, $limit)
- createNotification($userId, $message, $type)
- getNotificationsByType($userId, $type)
- deleteOldNotifications($days)
```

#### 2. Notifications Controller (`app/Controllers/Notifications.php`)
```php
// Endpoints:
- GET /notifications - Get current notifications
- POST /notifications/mark_read/{id} - Mark as read
- GET /notifications/stream - SSE endpoint
- POST /notifications/mark_all_read - Mark all as read
- GET /notifications/history - Get notification history
- POST /notifications/test - Send test notification
- GET /notifications/test - Test page
```

#### 3. NotificationService (`app/Libraries/NotificationService.php`)
```php
// Key methods:
- sendToUser($userId, $message, $type)
- sendToUsers($userIds, $message, $type)
- sendToRole($role, $message, $type)
- sendCourseNotification($courseId, $message, $type)
- sendAnnouncement($message, $type)
- sendMaterialUploadNotification($courseId, $materialName)
```

### Frontend Components

#### 1. Real-Time JavaScript (`app/Views/template/header.php`)
- **EventSource Connection**: Establishes SSE connection
- **Automatic Reconnection**: Handles connection drops
- **Toast Notifications**: Shows pop-up notifications
- **Dynamic UI Updates**: Updates notification list in real-time

#### 2. Notification History (`app/Views/notifications/history.php`)
- **Pagination**: Handles large notification lists
- **Filtering**: Filter by type and status
- **Search**: Search through notification messages
- **Bulk Operations**: Mark all as read, clear old notifications

#### 3. Test Center (`app/Views/notifications/test.php`)
- **Test Notifications**: Send test notifications
- **Connection Monitoring**: Monitor SSE connection status
- **Real-time Display**: Show notifications as they arrive

## Database Schema

### Notifications Table
```sql
CREATE TABLE notifications (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED NOT NULL,
    message VARCHAR(255) NOT NULL,
    type VARCHAR(50) DEFAULT 'info',
    is_read TINYINT(1) DEFAULT 0,
    created_at DATETIME NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

## Usage Examples

### Sending Notifications

#### 1. Send to Current User
```php
$notificationService = new \App\Libraries\NotificationService();
$notificationService->sendToUser($userId, 'Welcome to the system!', 'success');
```

#### 2. Send to All Users
```php
$notificationService->sendAnnouncement('System maintenance scheduled for tonight.', 'warning');
```

#### 3. Send to Course Students
```php
$notificationService->sendCourseNotification($courseId, 'New material uploaded!', 'material');
```

#### 4. Send to Specific Role
```php
$notificationService->sendToRole('admin', 'New user registered.', 'info');
```

### Frontend Integration

#### 1. Check Connection Status
```javascript
// Connection status is automatically managed
// Green dot = Connected, Red dot = Disconnected
```

#### 2. Handle New Notifications
```javascript
// Notifications are automatically added to the dropdown
// Toast notifications appear for new messages
```

#### 3. Mark as Read
```javascript
// Click the "Mark Read" button on individual notifications
// Or use "Mark All Read" for bulk operations
```

## Configuration

### 1. Database Migration
Run the migration to add the `type` column:
```bash
php spark migrate
```

### 2. Routes
All notification routes are automatically configured in `app/Config/Routes.php`.

### 3. JavaScript Dependencies
- jQuery (already included)
- Bootstrap 5 (for toast notifications)
- Font Awesome (for icons)

## Performance Considerations

### 1. SSE Connection Management
- **Connection Limits**: Each user has one SSE connection
- **Automatic Cleanup**: Connections are closed on page unload
- **Reconnection Logic**: Exponential backoff for reconnection attempts

### 2. Database Optimization
- **Indexes**: Ensure proper indexing on `user_id` and `created_at`
- **Cleanup**: Old notifications are automatically cleaned up
- **Pagination**: Large notification lists are paginated

### 3. Memory Usage
- **Connection Pooling**: SSE connections are managed efficiently
- **Data Caching**: Recent notifications are cached in memory
- **Cleanup**: Old data is regularly cleaned up

## Testing

### 1. Test Page
Visit `/notifications/test` to:
- Send test notifications
- Monitor connection status
- View real-time notifications

### 2. Manual Testing
1. Open multiple browser tabs
2. Send a notification from one tab
3. Verify it appears in other tabs immediately

### 3. Connection Testing
1. Disconnect network
2. Verify fallback to polling
3. Reconnect and verify SSE resumes

## Troubleshooting

### Common Issues

#### 1. SSE Connection Fails
- **Check**: Server supports SSE
- **Check**: No proxy blocking SSE
- **Fallback**: System automatically falls back to polling

#### 2. Notifications Not Appearing
- **Check**: User is logged in
- **Check**: Database connection
- **Check**: JavaScript console for errors

#### 3. Performance Issues
- **Check**: Database indexes
- **Check**: Connection limits
- **Check**: Memory usage

### Debug Mode
Enable debug mode to see detailed logs:
```php
// In app/Config/App.php
public $CI_ENVIRONMENT = 'development';
```

## Future Enhancements

### Planned Features
1. **Push Notifications**: Browser push notifications
2. **Email Integration**: Email notifications for important messages
3. **Mobile App**: Mobile push notifications
4. **Notification Preferences**: User-configurable notification settings
5. **Rich Notifications**: Support for images and actions
6. **Notification Analytics**: Track notification engagement

### API Extensions
1. **Webhook Support**: External system integration
2. **REST API**: Full REST API for notifications
3. **GraphQL**: GraphQL endpoint for complex queries

## Security Considerations

### 1. Authentication
- All notification endpoints require authentication
- User can only access their own notifications

### 2. Authorization
- Role-based notification sending
- Admin-only bulk operations

### 3. Data Protection
- Sensitive data is not stored in notifications
- Notifications are automatically cleaned up

## Support

For issues or questions:
1. Check the troubleshooting section
2. Review the test page functionality
3. Check browser console for errors
4. Verify database connectivity

## Changelog

### Version 2.0 (Current)
- ✅ Real-time notifications with SSE
- ✅ Enhanced UI with toast notifications
- ✅ Notification history and filtering
- ✅ Role-based notification system
- ✅ Test center for debugging
- ✅ Automatic reconnection and fallback

### Version 1.0 (Previous)
- Basic polling-based notifications
- Simple notification display
- Limited notification types
