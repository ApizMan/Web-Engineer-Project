<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in | Coordinator</title>
    <link rel="icon" href="../mainPage/logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./LoginStyle/style.css">
    <link rel="icon" href="./logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
</head>
<body>
    <center>
        <img src="./logo/logo.png" alt="Logo Project" style="margin-bottom: 10%; margin-top:-200px;">
    </center>
    <form action="login.php" method="post">
            <h2>LOGIN</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name"><br>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>

            <button type="submit">Login</button>
            <br><br>
    </form>

</body>
</html>