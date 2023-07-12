<?php


$firstname=$_POST['fname'];
$lastname=$_POST['lname'];

$email=$_POST['email'];
$password=$_POST['pass'];

$conn=new mysqli("localhost","root","","mydatabase");
if($conn->connect_error){
    die('connection faild :'.$conn->connect_error);
    echo "hi";
}
else{
  

    $stmt= $conn->prepare("insert into Users(firstname,lastname,email,password) values (?,?,?,?)");
    $stmt->bind_param("ssss",$firstname,$lastname,$email,$password);
    $stmt->execute();

    echo "<script>alert('registeraton successfully...')</script>";
    $stmt->close();
    $conn->close();
}

?>