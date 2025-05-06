<?php ob_start(); ?>
<div class="col-1 my-3">
  <a type="button" class="btn btn-primary nav-link active" href="index.php?action=createCourse">Add New Course</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Credit</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($courses as $course): ?>
      <tr>
        <th><?php echo $course['id']; ?></th>
        <td><?php echo $course['name']; ?></td>
        <td><?php echo $course['credit']; ?></td>
        <td>
          <a class='btn btn-success' href='index.php?action=editCourse&id=<?php echo $course['id']; ?>'>Edit</a>
          <a class='btn btn-danger' href='index.php?action=deleteCourse&id=<?php echo $course['id']; ?>'>Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php
$content = ob_get_clean();
include '../views/layouts/main.php';
?>