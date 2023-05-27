<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  header("location:index.php");
}

if ($_SESSION["type"] != "admin") {
  header("location:index.php");
}

include '../config.php';

if ($_POST) {
  $id = $_POST['id'];
  $product_name = $_POST['product_name'];
  $product_code = $_POST['product_code'];
  $product_desc = $_POST['product_desc'];
  $qty = $_POST['qty'];
  $price = $_POST['price'];

  // Check if a new image was uploaded
  if ($_FILES['product_img_name']['size'] > 0) {
    // Generate a filename
    $img_name = time() . '_' . $_FILES['product_img_name']['name'];

    // Save the uploaded file to your directory
    move_uploaded_file($_FILES['product_img_name']['tmp_name'], '../images/' . $img_name);
    
    // Prepare SQL statement
    $sql = "UPDATE products SET product_name = ?, product_code = ?, product_desc = ?, qty = ?, price = ?, product_img_name = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sssiisi', $product_name, $product_code, $product_desc, $qty, $price, $img_name, $id);
  } else {
    // If no new image, just update the other fields
    $sql = "UPDATE products SET product_name = ?, product_code = ?, product_desc = ?, qty = ?, price = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sssiis', $product_name, $product_code, $product_desc, $qty, $price, $id);
  }
  
  if ($stmt->execute()) {
    header("location:manage_art.php?msg=Art updated successfully!");
  } else {
    header("location:manage_art.php?msg=Failed to update art!");
  }
}
?>
