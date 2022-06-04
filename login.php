<?php
session_start();

include "db_conn.php";

if (isset($_GET['username']) && isset($_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

    if ($_GET['username'] == "" && $_GET['password'] == "") {
        header("Location: index.php?error=1");
        exit();
    } else if ($_GET['username'] == "") {
        header("Location: index.php?error=2");
        exit();
    } else if ($_GET['password'] == "") {
        header("Location: index.php?error=3");
        exit();
    } else {
        $sql = "select * from users where username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] == $password) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                // header("Location: home.php?username=username&&pass=pass");
                exit();
            } else {
                header("Location: index.php?username=username&&password=password&&error=4");
                exit();
            }
        } else {
            header("Location: index.php?username=username&&password=password&&error=4");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
