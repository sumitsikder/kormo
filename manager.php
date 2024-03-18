<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the form data
  $nid = $_POST['nid'];
  $type = $_POST['type'];
  $jobId = $_POST['jobId'];
  $category = $_POST['category'];
  $division = $_POST['division'];
  $company_name = $_POST['company_name'];
  $salary = $_POST['salary'];
  $contact = $_POST['contact'];
  $nid = $_POST['nid'];

  // Database connection details
  require_once 'connection.php';

  // Prepare and execute an SQL query to insert the form data into the database
  $sql = "INSERT INTO jobs (nid,type, jobId,category,division, company_name, salary, contact,nid) VALUES ('$nid','$type','$jobId','$category', '$division','$company_name', '$salary', '$contact', '$nid')";
  if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>
