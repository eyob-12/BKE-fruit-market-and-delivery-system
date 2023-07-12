<?php
session_start();
// Database connection
$servername = "localhost";  // Change this if your database server is different
$username = "root";  // Change this to your MySQL username
$password = "";  // Change this to your MySQL password
$database = "project";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the "users" table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'users' created successfully!<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

// Handle form submission
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($result) > 0) {
        $usernameError = "Username already exists. Please choose a different username.";
    } else {
        // Insert the user data into the table (assuming you have a users table)
        $insertQuery = "INSERT INTO user (firstname, lastname, username, email,phone_number, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$phone', '$hashedPassword')";
        mysqli_query($conn, $insertQuery);
         $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        // Redirect to a success page or do other actions on successful registration
        header("Location: login.php");
        exit();
    }
}
mysqli_close($conn);
?>
