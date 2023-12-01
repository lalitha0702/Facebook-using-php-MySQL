<?php
session_start();
if(empty($_SESSION['fname']))
{
	header('Location:login.html');
}
?>
<?php
if($_SESSION['fname'] && $_SESSION['email'] && $_SESSION['password']){
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
    <b><p align="center" style="font-size:18px;">Welcome <?php echo $_SESSION['fname']; ?></p></b>
<?php  
}
?>

<div class="right-column" align="center">
	<?php
        $servername = "localhost";
		$uname = "root";
		$password = "";
		$dbname = "lalithaln";
				
		$conn = new mysqli($servername, $uname, $password, $dbname);
				
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
        
		$sql = "SELECT * FROM images ORDER BY time";
	    $result = mysqli_query($conn, $sql);
	    if (mysqli_num_rows($result) > 0) {
	        while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='post'>";
                echo  "<h2>".$row["userid"]."</h2>";
                echo "<img src='uploads/" . $row["image"] . "' alt='post'>";
                echo "<p><b>".$row['userid']."</b> ".$row['comment']."</p>";
                echo "<div class='actions'>";
                echo "<form method='post' action='like.php'>";
                echo "<input type='hidden' name='uid' value=".$_SESSION['fname'].">";
                echo "<input type='hidden' name='iid' value=".$row["image"].">";
                echo "<button type='submit' class='bu1'>Like:<span>".$row['likes']."</span></button>";
                echo "</form>";
                echo "<form method='post'>";
                echo "<input type='text' name='cmt'>";
                echo "<input type='hidden' value=".$row['image']." name='id' >";
                echo "<input type='hidden' value=".$_SESSION['fname']." name='email'>";
                echo "<input type='submit' name='submit1' value='comment' class='bu1'>";
                echo "</form>";
                echo "</div>";
                echo "<span>Uploaded on ".$row["time"]."</span>";
                echo "</div>";
                echo "<div class='c2'>";
                    $image=$row['image'];
                    $comment= "select * from comment where file='$image'";
                    $res=mysqli_query($conn,$comment);
                    echo "<h3 class='c1'>comments</h3>";
                    while($oc=mysqli_fetch_array($res))
                    {
                        echo "<p class='c3'><b>".$oc['email']."</b> : ".$oc['comment']."</p>";
                    }
                echo "</div>";
                echo "<br><br>";
                echo "<hr style='height:1px;border-width:0;background-color:lightgrey;width:1300px;'>";
                echo "<br><br><br>";
	        }
		}
        else {
					echo "No images found.";
		}
        if(isset($_POST['submit1'])){
            $fi=$_POST["id"];
            $em=$_POST["email"];
            $cm=$_POST["cmt"];
            if($cm!="")
            {
                mysqli_query($conn,"INSERT INTO comment(file,email,comment) VALUES('$fi','$em','$cm')");
                //header('Location:home.php');
            }
            
        }

		mysqli_close($conn);
		?>
		</div>
<style>
    
.d1{
        display:block;
        background-color:rgb(255,255,255);
        padding-top:2px;
        padding-bottom:2px;
        padding-left:2px;
        margin-top:3px;
    }
    .c3{
        text-align:left;
    }
    .bu1{
        border: none;
        color: black;
        padding: 3px 12px;
        background-color:rgb(226, 233, 245);
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
        /*-webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;*/
    }
    .bu1:hover{
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
    .c2{
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        width:600px;
        margin-left:300px;
        align-items:center;
    }
    .c1{
        font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .d1 a{
        padding:1px 5px;
        text-decoration:none;
        color:rgb(108,142,250);
        font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    a{
        padding:1px 5px;
        text-decoration:none;
        color:rgb(108,142,250);
        font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    body{
        background-color: rgb(226, 233, 245);
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
    
    .right-column{
        margin-left:0px;
        margin-right:400px;
    }

/* Posts */
    .post {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        width:600px;
        margin-left:300px;
        align-items:center;
    }
    .post h2 {
        font-size: 20px;
        margin-bottom: 10px;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .post p {
        font-size: 16px;
        color: #666;
        margin-bottom: 20px;
    }

    .post img {
        max-width: 100%;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .actions a {
        text-decoration: none;
        margin-right: 10px;
    }

    .actions a:hover {
        text-decoration: none;
        cursor:pointer;
    }

    .post span {
        font-size: 12px;
        color: rgb(0,0,0);
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    p{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>