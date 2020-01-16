<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$host = "localhost";
$user = "root";
$password = "";
$database = "appointment";

$conn = mysqli_connect($host, $user, $password, $database);