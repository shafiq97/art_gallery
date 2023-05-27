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

if (isset($_GET['id'])) {
  $id     = $_GET['id'];
  $result = $mysqli->query("SELECT * FROM products WHERE id = $id");
  if ($result) {
    $art = $result->fetch_assoc();
  } else {
    header("location:manage_art.php");
  }
} else {
  header("location:manage_art.php");
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update Art || Art Gallery</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
  <?php include 'header.php' ?>

  <div class="container" style="margin-top:10px;">
    <div class="col-md-12">
      <h3>Update Art</h3>

      <!-- Update Art Form -->
      <form method="post" action="handle_update_product.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $art['id']; ?>" />

        <div class="form-group">
          <label>Art Name</label>
          <input type="text" class="form-control" name="product_name" value="<?php echo $art['product_name']; ?>"
            required>
        </div>

        <div class="form-group">
          <label>Art Code</label>
          <input type="text" class="form-control" name="product_code" value="<?php echo $art['product_code']; ?>"
            required>
        </div>

        <div class="form-group">
          <label>Art Description</label>
          <textarea class="form-control" name="product_desc" required><?php echo $art['product_desc']; ?></textarea>
        </div>

        <div class="form-group">
          <label>Art Image</label>
          <input type="file" class="form-control-file" name="product_img_name">
        </div>

        <div class="form-group">
          <label>Quantity</label>
          <input type="number" class="form-control" name="qty" value="<?php echo $art['qty']; ?>" required>
        </div>

        <div class="form-group">
          <label>Price (RM)</label>
          <input type="number" step="0.01" class="form-control" name="price" value="<?php echo $art['price']; ?>"
            required>
        </div>

        <input class="btn btn-primary" type="submit" value="Update Art">
      </form>
    </div>
  </div>

  <!-- your footer here -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>