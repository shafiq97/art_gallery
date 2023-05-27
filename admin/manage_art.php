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

$msg = '';
if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Art || Art Gallery</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
  <?php include 'header.php' ?>

  <div class="container" style="margin-top:10px;">
    <div class="col-md-12">
      <?php if ($msg !== ''): ?>
        <div class="alert alert-success" role="alert">
          <?php echo $msg; ?>
        </div>
      <?php endif; ?>
      <h3>Manage Art</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Art ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Description</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = $mysqli->query('SELECT * FROM products');
          if ($result) {
            while ($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . $row['id'] . '</td>';
              echo '<td>' . $row['product_name'] . '</td>';
              echo '<td>' . $row['product_code'] . '</td>';
              echo '<td>' . $row['product_desc'] . '</td>';
              echo '<td>' . $row['product_img_name'] . '</td>';
              echo '<td>' . $row['qty'] . '</td>';
              echo '<td>' . $row['price'] . '</td>';
              echo '<td>';
              echo '<a class="btn btn-primary" href="update_art.php?id=' . $row['id'] . '">Update</a> ';
              echo '<a class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this?\')" href="delete_art.php?id=' . $row['id'] . '">Delete</a>';
              echo '</td>';
              echo '</tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- your footer here -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>