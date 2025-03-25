<?php
require_once "dbconn.php";
$pid = $_GET['key'];

$sql2 = "SELECT * FROM `products` WHERE `Product_id`=$pid";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);

$imgpath = $row2['Product_Imge'];

if(file_exists($imgpath)){
    unlink($imgpath);
}

$sql = "DELETE FROM `products` WHERE `Product_id`=$pid";

$result = mysqli_query($conn,$sql);

if($result){
    header("Location:../aproduct.php");
}
?>