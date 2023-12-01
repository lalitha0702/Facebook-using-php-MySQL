<?php
session_start();
?>
<html>
    <head>
        <style>
            .d1{
                text-align:center;
                border-style:solid;
                border-width:1px;
                border-color:black;
                margin-right:300px;
                margin-left:300px;
                margin-top:50px;
                box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.075),0 17px 50px 0 rgba(0, 0, 0, 0.043);
                background-color:white;
            }
            textarea{
                margin-top:5px;
            }
            button{
                margin-top:5px;
                margin-bottom:9px;
            }
            input[type=file]{
                color:blue;
            }
            button{
                background-color:lightblue;
                color:black;
                text-align:center;
                padding: 9px 25px;
                border:none;
            }
            button:hover{
                cursor:pointer;
            }
            .container{
                background-color:rgb(90,135,255);
                padding-left:4px;
                padding-top: 4px;
                padding-bottom: 5px;
            }
            .d2{
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
            body{
                background-color: rgb(226, 233, 255);
            }
            a:hover{
                background-color:rgb(120,162,255);
                color:rgb(255,255,255);
            }
        </style>
    </head>

    <body>
        <div class="container">
                <h1 style="font-size:50px;font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;align:left;color:rgb(255, 255, 255)">
                    <b>facebook</b>
                </h1>
        </div>
        <div class="d2">
            <a href="profile.php">Profile</a>
            <a href="uploadpage.php">Upload</a>
            <a href="top.php">Top Posts</a>
            <a href="logout.php">Log out</a>
        </div>
        
        <form method="post" action="upload.php" enctype="multipart/form-data">
			<input type="hidden" name="userid" value="<?php echo $_SESSION['fname']; ?>">
            <div class="d1">
                <br>
                <input type="file" name="image" required> <br>
                <textarea name="comment" rows="10" cols="50"></textarea> <br>
                <button type="submit" name="submit">Upload</button>
                <br>
            </div>
        </form>
    </body>
</html>