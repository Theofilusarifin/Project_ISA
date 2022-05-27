<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="assets/index.css">
</head>

<body>
    <div class="container">
        <img src="assets/cover.png" alt="">
        <form action="login.php" method="POST">
            <div class="content">
                <div class="rectangle">
                    <p>LOGIN</p>
                    <?php if (isset($_GET['error'])) {
                        switch ($_GET['error']) {
                            case 1: ?>
                                <p class="error"> <?php echo "Username and Password is REQUIRED."; ?> </p>
                            <?php break;
                            case 2: ?>
                                <p class="error"> <?php echo "Username is REQUIRED."; ?> </p>
                            <?php break;
                            case 3: ?>
                                <p class="error"> <?php echo "Password is REQUIRED."; ?> </p>
                            <?php break;
                            case 4: ?>
                                <p class="error"> <?php echo "Incorrect Username or Password is REQUIRED."; ?> </p>
                                <?php break; ?>
                    <?php }
                    } ?>
                    <label for="uname">Username: </label>
                    <input type="text" name="uname" placeholder="Username">
                    <br>
                    <label for="pass">Password: </label>
                    <input type="password" name="pass" placeholder="Password">
                    <br>
                    <input class="mybutton" type="submit" value="Login">
                </div>
            </div>
        </form>
    </div>
</body>


</html>







