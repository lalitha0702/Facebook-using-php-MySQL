<?php
session_start();
$host='localhost';
$username='root';
$password='';
$dbname='lalithaln';

$conn=mysqli_connect($host,$username,$password,$dbname);

$name=$_SESSION['fname'];
$eid=$_SESSION['email'];
?>
<div class="container">
    <h1 style="font-size:50px;font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;align:left;color:rgb(255, 255, 255)">
        <b>facebook</b>
    </h1>
</div>
    
<div class="d1">
    <a href="profile.php">Profile</a>
    <a href="uploadpage.php">Upload</a>
    <a href="top.php">Top Posts</a>
    <a href="logout.php">Log out</a>
</div>
<h4 align="center">
    Welcome to facebook...<?php echo $_SESSION['fname'];?>
    <br><br>Your details...
</h4>
<?php
$sql2="SELECT * FROM su1 WHERE fname='$name' and email='$eid'";
$upload2=mysqli_query($conn,$sql2);
if($sql2){
    while($row = mysqli_fetch_assoc($upload2)){
        echo "<table border=0 cellspacing=0 cellpadding=13>";
        echo "<tr><td><label><b>First Name: </b></label>".$row['fname']."</td></tr>";
        echo "<tr><td><label><b>Surname: </b></label>".$row['sname']."</td></tr>";
        echo "<tr><td><label><b>Email: </b></label>".$row['email']."</td></tr>";
        echo "<tr><td><label><b>Date of Birth: </b></label>".$row['dob']."</td></tr>";
        echo "</table>";
    }
}
?>
<style>
    h4{
        font-size:20px;
        font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    table{
        margin-top:20px;
        text-align:center;
        font-size:20px;
        font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.075),0 17px 50px 0 rgba(0, 0, 0, 0.227);
        background-color:white;
        width:475px;
        margin-left:auto;
        margin-right:auto;
    }
    body{
        background-color: rgb(226, 233, 255);
    }
    .d1{
        display:block;
        background-color:rgb(255,255,255);
        padding-top:2px;
        padding-bottom:2px;
        padding-left:2px;
        margin-top:3px;
    }
    a{
        padding:1px 5px;
        text-decoration:none;
        color:rgb(108,142,250);
        font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    a:hover{
        background-color:rgb(120,162,255);
        color:rgb(255,255,255);
    }
    .container{
        background-color:rgb(90,135,255);
        padding-left:4px;
        padding-top: 4px;
        padding-bottom: 5px;
    }
</style>