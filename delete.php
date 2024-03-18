<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobId = $_POST["jobId"];

    // Connect to the database
    require_once 'connection.php';

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO jobId(jobId) VALUES ('$jobId')"; // Assuming the table name is "Jobs"
    if ($conn->query($sql) === TRUE) {
        $last_insert_id = $conn->insert_id;
    
        


        echo "DELETETION SUCCESSFULLY";
        $conn->close(); // Close the database connection
        exit; // Make sure to exit after successful insert
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Close the database connection
}

header("Location: login.html"); // Redirect even if not in the "if" block
?>
