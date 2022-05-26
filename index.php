<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) {
            switch($_GET['error']) {
                case 1:?>
                    <p class="error"> <?php echo "Username and Password is REQUIRED."; ?> </p>
            <?php break;
                case 2:?>
                    <p class="error"> <?php echo "Username is REQUIRED."; ?> </p>
            <?php break;
                case 3:?>
                    <p class="error"> <?php echo "Password is REQUIRED."; ?> </p>
            <?php break;
                case 4:?>
                    <p class="error"> <?php echo "Incorrect Username or Password is REQUIRED."; ?> </p>
            <?php break;?>
        <?php }} ?>
        <label for="uname">Username: </label>
        <input type="text" name="uname" placeholder="Username">
        <br>
        <label for="pass">Password: </label>
        <input type="password" name="pass" placeholder="Password">
        <br>
        <button type="submit" value="submit">Login</button>
    </form>
</body>

</html>