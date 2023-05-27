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
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Insert Art || Art Gallery</title>
  <link rel="stylesheet" href="../css/foundation.css" />
  <script src="../js/vendor/modernizr.js"></script>
</head>

<body>

  <?php include 'header.php' ?>
  <div class="row" style="margin-top:10px;">
    <div class="large-12">
      <h3>Insert New Art</h3>

      <!-- New Art Form -->
      <form method="post" action="handle_insert_product.php" enctype="multipart/form-data">
        <label>Art Name</label>
        <input type="text" name="product_name" required>

        <label>Art Code</label>
        <input type="text" name="product_code" required>

        <label>Art Description</label>
        <textarea name="product_desc" required></textarea>

        <label>Art Image</label>
        <input type="file" name="product_img_name" required>

        <label>Quantity</label>
        <input type="number" name="qty" required>

        <input type="submit" value="Insert Art">
      </form>
    </div>
  </div>

  <!-- your footer here -->

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>