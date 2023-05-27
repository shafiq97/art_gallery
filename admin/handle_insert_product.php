<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION["username"]) || $_SESSION["type"] != "admin") {
  header("location:../index.php");
}

// Include the database configuration file
include '../config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $product_name = $_POST["product_name"];
  $product_code = $_POST["product_code"];
  $product_desc = $_POST["product_desc"];
  $qty          = $_POST["qty"];
  $price        = $_POST["price"]; // Get the price from the form data

  // Handle the uploaded file
  $product_img_name = $_FILES["product_img_name"]["name"];
  $target_dir       = "../images/products/";
  $target_file      = $target_dir . basename($product_img_name);

  // Move the uploaded file to the target directory
  if (move_uploaded_file($_FILES["product_img_name"]["tmp_name"], $target_file)) {
    // File uploaded successfully
  } else {
    // File upload failed
    die("Sorry, there was an error uploading your file.");
  }

  // Insert the product into the database
  $query = "INSERT INTO products (product_name, product_code, product_desc, product_img_name, qty, price) VALUES (?, ?, ?, ?, ?, ?)";

  if ($stmt = $mysqli->prepare($query)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssssii", $product_name, $product_code, $product_desc, $product_img_name, $qty, $price);

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
      // Redirect to insert_product page with success message
      header("location: insert_art.php?msg=Product inserted successfully");
    } else {
      echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    $stmt->close();
  }

  // Close connection
  $mysqli->close();
}
?>
