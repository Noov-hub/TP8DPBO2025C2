<?php ob_start(); ?>
<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?action=create">
    <div class="card">
      <div class="card-header bg-primary">
        <h1 class="text-white text-center">Create Student</h1>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>NAME:</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        
        <div class="form-group">
          <label>NIM:</label>
          <input type="text" name="nim" class="form-control" required>
        </div>
        
        <div class="form-group">
          <label>PHONE:</label>
          <input type="text" name="phone" class="form-control" required>
        </div>
        
        <div class="form-group">
          <label>JOIN DATE:</label>
          <input type="date" name="join_date" class="form-control" required>
        </div>
        
        <div class="form-group">
          <button class="btn btn-success" type="submit">Submit</button>
          <a class="btn btn-info" href="index.php?action=index">Cancel</a>
        </div>
      </div>
    </div>
  </form>
</div>
<?php
$content = ob_get_clean();
include '../views/layouts/main.php';