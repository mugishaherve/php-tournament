<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["email"])) {
    $username = $_SESSION['username'];



    // Create a new database connection
    $mysqli = new mysqli("localhost", "root", "", "progetto");

    // Check if the connection was successful
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $result = mysqli_query($mysqli, "SELECT * FROM users");

    // Fetch the username from the session

?>

    <div class="nav">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li>Welcome <?php echo $username; ?></li>
            <li>
                <a href="../backend/registration_backend/logout.php"><i class="fas fa-power-off"></i></a>
            </li>
        </ul>
    </div>
<?php
    // Close the database connection
} else {
    header('Location: ../../../backend/registration_backend/login.php');
    exit();
}
?>