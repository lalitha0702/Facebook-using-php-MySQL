<?php
$host='localhost';
$username='root';
$password='';
$dbname='lalithaln';

$conn=mysqli_connect($host,$username,$password,$dbname);

if($conn){
    $fname=$_POST['fname'];
    $sname=$_POST['sname'];
    $email=$_POST['email'];
    $gen=$_POST['gen'];
    $dob=$_POST['dob'];
    $pass=$_POST['password'];
    $sql="INSERT INTO su1(fname,sname,email,gender,dob,password) VALUES('$fname','$sname','$email','$gen','$dob','$pass')";
    $upload=mysqli_query($conn,$sql);
    if($upload){
        echo "<script>alert('Connection established and data saved succesfully...');</script>";
        ?>
        <a href="login.html">Please login here now...</a>
        <?php
    }
    else{
        echo "Error:".$sql."".mysqli_error($conn);
    }
}
else{
    echo "Connection failed".mysqli_connect_error();
    die("Connection Failed:".mysqli_connect_error());
}


?>