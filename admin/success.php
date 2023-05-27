<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Successful</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

  <?php include 'header.php'; ?>

  <div class="container" style="margin-top:10px;">
    <div class="row">
      <div class="col-md-12">
        <p>Your Details have been updated</p>
      </div>
    </div>
  </div>

  <footer class="footer mt-auto py-3">
    <div class="container">
      <p style="text-align:center; font-size:0.8em;">&copy; Art Gallery. All Rights Reserved.</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>