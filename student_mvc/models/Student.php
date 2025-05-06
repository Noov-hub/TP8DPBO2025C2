<?php
require_once 'Database.php';

class Student {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $result = $this->db->query("SELECT * FROM students");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $id = $this->db->escape($id);
        $result = $this->db->query("SELECT * FROM students WHERE id = $id");
        return $result->fetch_assoc();
    }

    public function create($data) {
        $name = $this->db->escape($data['name']);
        $nim = $this->db->escape($data['nim']);
        $phone = $this->db->escape($data['phone']);
        $join_date = $this->db->escape($data['join_date']);
        
        return $this->db->query("INSERT INTO students (name, nim, phone, join_date) 
                               VALUES ('$name', '$nim', '$phone', '$join_date')");
    }

    public function update($id, $data) {
        $id = $this->db->escape($id);
        $name = $this->db->escape($data['name']);
        $nim = $this->db->escape($data['nim']);
        $phone = $this->db->escape($data['phone']);
        $join_date = $this->db->escape($data['join_date']);
        
        return $this->db->query("UPDATE students SET 
                               name='$name', 
                               nim='$nim', 
                               phone='$phone', 
                               join_date='$join_date' 
                               WHERE id=$id");
    }

    public function delete($id) {
        $id = $this->db->escape($id);
        return $this->db->query("DELETE FROM students WHERE id=$id");
    }
}
?>