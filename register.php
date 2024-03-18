<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usermail = $_POST["usermail"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  $nid = $_POST["nid"];
  $nid_number = $_POST["nid_number"];

  // Perform password validation
  if ($password !== $confirm_password) {
    echo "Password and confirm password do not match.";
    exit;
  }

  require_once 'connection.php';

  // Prepare and execute the SQL statement
  $sql = "INSERT INTO users (usermail, password,nid,nid_number) VALUES ('$usermail', '$password','$nid','$nid_number')";
  if ($conn->query($sql) === TRUE) {
    $last_insert_id = $conn->insert_id;
    header("Location: log.html");
    //echo "REGISTRATION SUCCESSFULLY";
exit; // Make sure to exit after the redirect
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
header("Location: login.html");

?>
