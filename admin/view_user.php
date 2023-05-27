<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  header("location:../index.php");
}

include '../config.php';

if (isset($_GET['id'])) {
  $id     = $_GET['id'];
  $result = $mysqli->query("SELECT * FROM users WHERE id = $id");
  if ($result) {
    $row     = $result->fetch_assoc();
    $fname   = $row['fname'];
    $lname   = $row['lname'];
    $email   = $row['email'];
    $address = $row['address'];
    $city    = $row['city'];
    $pin     = $row['pin'];
    $type    = $row['type'];
  } else {
    header("location:manage_users.php");
  }
} else {
  header("location:manage_users.php");
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Details || Art Gallery</title>
  <link rel="stylesheet" href="../css/foundation.css" />
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <style>
    body {
      background-color: #f9f9f9;
      font-family: Arial, sans-serif;
      color: #333;
      line-height: 1.5;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .user-details {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .user-details p {
      margin: 10px 0;
    }

    .user-details strong {
      font-weight: bold;
    }
  </style>
</head>

<body>

  <?php include 'header.php' ?>
  <div class="container">
    <div class="user-details">
      <h1>User Details</h1>
      <p><strong>First Name:</strong>
        <?php echo $fname; ?>
      </p>
      <p><strong>Last Name:</strong>
        <?php echo $lname; ?>
      </p>
      <p><strong>Email:</strong>
        <?php echo $email; ?>
      </p>
      <p><strong>Address:</strong>
        <?php echo $address; ?>
      </p>
      <p><strong>City:</strong>
        <?php echo $city; ?>
      </p>
      <p><strong>Pin:</strong>
        <?php echo $pin; ?>
      </p>
      <p><strong>Type:</strong>
        <?php echo $type; ?>
      </p>
    </div>
  </div>

  <script src="../js/vendor/jquery.js"></script>
  <script src="../js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
  
  <!-- Include Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
