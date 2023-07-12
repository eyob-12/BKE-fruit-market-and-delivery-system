<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Assuming you have a database connection established

// TODO: Replace 'your_database' with your actual database name
// $conn = mysqli_connect('localhost', 'your_username', 'your_password', 'your_database');

if (!$conn) {
    die("Database connection error: " . mysqli_connect_error());
}



if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password
    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } else {
        // TODO: Replace 'users' with your actual users table name
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if($username==="admin"){
          $storedPassword="12345";

        
        if($password==$storedPassword){
            session_start();
            $_session["loggedin"]=true;
            $_session["username"]=$username;
            setcookie('user', $username, time()+(86400*30), '/');

            header("Location: admin.php");
            exit();
        } else{
            $error="invalid";
        }
    }

        else if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            // Compare the stored password with the user input
            if (password_verify($password, $storedPassword)) {
                // Authentication successful
                // Redirect to index.php
               
                
                header("Location: cart.php");
                $_SESSION['username'] = $username;
                exit();
            } else {
                // Authentication failed
                $error = "Invalid username or password.";
            }
        } else {
            // Authentication failed
            $error = "Invalid username or .";
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color:hotpink;" class="bg-gray-100">
    <div class="container mx-auto mt-10 p-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Login Form</h2>

        <?php
        if (isset($error)) {
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">';
            echo '<strong>Error:</strong> ' . $error;
            echo '</div>';
        }
        ?>

        <form class="w-full max-w-md p-6 rounded-lg shadow-lg bg-white" method="post" action="">
            <div class="mb-6">
                <label class="none text-gray-700 font-bold mb-2" for="username" >Username:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Enter your username" name="username">
            </div>
            <div class="mb-6">
                <label class="none text-gray-700 font-bold mb-2" for="password" >Password:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Enter your password" name="password">
            </div>
            <button class="bg-yellow-600 hover:bg-yellow-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full mb-4" type="submit" name="submit">Login</button>
        </form>
    </div>
</body>
</html>
