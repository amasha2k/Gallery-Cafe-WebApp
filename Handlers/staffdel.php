<?php
session_start();
require_once ("dbconn.php");
$_admin_id = $_GET['staffid'];


$sql = "DELETE FROM `staff` WHERE staff_id = $_admin_id";
$result = mysqli_query($conn,$sql);
if($result){
    $_SESSION['message'] = "Staff Account has been deleted";
    header("Location:adminaddaccount.php");
}
else{
    $_SESSION['admin_error']="Deleting Failed";
    header("Location:adminaddaccount.php");
}