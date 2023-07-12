<?php




$firstname=$_POST['fname'];
$lastname=$_POST['lname'];

$email=$_POST['email'];

$feedback=$_POST['message'];

$conn=new mysqli("localhost","root","","mydatabase");
if($conn->connect_error){
    die('connection faild :'.$conn->connect_error);
}
else{
  

    $stmt= $conn->prepare("insert into feedback(firstname,lastname,email,message) values (?,?,?,?)");
    $stmt->bind_param("ssss",$firstname,$lastname,$email,$feedback);
    $stmt->execute();
    echo "hello";
   
   
   
   ini_set("sendfeedback_from",$email);
    $to="mesiratbelete216@gmail.com";
    $subject="to send feedback";
    $message="$feedback";
    $header="From:$email\r\n";
    
    $result=mail($to,$subject,$message,$header);
    if ($result==true) {
        
    

    echo '<script>alert("message sent successfully...")</script>';
    }
    else {
        echo '<script>alert("message is not sent ...")</script>';
    }
    $stmt->close();
    $conn->close();
}

?>