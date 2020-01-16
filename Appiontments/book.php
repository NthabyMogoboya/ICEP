<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
        <style>
            body{
                background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('images/bg.jpeg');
            }
            .menu{
                transform: translate(0%,-50%);
            }
        </style>
    </head>
    <body>
        <div class="title">
            <h1>Doctor Appointment Form</h1>
        </div>
        
        <?php
            include_once 'save.php';
            
            if(isset($_GET['date'])){
                $date = $_GET['date'];
            }
            
        ?>
        
        <h3>Book for <?php echo date('F d, Y', strtotime($date));  ?></h3>
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
        
        
        <form class="appoint" action="" method="post">
            <fieldset>
                Full Names <input type="text" name="names" placeholder="Names" required="">
            </fieldset>
            <fieldset>
                Identity Number <input type="number" name="idN" placeholder="ID Number" required="">
            </fieldset>
            <fieldset>
                Gender<br>
                <input type="radio" name="gender" value="Male">Male
                <input type="radio" name="gender" value="Female">Female
            </fieldset>
            <fieldset>
                Email Address <input type="email" name="mail" placeholder="E-Mail" required="">
            </fieldset>
            <fieldset>
                Contact Number <input type="number" name="cNumb" placeholder="Cellphone" required="">
            </fieldset>
            <fieldset>
                Address <br><input type="text" name="street" placeholder="Street">
                <br> <input type="text" name="city" placeholder="City" required="">
                <br> <input type="number" name="code" placeholder="Code" required="">
            </fieldset>
            <fieldset>
                Choose one*
                <br><input type="radio" name="checkup" value="New Patient" checked="checked">New Patient
                <br><input type="radio" name="checkup" value="A Routine Checkup">A Routine Checkup
                <br><input type="radio" name="checkup" value="A Comprehensive Health Exam">A Comprehensive Health Exam
            </fieldset>
            <fieldset class="btn">
                <input type="submit" name="submit" value="Book Appointment">
            </fieldset>
            <?php
              
              
            ?>
            
        </form>
    </body>
</html>
