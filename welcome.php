<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: php/login.php");
    exit();
}

// Display the welcome message for the logged-in user
echo "Welcome, " . $_SESSION['username'] . "!";

// You can add additional content here for the logged-in user

// Close the session
session_destroy();
?>
