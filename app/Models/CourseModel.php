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
}
