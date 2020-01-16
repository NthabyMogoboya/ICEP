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
        <?php
            include_once 'database.php';
        
            if(isset($_POST['update'])){
                $id = $_POST['id'];
                $names = $_POST['fName'];
                $ident = $_POST['identity'];
                $email = $_POST['mail'];
                $number = $_POST['phone'];
                $street = $_POST['street'];
                $cty = $_POST['city'];
                $cd = $_POST['code'];
                
                $result = mysqli_query($conn, "UPDATE clients SET Names='$names' WHERE id=$id");
                
                header("Location: display.php");
            }
            
            $id = $_GET['id'];
            
            $result = mysqli_query($conn, "SELECT * FROM clients WHERE id=$id");
            
            while ($user_data = mysqli_fetch_array($result)){
                $names = $user_data['Names'];
                $ident = $user_data['IdNumber'];
                $email = $user_data['Email'];
                $number = $user_data['Contact'];
                $street = $user_data['Street'];
                $cty = $user_data['City'];
                $cd = $user_data['Code'];
            }
            
        ?>
        
        <form class="update" action="edit.php" method="post">
            <table>
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="fName" value="<?php echo $names; ?>"></td>
                </tr>
                <tr>
                    <td>Identity Number</td>
                    <td> <input type="number" name="idN" value="<?php echo $ident; ?>"></td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td> <input type="email" name="mail" value="<?php echo $email; ?>"></td>
                </tr>
                <tr>
                    <td>Contact Number</td> 
                    <td><input type="number" name="cNumb" value="<?php echo $number; ?>"></td>
                </tr>
                <tr>
                    <td>Address </td>
                    <td><input type="text" name="street" value="<?php echo $street; ?>">
                        <br> <input type="text" name="city" value="<?php echo $cty; ?>">
                        <br> <input type="number" name="code" value="<?php echo $cd; ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
                
            </table>
        </form>
    </body>
</html>
