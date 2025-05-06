<?php
require_once 'Database.php';

class StudentCourse {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getByStudent($studentId) {
        $studentId = $this->db->escape($studentId);
        $result = $this->db->query("
            SELECT sc.*, c.name as course_name 
            FROM student_courses sc
            JOIN courses c ON sc.course_id = c.id
            WHERE sc.student_id = $studentId
        ");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function enroll($studentId, $courseId, $enrollmentDate) {
        $studentId = $this->db->escape($studentId);
        $courseId = $this->db->escape($courseId);
        $enrollmentDate = $this->db->escape($enrollmentDate);
        
        return $this->db->query("INSERT INTO student_courses 
                               (student_id, course_id, enrollment_date) 
                               VALUES ($studentId, $courseId, '$enrollmentDate')");
    }

    public function unenroll($studentId, $courseId) {
        $studentId = $this->db->escape($studentId);
        $courseId = $this->db->escape($courseId);
        
        return $this->db->query("DELETE FROM student_courses 
                               WHERE student_id=$studentId AND course_id=$courseId");
    }

    public function getAvailableCourses($studentId) {
        $studentId = $this->db->escape($studentId);
        $result = $this->db->query("
            SELECT c.* FROM courses c
            WHERE c.id NOT IN (
                SELECT course_id FROM student_courses 
                WHERE student_id = $studentId
            )
        ");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>