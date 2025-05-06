<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Management</title>
  <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?action=index">Students</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?action=index">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container my-4">
    <?php echo $content; ?>
  </div>
  <script src="/public/assets/js/jquery.min.js"></script>
  <script src="/public/assets/js/popper.min.js"></script>
  <script src="/public/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>