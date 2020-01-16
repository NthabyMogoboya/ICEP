<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
         <style>
            body{
                background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('images/bg.jpeg');
            }
           
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="nav">
                <div class="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="schedule.php">Book</a></li>
                        <li><a href="login.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="title">
        </div>
        <?php
            if(!isset($_SESSION['id'])){
                
        ?>
        <div class="signin">
            
            <h2>Login</h2>
            
            <form action="" method="post">
                <fieldset>
                    <input type="text" name="name" placeholder="Username">
                </fieldset>
                <fieldset>
                    <input type="password" name="password" placeholder="Password">
                </fieldset>
                <fieldset>
                    <input type="submit" name="login" value="Login">
                </fieldset>
            </form>
        </div>
        <?php
            }else{
        ?>
        <p><a href="display.php?logout=yes">Logout</a></p>
        <?php
            }
            include_once 'database.php';
            
            if(isset($_GET['logout'])){
                session_destroy();
            }
            if(isset($_POST['login'])){
                $usern = isset($_POST['name']) ? $_POST['name']: "";
                $pass = isset($_POST['password']) ? $_POST['password'] : "";
                
                $q = "SELECT * FROM admin WHERE username='$usern' AND password='$pass'";
                
                $res = mysqli_query($conn, $q);
                
                if($res->num_rows > 0){
                    $user_details = $res->fetch_object();
                    $user_id = $user_details->id;
                    $_SESSION['id'] = $user_id;
                    
                    header("Location: display.php");
                } else {
                    echo 'Username and/or Password is incorrect';
                }
            }
        
        ?>
    </body>
</html>
