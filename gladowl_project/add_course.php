<!-- add_course.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Management - Add Course</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <header class="text-center mt-4">
    <h1>Add Course</h1>
  </header>

  <main class="container mt-4">
    <?php
    // Include the database connection file
    include('db_connection.php');

    // Check if collegeName is set in the query parameters
    if (isset($_GET['collegeName'])) {
      $collegeName = $_GET['collegeName'];

      // Display the college name in the form
      echo '<h2>College: ' . $collegeName . '</h2>';

      // Check if the form is submitted
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $courseName = $_POST['courseName'];
        $instructor = $_POST['instructor'];
        $description = $_POST['description'];

        // SQL QUERY to insert course into the database
        $insertQuery = "INSERT INTO `course` (collegeName, courseName, instructor, description) VALUES ('$collegeName', '$courseName', '$instructor', '$description')";

        // Execute the query
        if ($conn->query($insertQuery) === TRUE) {
          echo '<div class="alert alert-success" role="alert">';
          echo 'Course added successfully!';
          echo '</div>';
        } else {
          echo '<div class="alert alert-danger" role="alert">';
          echo 'Error adding course: ' . $conn->error;
          echo '</div>';
        }
      }

      // Display the course form...
      echo '<form method="post" action="add_course.php?collegeName=' . urlencode($collegeName) . '">';
      echo '  <div class="form-group">';
      echo '    <label for="courseName">Course Name:</label>';
      echo '    <input type="text" class="form-control" id="courseName" name="courseName" required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label for="instructor">Instructor:</label>';
      echo '    <input type="text" class="form-control" id="instructor" name="instructor" required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label for="description">Description:</label>';
      echo '    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>';
      echo '  </div>';
      echo '  <button type="submit" class="btn btn-primary">Add Course</button>';
      echo '</form>';

      echo '<a href="college_details.php?collegeName=' . urlencode($collegeName) . '" class="btn btn-secondary mt-3">Back to College Details</a>';
    } else {
      echo '<p>Invalid college details.</p>';
    }
    ?>

  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
