<?php ob_start(); ?>
<h2>Manage Courses for: <?php echo $student['name']; ?></h2>

<div class="row">
  <div class="col-md-6">
    <h3>Enrolled Courses</h3>
    <table class="table">
      <thead>
        <tr>
          <th>Course Name</th>
          <th>Enrollment Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($enrolledCourses as $course): ?>
          <tr>
            <td><?php echo $course['course_name']; ?></td>
            <td><?php echo $course['enrollment_date']; ?></td>
            <td>
              <a href="index.php?action=unenroll&student_id=<?php echo $student['id']; ?>&course_id=<?php echo $course['course_id']; ?>" 
                 class="btn btn-danger">Unenroll</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="col-md-6">
    <h3>Available Courses</h3>
    <form method="post" action="index.php?action=enroll">
      <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
      <div class="form-group">
        <select name="course_id" class="form-control" required>
          <?php foreach ($availableCourses as $course): ?>
            <option value="<?php echo $course['id']; ?>">
              <?php echo $course['name']; ?> (<?php echo $course['credit']; ?> credits)
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Enrollment Date:</label>
        <input type="date" name="enrollment_date" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Enroll</button>
    </form>
  </div>
</div>

<a href="index.php?action=index" class="btn btn-secondary mt-3">Back to Students</a>
<?php
$content = ob_get_clean();
include '../views/layouts/main.php';
?>