<!DOCTYPE html>
<html>
<head>
  <title>Job Listings</title>
  <style>
    body{
      background-image: url(show.jpg);
      background-repeat: no-repeat;
      background-size: cover;
    }
    h2{
  color: rgb(9, 80, 67);
  font-size: 35px;
  font-family:Verdana, Geneva, Tahoma, sans-serif;
  text-align:center;
  padding-bottom: 20px;
  padding-top: 3%;
  text-shadow: 4px 5px 8px rgba(65, 64, 64, 0.19);
}
    
    .container {
      max-width: 80%;
      margin: 0 auto;
      padding: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
  height: 200;
  margin: 0 auto;
  padding: 20px;
  align-content: center;
  border: 2px solid #ccc;
  background-color: #f4f4f4aa;
  box-sizing: border-box;
  font-size: 20px;
  border-radius: 20 px;
    }

    th, td {
      padding: 5px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
   
  </style>
</head>
<body>
  <div class="container">
    <h2>JOBS INSIDE KHULNA</h2>
    <table>
      <thead>
        <tr>
        <th>nid</th>
           <th>Company_name</th>
          <th>type</th>
          <th>Category</th>
          <th>Division</th>
          
          <th>Salary</th>
          <th>Contact</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Database connection details
        require_once 'connection.php';

        // Retrieve data from the "jobs" table
        $sql = "SELECT nid,type,category,division, company_name, salary, contact FROM jobs WHERE division = 'khulna'";
        $result = $conn->query($sql);

        // Output data in HTML table rows
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["nid"]."</td>"; 
            echo "<td>".$row["company_name"]."</td>";
            echo "<td>".$row["type"]."</td>";
            echo "<td>".$row["category"]."</td>";
            echo "<td>".$row["division"]."</td>";
            echo "<td>".$row["salary"]."</td>";
            echo "<td>".$row["contact"]."</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No jobs found</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
