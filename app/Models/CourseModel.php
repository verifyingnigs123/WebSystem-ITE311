<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'course_code',
        'course_name',
        'description',
        'units',
        'teacher_id',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = false; // timestamps handled by DB defaults in migration
    
    protected $validationRules = [
        'course_code' => 'required|max_length[50]',
        'course_name' => 'required|max_length[150]',
        'description' => 'permit_empty',
        'units' => 'permit_empty|integer|greater_than[0]|less_than[7]',
        'teacher_id' => 'required|integer'
    ];
    
    protected $validationMessages = [
        'course_code' => [
            'required' => 'Course code is required.',
            'max_length' => 'Course code cannot exceed 50 characters.',
            'is_unique' => 'This course code already exists.'
        ],
        'course_name' => [
            'required' => 'Course name is required.',
            'max_length' => 'Course name cannot exceed 150 characters.'
        ],
        'units' => [
            'integer' => 'Units must be a number.',
            'greater_than' => 'Units must be greater than 0.',
            'less_than' => 'Units must be less than 7.'
        ],
        'teacher_id' => [
            'required' => 'Teacher ID is required.',
            'integer' => 'Teacher ID must be a number.'
        ]
    ];


    /**
     * Get all available courses for students (not enrolled by the student)
     */
    public function getAvailableCoursesForStudent($studentId)
    {
        $builder = $this->db->table('courses c');
        $builder->select('c.*, u.name as teacher_name');
        $builder->join('users u', 'c.teacher_id = u.id', 'left');
        $builder->where('c.teacher_id IS NOT NULL');
        $builder->whereNotIn('c.course_id', function($query) use ($studentId) {
            $query->select('course_id')
                  ->from('enrollments')
                  ->where('user_id', $studentId);
        });
        $builder->orderBy('c.created_at', 'DESC');
        
        return $builder->get()->getResultArray();
    }

    /**
     * Get all available courses (for students to browse)
     */
    public function getAvailableCourses($userId)
    {
        return $this->getAvailableCoursesForStudent($userId);
    }

    /**
     * Get course with teacher information
     */
    public function getCourseWithTeacher($courseId)
    {
        $builder = $this->db->table('courses c');
        $builder->select('c.*, u.name as teacher_name, u.email as teacher_email');
        $builder->join('users u', 'c.teacher_id = u.id', 'left');
        $builder->where('c.course_id', $courseId);
        
        return $builder->get()->getRowArray();
    }

    /**
     * Get courses created by a specific teacher with enrollment count
     */
    public function getCoursesByTeacher($teacherId)
    {
        $builder = $this->db->table('courses c');
        $builder->select('c.*, COUNT(e.enrollment_id) as students');
        $builder->join('enrollments e', 'c.course_id = e.course_id', 'left');
        $builder->where('c.teacher_id', $teacherId);
        $builder->groupBy('c.course_id');
        $builder->orderBy('c.created_at', 'DESC');
        
        return $builder->get()->getResultArray();
    }

    /**
     * Get all courses with teacher information
     */
    public function getAllCoursesWithTeachers()
    {
        $builder = $this->db->table('courses c');
        $builder->select('c.*, u.name as teacher_name');
        $builder->join('users u', 'c.teacher_id = u.id', 'left');
        $builder->where('c.teacher_id IS NOT NULL');
        $builder->orderBy('c.created_at', 'DESC');
        
        return $builder->get()->getResultArray();
    }

    /**
     * Check if course code already exists
     */
    public function courseCodeExists($courseCode, $excludeId = null)
    {
        $builder = $this->db->table('courses');
        $builder->where('course_code', $courseCode);
        
        if ($excludeId) {
            $builder->where('course_id !=', $excludeId);
        }
        
        return $builder->countAllResults() > 0;
    }

    /**
     * Test database connection
     */
    public function testConnection()
    {
        try {
            $this->db->query('SELECT 1');
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Database connection test failed: ' . $e->getMessage());
            return false;
        }
    }
}
