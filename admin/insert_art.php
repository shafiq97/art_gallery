<?php

if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  header("location:../index.php");
}

if ($_SESSION["type"] != "admin") {
  header("location:../index.php");
}

include '../config.php';
// Check if msg parameter is set
if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
} else {
  $msg = '';
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Insert Art || Art Gallery</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

  <?php include 'header.php' ?>
  <div class="container" style="margin-top:10px;">
    <div class="col-md-12">
      <h3>Insert New Art</h3>

      <!-- New Art Form -->
      <form method="post" action="handle_insert_product.php" enctype="multipart/form-data">
        <div class="form-group">
          <label>Art Name</label>
          <input type="text" class="form-control" name="product_name" required>
        </div>

        <div class="form-group">
          <label>Art Code</label>
          <input type="text" class="form-control" name="product_code" required>
        </div>

        <div class="form-group">
          <label>Art Description</label>
          <textarea class="form-control" name="product_desc" required></textarea>
        </div>

        <div class="form-group">
          <label>Art Image</label>
          <input type="file" class="form-control-file" name="product_img_name" required>
        </div>

        <div class="form-group">
          <label>Quantity</label>
          <input type="number" class="form-control" name="qty" required>
        </div>

        <div class="form-group">
          <label>Price</label>
          <input type="number" step="0.01" class="form-control" name="price" required>
        </div>

        <input class="btn btn-primary" type="submit" value="Insert Art">
      </form>
    </div>
  </div>

  <!-- your footer here -->

  <!-- Include Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
  // Get the msg value from PHP
  let msg = '<?php echo $msg; ?>';

  // Check if msg is not empty
  if (msg !== '') {
    // Show the msg as an alert
    alert(msg);
  }
  </script>

</body>

</html>