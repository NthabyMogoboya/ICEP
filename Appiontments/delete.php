<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'database.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM clients WHERE id=$id");

header("Location: display.php");