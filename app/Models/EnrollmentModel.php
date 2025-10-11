<?php

namespace App\Models;

use CodeIgniter\Model;

class EnrollmentModel extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'enrollment_id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'user_id',
        'course_id',
        'enrollment_date',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * Enroll a user in a course
     * 
     * @param array $data Enrollment data including user_id, course_id, and optional status
     * @return int|false The ID of the inserted enrollment or false on failure
     */
    public function enrollUser($data)
    {
        // Set default values
        $enrollmentData = [
            'user_id' => $data['user_id'],
            'course_id' => $data['course_id'],
            'enrollment_date' => $data['enrollment_date'] ?? date('Y-m-d H:i:s'),
            'status' => $data['status'] ?? 'enrolled',
        ];

        return $this->insert($enrollmentData);
    }

    /**
     * Get all courses a user is enrolled in
     * 
     * @param int $user_id The user ID
     * @return array Array of enrollment records with course details
     */
    public function getUserEnrollments($user_id)
    {
        $builder = $this->db->table('enrollments e');
        $builder->select('e.*, c.course_code, c.course_name, c.description, c.units, u.name as teacher_name');
        $builder->join('courses c', 'e.course_id = c.course_id', 'left');
        $builder->join('users u', 'c.teacher_id = u.id', 'left');
        $builder->where('e.user_id', $user_id);
        $builder->orderBy('e.enrollment_date', 'DESC');
        
        return $builder->get()->getResultArray();
    }

    /**
     * Check if a user is already enrolled in a specific course
     * 
     * @param int $user_id The user ID
     * @param int $course_id The course ID
     * @return bool True if already enrolled, false otherwise
     */
    public function isAlreadyEnrolled($user_id, $course_id)
    {
        $enrollment = $this->where('user_id', $user_id)
                          ->where('course_id', $course_id)
                          ->first();
        
        return $enrollment !== null;
    }

    /**
     * Get enrollment by user and course
     * 
     * @param int $user_id The user ID
     * @param int $course_id The course ID
     * @return array|null The enrollment record or null if not found
     */
    public function getEnrollmentByUserAndCourse($user_id, $course_id)
    {
        return $this->where('user_id', $user_id)
                   ->where('course_id', $course_id)
                   ->first();
    }

    /**
     * Update enrollment status
     * 
     * @param int $enrollment_id The enrollment ID
     * @param string $status The new status (enrolled, completed, dropped)
     * @return bool True on success, false on failure
     */
    public function updateEnrollmentStatus($enrollment_id, $status)
    {
        return $this->update($enrollment_id, ['status' => $status]);
    }

    /**
     * Get enrollments by status
     * 
     * @param string $status The enrollment status
     * @return array Array of enrollment records
     */
    public function getEnrollmentsByStatus($status)
    {
        return $this->where('status', $status)->findAll();
    }

    /**
     * Get course enrollment count
     * 
     * @param int $course_id The course ID
     * @return int Number of enrolled students
     */
    public function getCourseEnrollmentCount($course_id)
    {
        return $this->where('course_id', $course_id)
                   ->where('status', 'enrolled')
                   ->countAllResults();
    }

    /**
     * Get available courses for a user (courses they are not enrolled in)
     * 
     * @param int $user_id The user ID
     * @return array Array of available courses
     */
    public function getAvailableCourses($user_id)
    {
        $builder = $this->db->table('courses c');
        $builder->select('c.*, u.name as teacher_name');
        $builder->join('users u', 'c.teacher_id = u.id', 'left');
        $builder->where('c.teacher_id IS NOT NULL');
        $builder->whereNotIn('c.course_id', function($query) use ($user_id) {
            $query->select('course_id')
                   ->from('enrollments')
                   ->where('user_id', $user_id);
        });
        $builder->orderBy('c.created_at', 'DESC');
        
        return $builder->get()->getResultArray();
    }
}