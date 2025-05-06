<?php
require_once '../models/Student.php';

class StudentController {
    private $studentModel;

    public function __construct() {
        $this->studentModel = new Student();
    }

    public function index() {
        $students = $this->studentModel->getAll();
        require_once '../views/students/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->studentModel->create($_POST)) {
                header('Location: index.php?action=index');
                exit;
            } else {
                die('Error creating student');
            }
        }
        require_once '../views/students/create.php';
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $student = $this->studentModel->getById($id);
            require_once '../views/students/edit.php';
        } else {
            $id = $_POST['id'];
            $this->studentModel->update($id, $_POST);
            header('Location: index.php?action=index');
            exit;
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->studentModel->delete($id);
        header('Location: index.php?action=index');
        exit;
    }
}
?>