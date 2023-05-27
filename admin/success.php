<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Successfull</title>
  <link rel="stylesheet" href="../css/foundation.css" />
  <script src="../js/vendor/modernizr.js"></script>
</head>
<body>
  <?php include 'header.php' ?>
  <div class="row" style="margin-top:10px;">
    <div class="small-12">
      <p>Your Details have been updated</p>
      <footer style="margin-top:10px;">
        <p style="text-align:center; font-size:0.8em;">&copy; Art Gallery. All Rights Reserved.</p>
      </footer>

    </div>
  </div>
  <script src="../js/vendor/jquery.js"></script>
  <script src="../js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>