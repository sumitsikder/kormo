<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $type = $_POST['type'];
  $jobId = $_POST['jobId'];
  $name = $_POST['name'];
  $category = $_POST['category'];
  $division = $_POST['division'];
  $comment= $_POST['comment'];
  $contact = $_POST['contact'];
  $cv = $_POST['cv'];
  $nidnumber = $_POST['nidnumber'];
  

  // Database connection details
  require_once 'connection.php';

  // Prepare and execute an SQL query to insert the form data into the database
  $sql = "INSERT INTO applicant (type, jobId,name,category,division, comment, contact,cv,nidnumber) VALUES ('$type','$jobId','$name','$category', '$division','$comment',  '$contact','$cv','$nidnumber')";
  if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>
