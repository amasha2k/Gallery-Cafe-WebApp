<?php
session_start();
$_SESSION['message'] = "Admin has been deleted";
print_r($_SESSION);
if (isset($_SESSION['loginError'])) {
    $loginfail = $_SESSION['loginError'];
    unset($_SESSION['loginError']);
} else {
    $loginfail = "";
}

echo $loginfail;
