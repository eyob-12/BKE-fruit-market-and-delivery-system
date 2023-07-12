<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

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


// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM user WHERE id = '$deleteId'";
    mysqli_query($conn, $deleteQuery);
}

// Handle Update Request
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];

    $updateQuery = "UPDATE user SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', phone_number='$phone_number', password='$password' WHERE id='$id'";
    mysqli_query($conn, $updateQuery);
}

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap.css">
    <style>
        .table-container {
            overflow-x: auto;
        }
        body {
  background-image: url('homePage4.jpg'); /* Replace 'your-image-url.jpg' with the URL or path to your desired background image */
  background-color: #f5f5f5; /* Replace '#f5f5f5' with your desired background color */
  background-repeat: no-repeat;
  background-position: center center;
  background-attachment: fixed;
  background-size: cover;
}
h1{
    font-size:40px;
    text-decoration:uppercase;
}
.button{
    background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;  
}
td{
    font-size:25px;
    font-family:bold;
    color:red;
}
input{
    font-size:20px;
    border-radius:20px;

}
    </style>
    <title>Document</title>
</head>

<body>
    <h1 class="pb-0 text-center">admin page</h1>
    <div class="container mt-0">
        <div class="row mt-0">
            <div class="col mt-0">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="table-container">
                            <table class="table table-bordered text-center">
                                <tr class="bg-dark text-white">
                                    <td>id</td>
                                    <td>firstname</td>
                                    <td>lastname</td>
                                    <td>username</td>
                                    <td>email</td><br><br>
                                    <td>password</td>
                                    <td> phone_number</td>
                                    <td>Edit</td>
                                    <td>Delete</td>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <form method="POST" action="">
                                            <td><?php echo $row['id'] ?> </td>
                                            <td><input type="text" name="firstname" value="<?php echo $row['firstname'] ?>"></td>
                                            <td><input type="text" name="lastname" value="<?php echo $row['lastname'] ?>"></td>
                                            <td><input type="text" name="username" value="<?php echo $row['username'] ?>"></td>
                                            <td><input type="text" name="email" value="<?php echo $row['email'] ?>"></td><br><br>
                                            <td><input type="text" name="password" value="<?php echo $row['password'] ?>"></td>
                                            <td><input type="text" name="phone_number" value="<?php echo $row['phone_number'] ?>"></td>
                                            <td>
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                                            </td>
                                        </form>
                                        <td><a href="?delete_id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br><br>
    <a class="button" href="logout.php">logout</a>
</body>

</html>