<?php
require_once 'Database.php';

class Course {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM courses");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $id = $this->db->escape($id);
        $result = $this->db->query("SELECT * FROM courses WHERE id = $id");
        return $result->fetch_assoc();
    }

    public function create($data) {
        $name = $this->db->escape($data['name']);
        $credit = $this->db->escape($data['credit']);
        
        return $this->db->query("INSERT INTO courses (name, credit) 
                               VALUES ('$name', '$credit')");
    }

    public function update($id, $data) {
        $id = $this->db->escape($id);
        $name = $this->db->escape($data['name']);
        $credit = $this->db->escape($data['credit']);
        
        return $this->db->query("UPDATE courses SET 
                               name='$name', 
                               credit='$credit' 
                               WHERE id=$id");
    }

    public function delete($id) {
        $id = $this->db->escape($id);
        return $this->db->query("DELETE FROM courses WHERE id=$id");
    }
}
?>