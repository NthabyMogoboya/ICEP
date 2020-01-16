<html>
    <head>
        <title>Appointments</title>
        <link rel="stylesheet" href="style.css">
        <style>
            body{
                background-color: #363841;
            }
            table,th,td{
                border: 1px solid #1e919b;
                border-collapse: collapse;
            }
            th,td{
                padding: 5px;
            }
            table th{
                background-color: #1e919b;
            }
            table tr:nth-child(even){
                background-color: #3fbac5;
            }
            table tr:nth-child(odd){
                background-color: #67dfea;
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
        <h1>Appointments</h1>
        <div class="display">
            <?php

            /* 
             * To change this license header, choose License Headers in Project Properties.
             * To change this template file, choose Tools | Templates
             * and open the template in the editor.
             */

            include_once 'database.php';

            $qry = "SELECT * FROM clients ORDER BY id DESC";

            $sql = mysqli_query($conn, $qry);

                echo '<table class="client">';
                echo '<tr>';
                echo '<th>Full Name</th> <th>ID Number</th> <th>Gender</th> <th>Email</th> <th>Contact Number</th> <th>Address</th> <th>Checkup</th> <th>Date</th> <th>Action</th>';
                
            while ($row = mysqli_fetch_array($sql)) {
                echo '</tr>';
                echo '<tr>';
                echo "<td>".$row['Names']."</td>";
                echo "<td>".$row['IdNumber']."</td>";
                echo "<td>".$row['Gender']."</td>";
                echo '<td>'.$row['Email']."</td>";
                echo '<td>'.$row['Contact']."</td>";
                echo '<td>'.$row['Street']." ".$row['City']." ".$row['Code']."</td>";
                echo '<td>'.$row['Checkup']."</td>";
                echo '<td>'.$row['date'].'</td>';
                echo "<td><a href='edit.php?id=$row[id]'>Edit</a> | <a href='delete.php?id=$row[id]'>Delete</a></td>";
                echo '</tr>';
            }
                echo '</table>';
            ?>
        </div>
    </body>
</html>