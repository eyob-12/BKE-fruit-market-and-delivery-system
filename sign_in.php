<?php
 $conn=new mysqli("localhost","root","","project");
 if($conn->connect_error){
     die('connection faild :'.$conn->connect_error);
 }
 else{
  $email = $_POST['email'];
 $password = $_POST['pass'];
    $sql = "SELECT * from user where email='$email' and password='$password' ";
    $result = mysqli_query($conn,$sql);
    $SQL = "SELECT * from Admin where email='$email' and password='$password' ";
    $RESULT = mysqli_query($conn,$SQL);
  
    if( mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_array($result);
    if($row['email']===$email && $row['password']===$password)
  
   {
    session_start();
        $_SESSION['user']=$email;
       header("location:index.html");

   }

   }
   elseif( mysqli_num_rows($RESULT)==1)
    {
        $row=mysqli_fetch_array($RESULT);
    if($row['email']===$email && $row['password']===$password)
    {
        session_start();
        $_SESSION['user']=$email;

        header("location:admin.php");
    }
    }
    else
    {
        header("location:sign-in.html?error=Incorrect user Name or Passwod");
        echo '<script>alert("incorrect user name or password");</script>';
    }


 }
?>