<?php
require_once '../models/StudentCourse.php';
require_once '../models/Student.php';
require_once '../models/Course.php';

class StudentCourseController {
    private $studentCourseModel;
    private $studentModel;
    private $courseModel;

    public function __construct() {
        $this->studentCourseModel = new StudentCourse();
        $this->studentModel = new Student();
        $this->courseModel = new Course();
    }

    public function manage($studentId) {
        $student = $this->studentModel->getById($studentId);
        $enrolledCourses = $this->studentCourseModel->getByStudent($studentId);
        $availableCourses = $this->studentCourseModel->getAvailableCourses($studentId);
        
        require_once '../views/student_courses/manage.php';
    }

    public function enroll() {
        $studentId = $_POST['student_id'];
        $courseId = $_POST['course_id'];
        $enrollmentDate = $_POST['enrollment_date'];
        
        $this->studentCourseModel->enroll($studentId, $courseId, $enrollmentDate);
        header("Location: index.php?action=manageStudentCourses&id=$studentId");
        exit;
    }

    public function unenroll() {
        $studentId = $_GET['student_id'];
        $courseId = $_GET['course_id'];
        
        $this->studentCourseModel->unenroll($studentId, $courseId);
        header("Location: index.php?action=manageStudentCourses&id=$studentId");
        exit;
    }
}
?>