<?php
require_once '../models/Course.php';

class CourseController {
    private $courseModel;

    public function __construct() {
        $this->courseModel = new Course();
    }

    public function index() {
        $courses = $this->courseModel->getAll();
        require_once '../views/courses/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->courseModel->create($_POST);
            header('Location: index.php?action=courses');
            exit;
        }
        require_once '../views/courses/create.php';
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $course = $this->courseModel->getById($id);
            require_once '../views/courses/edit.php';
        } else {
            $id = $_POST['id'];
            $this->courseModel->update($id, $_POST);
            header('Location: index.php?action=courses');
            exit;
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->courseModel->delete($id);
        header('Location: index.php?action=courses');
        exit;
    }
}
?>