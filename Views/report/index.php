<?php

    session_start();

    if($_SESSION["Login"] != "YES"){
        header("Location: ../../index.php");
    }

    include "dbase.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report | Coordinator</title>
    <link rel="icon" href="../../logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <link rel="stylesheet" href="../report/styleSheet/index_style.css">
    <link href='../report/jquery-ui-1.13.0/jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src='../report/jquery-ui-1.13.0/jquery-ui.min.js' type='text/javascript'></script>
   <script type='text/javascript'>
   $(document).ready(function(){
     $('.dateFilter').datepicker({
        dateFormat: "yy-mm-dd"
     });
   });
   </script>
   <style>
                table{
            border: 1px solid black;
            height: 50%;
            width: 100%;
            margin-bottom: 20px;
        }

        h1{
            text-align: center;
        }

        table{
            background-color: rgb(41, 134, 114);;
        }

        th{
            height: 50%;
            border: 1px solid black;
            background-color: lightgreen;
        }

        td{
            text-align: center;
            height: 50%;
            border: 1px solid black;
            background-color: lightyellow;
        }
   </style>
</head>
<body>
<a href="../../calendar_view/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../../calendar_view/index.php" style="text-decoration: none;">Home</a>
        <a href="../classesUser/index.php" style="text-decoration: none;">User Class</a>
        <a href="../broadcast/index.php" style="text-decoration: none;">Broadcast</a>
        <a href="../viewProgress/index.php" style="text-decoration: none;">Progress</a>
        <a href="../../logout.php" id="logout" style="text-decoration: none; float:right;">Logout</a>
        <a href="../Profile/index.php" style="float: right; margin-top:-15px; margin-bottom:-15px"><img src="../../logo/user_logo.png" alt="User Logo" id="userlogo"></a>
    </div>
    <hr>

    <h1 id="title">Report Detail</h1>


    <fieldset style="border: 2px solid black;">
    <br>
        <center>
            <form method='post' action=''>
                Start Date <input type='text' class='dateFilter' name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>' required>
            
                End Date <input type='text' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>' required>

                <input type='submit' name='but_search' value='Search'>
            </form>
        </center>

    <!-- Broadcast List -->
        <div style='height: 80%; overflow: auto;' >

        <h2 style="text-align: center;"> Broadcast:</h2>
        
            <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;'>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Announcement</th>
                </tr>

            <?php
            $query_broadcast = "SELECT * FROM student WHERE id";

            // Date filter
            if(isset($_POST['but_search'])){
                $fromDate = $_POST['fromDate'];
                $endDate = $_POST['endDate'];

                if(!empty($fromDate) && !empty($endDate)){
                    $query_broadcast .= " and date 
                                between '".$fromDate."' and '".$endDate."' ";
                }
                }

                // Sort
                $query_broadcast .= " ORDER BY date DESC";
                $result = mysqli_query($con_broadcast,$query_broadcast);

                // Check records found or not
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $date = $row["date"];
                    $time = $row["time"];
                    $category = $row["category"];
                    $title = $row["title"];
                    $announcement = $row["announcement"];

                    echo "<tr>";
                    echo "<td hidden>". $id ."</td>";
                    echo "<td>". $date ."</td>";
                    echo "<td>". $time ."</td>";
                    echo "<td>". $category ."</td>";
                    echo "<td>". $title ."</td>";
                    echo "<td>". $announcement ."</td>";
                    echo "</tr>";
                }
                }else{
                echo "<tr>";
                echo "<td colspan='5'>No record found.</td>";
                echo "</tr>";
                }
                ?>
            </table>
        </div>

        <br>

        <!-- User Class List -->
        <div style='height: 80%; overflow: auto;' >

        <h2 style="text-align: center;"> User Class:</h2>

            <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;'>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Student</th>
                    <th>Supervisor</th>
                    <th>Evaluator</th>
                    <th>Faculty</th>
                    <th>Class Name</th>
                </tr>

            <?php
            $query_class = "SELECT * FROM userclass WHERE id";

            // Date filter
            if(isset($_POST['but_search'])){
                $fromDate = $_POST['fromDate'];
                $endDate = $_POST['endDate'];

                if(!empty($fromDate) && !empty($endDate)){
                    $query_class.= " and date 
                                between '".$fromDate."' and '".$endDate."' ";
                }
                }

                // Sort
                $query_class .= " ORDER BY date DESC";
                $result = mysqli_query($con_userclass,$query_class);

                // Check records found or not
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $date = $row["date"];
                    $time = $row["time"];
                    $student = $row["student"];
                    $supervisor = $row["supervisor"];
                    $evaluator = $row["evaluator"];
                    $faculty = $row["faculty"];
                    $className = $row["className"];

                    echo "<tr>";
                    echo "<td hidden>". $id ."</td>";
                    echo "<td>". $date ."</td>";
                    echo "<td>". $time ."</td>";
                    echo "<td>". $student ."</td>";
                    echo "<td>". $supervisor ."</td>";
                    echo "<td>". $evaluator ."</td>";
                    echo "<td>". $faculty ."</td>";
                    echo "<td>". $className ."</td>";
                    echo "</tr>";
                }
                }else{
                echo "<tr>";
                echo "<td colspan='7'>No record found.</td>";
                echo "</tr>";
                }
                ?>
            </table>
        </div>

        <br>

        <!-- Calendar List -->
        <div style='height: 80%; overflow: auto;' >

        <h2 style="text-align: center;">Calendar Event:</h2>

            <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;'>
                <tr>
                    <th>Start Event</th>
                    <th>End Event</th>
                    <th>Title</th>
                </tr>

            <?php
            $query_calendar = "SELECT * FROM events WHERE id";

            // Date filter
            if(isset($_POST['but_search'])){
                $fromDate = $_POST['fromDate'];
                $endDate = $_POST['endDate'];

                if(!empty($fromDate) && !empty($endDate)){
                    $query_calendar.= " and start_event 
                                between '".$fromDate."' and '".$endDate."' ";
                }
                }

                // Sort
                $query_calendar .= " ORDER BY start_event DESC";
                $result = mysqli_query($con_calendar,$query_calendar);

                // Check records found or not
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $start_event = $row["start_event"];
                    $end_event = $row["end_event"];
                    $title = $row["title"];

                    echo "<tr>";
                    echo "<td hidden>". $id ."</td>";
                    echo "<td>". $start_event ."</td>";
                    echo "<td>". $end_event ."</td>";
                    echo "<td>". $title ."</td>";
                    echo "</tr>";
                }
                }else{
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
                }
                ?>
            </table>
        </div>

        <br>

        <center>
            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=192.168.1.3:8005/coordinator/views/report/userView.php%2F&choe=UTF-8" title="Link to QR Report" />
        </center>
    </fieldset>
</body>
</html>