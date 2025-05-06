<?php ob_start(); ?>
<div class="col-lg-6 m-auto">
    <form method="post" action="index.php?action=edit">
        <div class="card">
            <div class="card-header bg-warning">
                <h1 class="text-white text-center">Update Student</h1>
            </div>
            <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                
                <div class="form-group">
                    <label>NAME:</label>
                    <input type="text" name="name" class="form-control" 
                           value="<?php echo htmlspecialchars($student['name']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>NIM:</label>
                    <input type="text" name="nim" class="form-control"
                           value="<?php echo htmlspecialchars($student['nim']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>PHONE:</label>
                    <input type="text" name="phone" class="form-control"
                           value="<?php echo htmlspecialchars($student['phone']); ?>">
                </div>
                
                <div class="form-group">
                    <label>JOIN DATE:</label>
                    <input type="date" name="join_date" class="form-control"
                           value="<?php echo htmlspecialchars($student['join_date']); ?>" required>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="index.php?action=index" class="btn btn-info">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
$content = ob_get_clean();
include '../views/layouts/main.php';