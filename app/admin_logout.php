<?php

session_start();
session_destroy();
unset($_SESSION['admin']);
$_SESSION['message']="You are now logged out";
header("location:admin_login_page.html");

?>