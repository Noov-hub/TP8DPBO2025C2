<?php ob_start(); ?>
<div class="col-1 my-3">
  <a type="button" class="btn btn-primary nav-link active" href="index.php?action=create">Add New</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>NIM</th>
      <th>PHONE</th>
      <th>JOIN DATE</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($students as $student): ?>
      <tr>
        <th><?php echo $student['id']; ?></th>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['nim']; ?></td>
        <td><?php echo $student['phone']; ?></td>
        <td><?php echo $student['join_date']; ?></td>
        <td>
          <a class='btn btn-success' href='index.php?action=edit&id=<?php echo $student['id']; ?>'>Edit</a>
          <a class='btn btn-danger' href='index.php?action=delete&id=<?php echo $student['id']; ?>'>Delete</a>
          <a class='btn btn-info' href='index.php?action=manageStudentCourses&id=<?php echo $student['id']; ?>'>Manage Courses</a>
        </td>
      </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>
<?php
$content = ob_get_clean();
include '../views/layouts/main.php';

?>