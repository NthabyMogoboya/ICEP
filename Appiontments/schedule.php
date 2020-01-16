<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
            <?php
            
            //include_once 'database.php';
        
            function build_calender($month,$year){
                $conn = mysqli_connect("localhost", "root", "", "appointment");
                $sql = $conn->prepare("SELECT * FROM clients WHERE MONTH(date)=? AND YEAR(date)=?");
                $sql->bind_param('ss',$month,$year);
                $bookings = array();
                
                if($sql->execute()){
                    $result = $sql->get_result();
                    if($result->num_rows>0){
                        while ($row = $result->fetch_assoc()){
                            $bookings[] = $row['date'];
                        }
                    }
                }
                
                $days = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
                
                $firstDayOfM = mktime(0,0,0,$month,1,$year);
                
                $numDays = date('t',$firstDayOfM);
                $dateInfo = getdate($firstDayOfM);
                $monthName = $dateInfo['month'];
                $dayOfWeek = $dateInfo['wday'];
                #current date
                $today = date('Y-m-d');
                
                $calender = "<table class='table table-bordered'>";
                $calender .= "<center><h2>$monthName $year</h2>";
                
                $calender.="<a class='btn btn-xs btn-primary' href='?month=".date('m',mktime(0,0,0,$month-1,1,$year))."&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Previous Month |</a>    ";
                $calender.=" <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month |</a> ";
                $calender.="<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0,0,0,$month+1,1,$year))."&year=".date('Y', mktime(0,0,0,$month+1,1,$year))."'>Next Month</a></center><br>";
                
                $calender .= "<tr>";
                
                foreach ($days as $day) {
                    $calender .="<th class='header'>$day</th>";
                }
                
                $currentDay = 1;
                
                $calender .= "</tr><tr>";
                
                if($dayOfWeek > 0){
                    for($x = 0; $x < $dayOfWeek;$x++){
                        $calender .="<td></td>";
                    }
                }
                
                $month = str_pad($month,2,"0", STR_PAD_LEFT);
                
                while ($currentDay <= $numDays){
                    if($dayOfWeek == 7){
                        $dayOfWeek = 0;
                        $calender .="</tr><tr>";
                    }
                    
                    $currentDayRel = str_pad($currentDay,2,"0",STR_PAD_LEFT);
                    $date = "$year-$month-$currentDayRel";
                    
                    $dayname = strtolower(date('l', strtotime($date)));
                    $eventNum = 0;
                    
                    $today = $date== date('Y-m-d')?"today":"";
                    
                    if($date < date('Y-m-d')){
                        $calender.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs' disabled>N/A</button>";
                    } elseif (in_array($date, $bookings)) {
                        $calender.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs' disabled>BOOKED</button>";
                }else {
                        $calender.="<td id='book' class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."' class='btn btn-success btn-xs'>BOOK</a>";
                    }
                    
                    $calender .="</td>";
                    
                    $currentDay++;
                    $dayOfWeek++;
                }
                
                if($dayOfWeek != 7){
                    $remainingDays = 7-$dayOfWeek;
                    for($i = 0;$i < $remainingDays; $i++){
                        $calender .="<td></td>";
                    }
                }
                
                $calender .="</tr>";
                $calender .="</table>";
                
                echo $calender;
            }
            
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device=width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <style>
            body{
                background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8)),url("images/book.jpg");
                /*background-color: */
            }
            table{
                table-layout: fixed;
                background-color: #e4e6e3;
                border: #7b7c7f;
                
            }
            td{
                width: 1%;
            }
            .today{
                background-color: #f9fb6c;
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
            table td:nth-child(even){
                background-color: #3fbac5;
            }
            table td:nth-child(odd){
                background-color: #67dfea;
            }
            a{
                text-decoration: none;
                color: cornflowerblue;
            }
            a:hover{
                
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
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        
                        $dateInfo = getdate();
                        if(isset($_GET['month']) && isset($_GET['year'])){
                            $month= $_GET['month'];
                            $year = $_GET['year'];
                        } else {
                            $month = $dateInfo['mon'];
                            $year = $dateInfo['year'];
                        }
                        
                        
                        echo build_calender($month, $year);
                    
                    ?>
                </div>
            </div>
        </div>
         <script>
        
          
        
        </script>
    </body>
</html>

