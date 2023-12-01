<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$_POST['fname'];
    $eid=$_POST['email'];
    $pa=$_POST['pass'];
$host='localhost';
$username='root';
$password='';
$dbname='lalithaln';

$conn=mysqli_connect($host,$username,$password,$dbname);

if($conn){
    $sql1="SELECT * FROM su1 WHERE email='$eid' AND password='$pa'";
    $upload1=mysqli_query($conn,$sql1);
    if(mysqli_num_rows($upload1)>0){
        $_SESSION['fname']=$name;
        $_SESSION['email']=$eid;
        $_SESSION['password']=$pa;
        header('Location:home.php');
    }
    else{
        echo "<script> alert('Invalid Credentials');</script>";
        //header("Location:login.html");
        echo "Invalid Credentials are entered..";
        echo "Verify your details please";
        ?>
        <br>
        <a href="login.html">Log in here</a>
        or
        <a href="signup.html">Sign up here</a>
        <?php
    }
}
else{
    echo "Connection failed".mysqli_connect_error();
    die("Connection Failed:".mysqli_connect_error());
}
}
?>