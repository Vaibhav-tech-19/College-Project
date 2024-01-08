<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Management - Admin Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .college-card {
      margin-bottom: 20px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header class="text-center mt-4">
    <h1>Admin Panel</h1>
  </header>

  <main class="container mt-4">
    <section id="add-college-card" class="card">
      <h2 class="card-title">Add College</h2>
      <button class="btn btn-primary" onclick="goToAddCollegePage()">Add College</button>
    </section>
    
    <h2 class="mt-4">Colleges List</h2>
    <?php 

    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $databasename = "college"; 

    // CREATE CONNECTION 
    $conn = new mysqli($servername, $username, $password, $databasename); 

    // GET CONNECTION ERRORS 
    if ($conn->connect_error) { 
      die("Connection failed: " . $conn->connect_error); 
    } 

    // SQL QUERY 
    $query = "SELECT * FROM `college-data`;"; 

    // FETCHING DATA FROM DATABASE 
    $result = $conn->query($query); 

    if ($result->num_rows > 0) { 
      while($row = $result->fetch_assoc()) { 
        // Check if essential fields are not empty
        if (!empty($row["collegeName"]) && !empty($row["Address"]) && !empty($row["ContactPerson"]) && !empty($row["mail-id"])) {
          $collegeName = urlencode($row["collegeName"]);
          echo '<div class="row college-card" onclick="goToCollegeCourses(\'' . $collegeName . '\')">';
          echo '<div class="col-md-12">';
          echo '<div class="card">';
          echo '<div class="card-body">';
          echo '<h3 class="card-title">' . $row["collegeName"] . '</h3>';
          echo '<p class="card-text"><strong>Address:</strong> ' . $row["Address"] . '</p>';
          echo '<p class="card-text"><strong>Contact Person:</strong> ' . $row["ContactPerson"] . '</p>';
          echo '<p class="card-text"><strong>Email:</strong> ' . $row["mail-id"] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } 
    } else { 
      echo '<p>No colleges found.</p>'; 
    } 

    $conn->close(); 

    ?>
  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="script.js"></script>

  <script>
    function goToCollegeCourses(collegeName) {
      window.location.href = 'college_details.php?collegeName=' + encodeURIComponent(collegeName);
    }

    function goToAddCollegePage() {
      window.location.href = 'addCollege.html';
    }
  </script>
</body>
</html>
