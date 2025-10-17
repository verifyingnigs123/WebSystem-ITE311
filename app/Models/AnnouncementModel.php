<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'title',
        'content',
        'created_at',
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = '';

    /**
     * Get all announcements ordered by created_at in descending order (newest first)
     */
    public function getAllAnnouncements()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}
