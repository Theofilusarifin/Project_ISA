<?php
session_start();

include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['pass'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if ($_POST['uname'] == "" && $_POST['pass'] == ""){
        header("Location: index.php?error=1");
        exit();
    }
    else if ($_POST['uname'] == ""){
        header("Location: index.php?error=2");
        exit();
    }
    else if ($_POST['pass'] == ""){
        header("Location: index.php?error=3");
        exit();
    }
    else{
        $sql = "select * from users where username = '$uname' and password = '$pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $uname && $row['password'] == $pass){
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }
            else{
                header("Location: index.php?error=4");
                exit();
            }
        }
        else{
            header("Location: index.php?error=4");
            exit();
        }
    }
}
else{
    header("Location: index.php");
    exit();
}
?>