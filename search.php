<?php
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "curefinder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$specialty = $_GET['specialty'];
$location = $_GET['location'];

$sql = "SELECT * FROM doctors WHERE DoctorCategory LIKE '%$specialty%' AND DoctorArea LIKE '%$location%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="card mb-4">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title">' . $row["DoctorName"] . '</h3>';
        echo '<img src="' . $row["DoctorImage"] . '" alt="' . $row["DoctorName"] . '" class="card-img-top">';
        echo '<p class="card-text">' . $row["DoctorInformation"] . '</p>';
        echo '<p class="card-text"><strong>Location:</strong> ' . $row["DoctorArea"] . '</p>';
        echo '<p class="card-text"><strong>Specialty:</strong> ' . $row["DoctorCategory"] . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>
