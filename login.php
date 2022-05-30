<?php
session_start();

include "db_conn.php";

if (isset($_GET['uname']) && isset($_GET['pass'])) {
    $uname = $_GET['uname'];
    $pass = $_GET['pass'];

    if ($_GET['uname'] == "" && $_GET['pass'] == "") {
        header("Location: index.php?error=1");
        exit();
    } else if ($_GET['uname'] == "") {
        header("Location: index.php?error=2");
        exit();
    } else if ($_GET['pass'] == "") {
        header("Location: index.php?error=3");
        exit();
    } else {
        $sql = "select * from users where username = '$uname' and password = '$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] == $pass) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                // header("Location: home.php?uname=uname&&pass=pass");
                exit();
            } else {
                header("Location: index.php?error=4");
                exit();
            }
        } else {
            header("Location: index.php?error=4");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
