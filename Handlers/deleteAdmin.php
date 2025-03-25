<?php
session_start();
require_once ("dbconn.php");
$_admin_id = $_GET['adminid'];


$sql = "DELETE FROM `admin` WHERE admin_id = $_admin_id";
$result = mysqli_query($conn,$sql);
if($result){
    $_SESSION['message'] = "Admin Account has been deleted";
    header("Location:adminaddaccount.php");
}
else{
    $_SESSION['admin_error']="Deleting Failed";
    header("Location:adminaddaccount.php");
}