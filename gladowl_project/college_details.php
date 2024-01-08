<!-- college_details.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Management - College Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <header class="text-center mt-4">
    <h1>College Details</h1>
  </header>

  <main class="container mt-4">
    <?php
    // Include the database connection file
    include('db_connection.php');

    // Check if collegeName is set in the query parameters
    if (isset($_GET['collegeName'])) {
      $collegeName = urldecode($_GET['collegeName']);

      // SQL QUERY to fetch college details
      $collegeQuery = "SELECT * FROM `college-data` WHERE collegeName = '$collegeName';";
      $collegeResult = $conn->query($collegeQuery);

      if ($collegeResult->num_rows > 0) {
        // Display college details
        while ($row = $collegeResult->fetch_assoc()) {
          echo '<div class="row college-card">';
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

        // SQL QUERY to fetch course details for the given college
        $courseQuery = "SELECT * FROM `course` WHERE collegeName = '$collegeName';";
        $courseResult = $conn->query($courseQuery);

        if ($courseResult->num_rows > 0) {
          // Display course details
          while ($courseRow = $courseResult->fetch_assoc()) {
            echo '<div class="row college-card mt-4">';
            echo '<div class="col-md-12">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h3 class="card-title">' . $courseRow["CourseName"] . '</h3>';
            echo '<p class="card-text"><strong>Instructor:</strong> ' . $courseRow["Instructor"] . '</p>';
            echo '<p class="card-text"><strong>Description:</strong> ' . $courseRow["Description"] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo '<p>No courses found for this college.</p>';
        }
      } else {
        echo '<p>College not found.</p>';
      }

      // Close the database connection
      $conn->close();
    } else {
      echo '<p>Invalid college details.</p>';
    }
    ?>

    <div class="mt-4">
      <!-- Link to go back to index.php -->
      <a href="index.php" class="btn btn-secondary">Back</a>
      <!-- Link to the "Add Course" page with the current college name as a parameter -->
      <a href="add_course.php?collegeName=<?php echo urlencode($collegeName); ?>" class="btn btn-primary">Add Course</a>
    </div>
  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
