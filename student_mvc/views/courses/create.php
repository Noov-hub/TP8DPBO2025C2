<?php ob_start(); ?>
<div class="col-lg-6 m-auto">
  <form method="post">
    <div class="card">
      <div class="card-header bg-primary">
        <h1 class="text-white text-center">Create Course</h1>
      </div>
      <div class="card-body">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required><br>
        
        <label>Credit:</label>
        <input type="number" name="credit" class="form-control" required><br>
        
        <button class="btn btn-success" type="submit">Submit</button>
        <a class="btn btn-info" href="index.php?action=courses">Cancel</a>
      </div>
    </div>
  </form>
</div>
<?php
$content = ob_get_clean();
include '../views/layouts/main.php';
?>