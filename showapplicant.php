<!DOCTYPE html>
<html>
<head>
  <title>Job Listings</title>
  <style>
    body {
      background-image: url(show.jpg);
      background-repeat: no-repeat;
      background-size: cover;
    }
   
    button {
      align-items:right;
      background-color: rgb(9, 80, 67);
      color: white;
      padding: 12px 10px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 20%;
      font-size: 20px;
      float: right;
      border-radius:5px;
    }

    h2 {
      color: rgb(9, 80, 67);
      align-items: center;
      font-size: 35px;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      padding-left: 43%;
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
      height: 200px; /* Fixed missing 'px' */
      margin: 0 auto;
      padding: 20px;
      align-content: center;
      border: 2px solid #ccc;
      background-color: #f4f4f4aa;
      box-sizing: border-box;
      font-size: 20px;
      border-radius: 5px; /* Fixed missing 'px' */
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
    <h2>All applicants</h2>
    <table id="table">
      <thead>
        <tr>
          <th>jobId</th>
          <th>name</th>
          <th>division</th>
          <th>contact</th>
          <th>comment</th>
          <th>nid_number</th>
          <th>CV</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once 'connection.php';

        // Retrieve data from the "applicant" table
        $sql = "SELECT jobId, name, division, contact, comment,nid_number, cv FROM applicant"; // Changed table name to "applicant"
        $result = $conn->query($sql);

        // Output data in HTML table rows
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>"; 
            echo "<td>".$row["jobId"]."</td>";
            echo "<td>".$row["name"]."</td>";
            echo "<td>".$row["division"]."</td>";
            echo "<td>".$row["contact"]."</td>";
            echo "<td>".$row["comment"]."</td>";
            echo "<td>".$row["nid_number"]."</td>";
            echo "<td><a href='download_cv.php?cv_id=".$row["jobId"]."'>Download CV</a></td>"; // Link to download CV
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No applicants found</td></tr>"; // Corrected colspan value
        }

        // Close the database connection
        $conn->close();
        ?>
      </tbody>
    </table>
    <button id="printButton">Print</button>
  </div>

  <!-- print code -->
  <script src="print.js"></script>
  <!-- Student Information table -->
  <script>
    document.getElementById('printButton').addEventListener('click', function() {
      printTable('table', 'Applicant Information'); // Replace 'Custom Message Here' with your desired message
    });
  </script>
</body>
</html>
