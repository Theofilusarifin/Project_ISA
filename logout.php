<?php
unset($_SESSION['username']);
unset($_SESSION['name']);
unset($_SESSION['id']);

header("Location: index.php");
