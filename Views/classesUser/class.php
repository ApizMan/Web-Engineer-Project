<?php

    session_start();

    if($_SESSION["Login"] != "YES"){
        header("Location: ../../index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Class</title>
    <link rel="icon" href="../../logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <link rel="stylesheet" href="./styleSheet/userClass.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://www.jqueryscript.net/demo/Two-side-Multi-Select-Plugin-with-jQuery-multiselect-js/js/multiselect.js"></script>
    <script>
        function myFunction() {
            let x = document.forms["class_form"]["className"].value;
            let y = document.forms["class_form"]["faculty"].value;
            if(x == "" || x == null){
              alert("Class name must be fill.");
              return false;
            }
            if(y == "" || y == null){
              alert("Faculty must be choose.");
              return false;
            }

            alert("The Class Successfully been created!!");
        }
    </script>
    <style>
        #create:hover{
            background-color:black;
            opacity: 0.8;
        }
        #create{
            width: 20%;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #33b998;
            opacity: 0.9;
            margin-bottom: 10px;
            margin-left: 10%;
        }
    </style>
</head>
<body>
<a href="../../calendar_view/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../../calendar_view/index.php" style="text-decoration: none;">Home</a>
        <a href="../broadcast/index.php" style="text-decoration: none;">Broadcast</a>
        <a href="../viewProgress/index.php" style="text-decoration: none;">Progress</a>
        <a href="../report/index.php" style="text-decoration: none;">Report</a>
        <a href="../../logout.php" id="username" style="text-decoration: none;">Logout</a>
        <a href="../Profile/index.php" style="float: right; margin-top:-15px; margin-bottom:-15px"><img src="../../logo/user_logo.png" alt="User Logo" id="userlogo"></a>
    </div>
    <hr>

    <h1 id="title">User Class</h2>
    <a href="index.php" style="margin-left: 5%; text-decoration: none;"><<-Back</a>

    <br><br>

    <form action="content.php" method="POST" name="class_form" id="insert_data">
        <center>
            <label for="className">Class Name: </label>
            <input type="text" id="className" name="className" style="width: 80%;">

            <br><br>

            <label for="faculty" style="margin-right: 30px;">Faculty: </label>
            <select name="faculty" id="faculty" name="faculty" style="width: 80%;">
                <option value="" hidden>-Select Faculty-</option>
                <option value="Faculty of Computer">Faculty of Computer</option>
                <option value="Faculty of Engineering Technology">Faculty of Engineering Technology</option>
                <option value="Faculty of Industrial Sciences and Technology">Faculty of Industrial Sciences and Technology</option>
                <option value="Faculty of Electrical and Electronic Engineering Technology">Faculty of Electrical and Electronic Engineering Technology</option>
                <option value="Faculty of Civil Engineering Technology">Faculty of Civil Engineering Technology</option>
                <option value="Faculty of Industrial Management">Faculty of Industrial Management</option>
                <option value="Faculty of Chemical and Process Engineering Technology">Faculty of Chemical and Process Engineering Technology</option>
            </select>
        </center>

        <br>

        <fieldset class="supervisor">
        <center style="margin-right: 65%;">
            <label for="userType">User Type: </label>
            <label for="typeSuper" style="font-size:xx-large;">Supervisor</label>
        </center>
        <div class="container">
            <div class="row">

                <div class="col-xs-5">
                <?php
                    include("dbase.php");

                    $query = "SELECT name FROM supervisor GROUP BY name ORDER BY name ASC";
                    $result = mysqli_query($conn,$query);

                    if (mysqli_num_rows($result) > 0){
                        // output data of each row
                ?>
                    <select name="from" id="undo_redo" class="form-noClass_Super" size="11" multiple="multiple" style="width: 100%;">
                        <?php
                            $i=0;
                            while($row = mysqli_fetch_assoc($result)){
                                $supervisor = $row["name"];
                        ?>
                        <option value="<?php echo $supervisor; ?>"><?php echo $supervisor; ?></option>
                        <?php
                            $i++;
                            }
                        ?>
                    </select>
                </div>
                <?php
                    }
                ?>
                <div class="col-xs-2">
                    <button type="button" id="undo_redo_undo" class="btn btn-primary btn-block">undo</button>
                    <button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                    <button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                    <button type="button" id="undo_redo_redo" class="btn btn-warning btn-block">redo</button>
                </div>
                <div class="col-xs-5">
                    <select name="supervisor[]" id="undo_redo_to" class="form-assignSuper" size="11" multiple="multiple" style="width: 100%;">
                        <optgroup label="New Class" style="font-style: italic; font-size:larger; opacity:0.5"></optgroup>

                        <?php
                            /*extract( $_POST );
                            $query = "INSERT INTO userclass (supervisor) VALUES('$supervisor')";
                        */?>
                    </select>
                </div>
            </div>
        </div>

        </fieldset>

        <br><br>

        <fieldset class="student">
        <center style="margin-right: 68%;">
            <label for="userType">User Type: </label>
            <label for="typeStd" style="font-size:xx-large;">Student</label>
        </center>
        <div class="container">
            <div class="row">

                <div class="col-xs-5">
                <?php
                    $query = "SELECT name FROM student GROUP BY name ORDER BY name ASC";
                    $result = mysqli_query($conn,$query);

                    if (mysqli_num_rows($result) > 0){
                        // output data of each row
                ?>
                    <select name="from" id="std_undo_redo" class="form-noClass_Std" size="11" multiple="multiple" style="width: 100%;">
                        <?php
                            $i=0;
                            while($row = mysqli_fetch_assoc($result)){
                                $student = $row["name"];
                        ?>
                        <option value="<?php echo $student; ?>"><?php echo $student; ?></option>
                        <?php
                            $i++;
                            }
                        ?>
                    </select>
                </div>
                <?php
                    }
                ?>
                <div class="col-xs-2">
                    <button type="button" id="std_undo_redo_undo" class="btn btn-primary btn-block">undo</button>
                    <button type="button" id="std_undo_redo_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                    <button type="button" id="std_undo_redo_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                    <button type="button" id="std_undo_redo_redo" class="btn btn-warning btn-block">redo</button>
                </div>
                <div class="col-xs-5">
                    <select name="student[]" id="std_undo_redo_to" class="form-assignStd" size="13" multiple="multiple" style="width: 100%;">
                        <optgroup label="New Class" style="font-style: italic; font-size:larger; opacity:0.5"></optgroup>
                    </select>
                </div>
            </div>
        </div>
        </fieldset>

        <br><br>

        <fieldset class="evaluator">
        <center style="margin-right: 68%;">
            <label for="userType">User Type: </label>
            <label for="typeEvaluator" style="font-size:xx-large;">Evaluator</label>
        </center>
        <div class="container">
            <div class="row">

                <div class="col-xs-5">
                <?php
                    $query = "SELECT name FROM evaluator GROUP BY name ORDER BY name ASC";
                    $result = mysqli_query($conn,$query);

                    if (mysqli_num_rows($result) > 0){
                        // output data of each row
                ?>
                    <select name="from" id="eva_undo_redo" class="form-noClass_Evaluator" size="11" multiple="multiple" style="width: 100%;">
                        <?php
                            $i=0;
                            while($row = mysqli_fetch_assoc($result)){
                                $evaluator = $row["name"];
                        ?>
                        <option value="<?php echo $evaluator; ?>"><?php echo $evaluator; ?></option>
                        <?php
                            $i++;
                            }
                        ?>
                    </select>
                </div>
                <?php
                    }
                ?>
                <div class="col-xs-2">
                    <button type="button" id="eva_undo_redo_undo" class="btn btn-primary btn-block">undo</button>
                    <button type="button" id="eva_undo_redo_rightSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                    <button type="button" id="eva_undo_redo_leftSelected" class="btn btn-default btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                    <button type="button" id="eva_undo_redo_redo" class="btn btn-warning btn-block">redo</button>
                </div>
                <div class="col-xs-5">
                    <select name="evaluator[]" id="eva_undo_redo_to" class="form-assignEva" size="13" multiple="multiple" style="width: 100%;">
                        <optgroup label="New Class" style="font-style: italic; font-size:larger; opacity:0.5"></optgroup>
                    </select>
                </div>
            </div>
        </div>
        </fieldset>

        <script>
            $(document).ready(function() {
            $('#undo_redo').multiselect();
            $('#std_undo_redo').multiselect();
            $('#eva_undo_redo').multiselect();
            });
        </script>

        <br>
        
        <input type="submit" name="create" id="create" value="Create New Class" onclick="return myFunction()">
    </form>
</body>
</html>