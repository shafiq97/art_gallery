<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="../index.php">Art Gallery</a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>
  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
      <li><a href="../admin/manage_users.php">Manage Users</a></li>
      <li><a href="insert_art.php">Insert Art</a></li>
      <?php

      if (isset($_SESSION['username'])) {
        echo '<li><a href="account.php">My Account</a></li>';
        echo '<li><a href="../logout.php">Log Out</a></li>';
      } else {
        echo '<li><a href="../login.php">Log In</a></li>';
        echo '<li><a href="../register.php">Register</a></li>';
      }
      ?>
    </ul>
  </section>
</nav>