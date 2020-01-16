<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'database.php';
//include_once '';

if(isset($_GET['date'])){
                $date = $_GET['date'];
            }

if(isset($_POST['submit'])){
    $name = $_POST['names'];
    $idNum = $_POST['idN'];
    $gend = $_POST['gender'];
    $email = $_POST['mail'];
    $contact = $_POST['cNumb'];
    $str = $_POST['street'];
    $city = $_POST['city'];
    $code = $_POST['code'];
    $patient = $_POST['checkup'];
    //$date = $_GET['date'];
    
    $query = "INSERT INTO clients (id,Names,IdNumber,Gender,Email,Contact,Street,City,Code,Checkup,date) VALUES ('','$name','$idNum','$gend','$email','$contact','$str','$city','$code','$patient','$date')";
    
    $result = mysqli_query($conn, $query);
    
    echo '<script language="javascript">';
    echo 'alert("Booking Successful");';
    echo 'window.location.href="schedule.php";';
    echo '</script>';
    
    
}