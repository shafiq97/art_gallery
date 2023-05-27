<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

include '../config.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Account || Art Gallery</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

  <?php include 'header.php' ?>

  <div class="container" style="margin-top:30px;">
    <h3>Hi
      <?php echo $_SESSION['fname']; ?>
    </h3>
    <h4>Account Details</h4>
    <p>Below are your details in the database. If you wish to change anything, then just enter new data in text box
      and click on update.</p>

    <form method="POST" action="update.php" style="margin-top:30px;">
      <?php
      $result = $mysqli->query('SELECT * FROM users WHERE id=' . $_SESSION['id']);

      if ($result === FALSE) {
        die(mysqli_error($mysqli));
      }

      if ($result) {
        $obj    = $result->fetch_object();
        $fields = ['fname' => 'First Name', 'lname' => 'Last Name', 'address' => 'Address', 'city' => 'City', 'pin' => 'Pin Code', 'email' => 'Email'];

        foreach ($fields as $field => $label) {
          echo '<div class="form-group row">';
          echo '<label for="' . $field . '" class="col-sm-2 col-form-label">' . $label . '</label>';
          echo '<div class="col-sm-10">';
          echo '<input type="text" class="form-control" id="' . $field . '" placeholder="' . $obj->$field . '" name="' . $field . '">';
          echo '</div>';
          echo '</div>';
        }

        echo '<div class="form-group row">';
        echo '<label for="password" class="col-sm-2 col-form-label">Password</label>';
        echo '<div class="col-sm-10">';
        echo '<input type="password" class="form-control" id="password" name="pwd">';
        echo '</div>';
        echo '</div>';
      }
      ?>

      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </div>
    </form>
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