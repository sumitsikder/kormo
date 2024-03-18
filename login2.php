<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usermail = $_POST["usermail"];
  $password = $_POST["password"];

  // Connect to the database
  require_once 'connection.php';

  // Prepare and execute the SQL statement
  $sql = "SELECT * FROM users WHERE usermail = '$usermail' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // Login successful
    header("Location: insert.html");
  } else {
    // Invalid username or password
    echo "Invalid username or password.";
  }

  $conn->close();
}

exit; 
?>
