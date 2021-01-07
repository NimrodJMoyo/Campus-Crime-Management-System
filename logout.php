<?php
session_start();
unset($_SESSION['username']);
session_destroy();

header("Location: login.php");
$_SESSION['message']="You have Successifully Logged out!";
exit;
?>