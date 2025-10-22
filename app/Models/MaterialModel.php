<?php

namespace App\Models;

use CodeIgniter\Model;

class MaterialModel extends Model
{
    protected $table = 'materials';
    protected $primaryKey = 'id';
    protected $allowedFields = ['course_id', 'file_name', 'file_path', 'created_at'];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';

    /**
     * Insert a new material record
     *
     * @param array $data
     * @return bool|int
     */
    public function insertMaterial($data)
    {
        return $this->insert($data);
    }

    /**
     * Get all materials for a specific course
     *
     * @param int $course_id
     * @return array
     */
    public function getMaterialsByCourse($course_id)
    {
        return $this->where('course_id', $course_id)->findAll();
    }

    /**
     * Get material by ID
     *
     * @param int $id
     * @return array|null
     */
    public function getMaterialById($id)
    {
        return $this->find($id);
    }

    /**
     * Delete material by ID
     *
     * @param int $id
     * @return bool
     */
    public function deleteMaterial($id)
    {
        return $this->delete($id);
    }

    /**
     * Check if user is enrolled in course for material access
     *
     * @param int $course_id
     * @param int $user_id
     * @return bool
     */
    public function canAccessMaterial($course_id, $user_id)
    {
        $enrollmentModel = new EnrollmentModel();
        return $enrollmentModel->isUserEnrolled($user_id, $course_id);
    }
}
