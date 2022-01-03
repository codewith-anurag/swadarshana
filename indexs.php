<!-- <video autoplay width="100%" height="100%" controls>
  <source src="videoplayback.mp4" type="video/mp4">

Your browser does not support the video tag.
</video> -->
<?php echo phpinfo(); ?>
<?php
$servername = "localhost";
$username = "root";
$password = "wew";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
