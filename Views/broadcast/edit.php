<?php
require_once "dbase.php";
if(isset($_POST["submit"]) && $_POST["submit"]!="") {
$membersCount = count($_POST["title"]);
for($i=0;$i<$membersCount;$i++) {

	$date = date("d-m-Y", time());
	$time = date("H:i:s", time());

	mysqli_query($conn, "UPDATE student SET date='" . $date . "', time='" . $time . "', category='" . $_POST["category"][$i] . "', title='" . $_POST["title"][$i] . "', announcement='" . $_POST["announcement"][$i] . "' WHERE id='" . $_POST["id"][$i] . "'");
}
header("Location:index.php");
}
?>
<html>
	<head>
    <title>Broadcast UMP</title>
    <link rel="stylesheet" href="./styleSheet/broadcastStyle.css">
    </style>
</head>
<body>
<body>
	<a href="../../calendar_view/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../../calendar_view/index.php">Home</a>
        <a href="../classesUser/index.php">User Class</a>
        <a href="../Views/view_progress.html">Progress</a>
        <a href="../Views/report.html">Report</a>
        <a href="#UserName" id="username">Username</a>
        <img src="../../logo/user_logo.png" alt="User Logo" id="userlogo">
    </div>
    <hr>

    <h1 id="title">Broadcast</h1>

    <br>

    <form name="frmUser" method="POST" action="">
        <fieldset style="height: auto;">
            <div class="container_1">
			<?php
				$count = count($_POST["student"]);
				for($i=0;$i<$count;$i++) {
				$result = mysqli_query($conn, "SELECT * FROM student WHERE id='" . $_POST["student"][$i] . "'");
				$row[$i]= mysqli_fetch_array($result);
			?>
                <label for="category">Category:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="hidden" name="id[]" class="txtField" value="<?php echo $row[$i]['id']; ?>">
                <select name="category[]">
                    <option value="<?php echo $row[$i]['category']; ?>" hidden>-Choose Type Announcement-</option>
                    <option value="Information">Information</option>
                    <option value="News">News</option>
                    <option value="Important">Important</option>
                    <option value="Project Award">Project Award</option>
                </select>
                <br><br>
                <label for="title">Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="titleName" name="title[]" value="<?php echo $row[$i]['title']; ?>">
            </div>

            <textarea name="announcement[]" id="announcement" cols="30" rows="10"><?php echo $row[$i]['announcement']; ?></textarea>

            <script src="../../../ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('announcement');
            </script>

            <br>

            <div class="submit">
                <div class="center">
                    <input class="button" type="submit" value="Submit" name="submit">
                </div>
            </div>
			<?php
				}
			?>
        </fieldset>

        <br><br>

        <script>
            function myFunction(){
                alert("Your broadcast successful updated!");
            }
        </script>
    </form>
</body>
</html>