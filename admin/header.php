<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php">Art Gallery Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../admin/manage_users.php">Manage Users</a>
      </li>
      <!-- Dropdown Menu for Art Management -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="artManagementDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Art Management
        </a>
        <div class="dropdown-menu" aria-labelledby="artManagementDropdown">
          <a class="dropdown-item" href="insert_art.php">Insert Art</a>
          <a class="dropdown-item" href="manage_art.php">Art List</a>
        </div>
      </li>
      <?php
      if (isset($_SESSION['username'])) {
        echo '<li class="nav-item"><a class="nav-link" href="account.php">My Account</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="../logout.php">Log Out</a></li>';
      } else {
        echo '<li class="nav-item"><a class="nav-link" href="../login.php">Log In</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="../register.php">Register</a></li>';
      }
      ?>
    </ul>
  </div>
</nav>
