<?php

require_once __DIR__ . '/../controllers/StudentController.php';
require_once __DIR__ . '/../controllers/CourseController.php';
require_once __DIR__ . '/../controllers/StudentCourseController.php';

$action = $_GET['action'] ?? 'index';
$studentController = new StudentController();
$courseController = new CourseController();
$studentCourseController = new StudentCourseController();

switch ($action) {
    // Student routes
    case 'index':
        $studentController->index();
        break;
    case 'create':
        $studentController->create();
        break;
    case 'edit':
        $studentController->edit();
        break;
    case 'delete':
        $studentController->delete();
        break;
        
    // Course routes
    case 'courses':
        $courseController->index();
        break;
    case 'createCourse':
        $courseController->create();
        break;
    case 'editCourse':
        $courseController->edit();
        break;
    case 'deleteCourse':
        $courseController->delete();
        break;
        
    // Student-Course routes
    case 'manageStudentCourses':
        $studentId = $_GET['id'];
        $studentCourseController->manage($studentId);
        break;
    case 'enroll':
        $studentCourseController->enroll();
        break;
    case 'unenroll':
        $studentCourseController->unenroll();
        break;
        
    default:
        $studentController->index();
        break;
}
?>