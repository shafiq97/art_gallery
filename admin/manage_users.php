<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
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
  <title>Manage Users || Art Gallery</title>
  <link rel="stylesheet" href="../css/foundation.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
  <script src="../js/vendor/modernizr.js"></script>
</head>

<body>

  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="index.php">Art Gallery</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="active"><a href="manage_users.php">Manage Users</a></li>
        <?php

        if (isset($_SESSION['username'])) {
          echo '<li><a href="../account.php">My Account</a></li>';
          echo '<li><a href="../logout.php">Log Out</a></li>';
        } else {
          echo '<li><a href="login.php">Log In</a></li>';
          echo '<li><a href="register.php">Register</a></li>';
        }
        ?>
      </ul>
    </section>
  </nav>


  <div class="row" style="margin-top:10px;">
    <div class="large-12">
      <h3>Manage Users</h3>
      <table id="userTable" class="display">
        <thead>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Pin</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = $mysqli->query("SELECT * FROM users");
          if ($result) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['id'] . "</td>";
              echo "<td>" . $row['fname'] . "</td>";
              echo "<td>" . $row['lname'] . "</td>";
              echo "<td>" . $row['email'] . "</td>";
              echo "<td>" . $row['address'] . "</td>";
              echo "<td>" . $row['city'] . "</td>";
              echo "<td>" . $row['pin'] . "</td>";
              echo "<td>" . $row['type'] . "</td>";
              echo '<td><a href="view_user.php?id=' . $row['id'] . '">View</a></td>';
              echo "</tr>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="../js/vendor/jquery.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="../js/foundation.min.js"></script>
  <script>
    $(document).foundation();

    $(document).ready(function() {
      $('#userTable').DataTable();
    });
  </script>
</body>

</html>
