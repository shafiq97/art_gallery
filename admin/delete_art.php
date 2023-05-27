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
  $id = $_GET['id'];
  
  // delete the art with the given ID
  $deleteQuery = "DELETE FROM products WHERE id = $id";
  
  if ($mysqli->query($deleteQuery) === TRUE) {
    header("location:manage_art.php?msg=Art deleted successfully!");
  } else {
    header("location:manage_art.php?msg=Error deleting art: " . $mysqli->error);
  }
} else {
  header("location:manage_art.php");
}
?>
