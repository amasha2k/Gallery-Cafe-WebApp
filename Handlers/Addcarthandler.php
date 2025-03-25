<?php

session_start();
require_once "dbconn.php";

$userId = $_SESSION['userId'];
$qty = 1;
$productid = $_GET['key'];

$sql1 = "SELECT * FROM `cart` WHERE `Ord_user_id`='$userId' AND `Ord_product_id`='$productid'";
$sql4 = "SELECT * FROM `Products` WHERE `Product_Id`='$productid'";
$result1 = mysqli_query($conn,$sql1);
$result4 = mysqli_query($conn,$sql4);
$row = mysqli_fetch_assoc($result1);
$row4 = mysqli_fetch_assoc($result4);

if($row4['Product_Qty']>0){
    if($row['Ord_qty']==NULL){
        $qty = 1;
        $sql = "INSERT INTO `cart`(`Ord_product_id`, `Ord_user_id`, `Ord_qty`) VALUES ('$productid','$userId',' $qty')";
        $qty5 = $row4['Product_Qty']-1;
        $sql5 = "UPDATE `products` SET `Product_Qty`='$qty5' WHERE `Product_Id`='$productid'";
        $result6 = mysqli_query($conn,$sql5);
        $result = mysqli_query($conn,$sql);
    }
    else{
        $qty = $row['Ord_qty'] + 1;
        $sql2 = "UPDATE `cart` SET `Ord_qty` = '$qty' WHERE `Ord_product_id`='$productid'";
        $qty5 = $row4['Product_Qty']-1;
        $sql5 = "UPDATE `products` SET `Product_Qty`='$qty5' WHERE `Product_Id`='$productid'";
        $result6 = mysqli_query($conn,$sql5);
        $result2 = mysqli_query($conn,$sql2);
    }
}
else{
    echo "Product has been sold out";
}


if($result2 OR $result){
    header("Location:../menu1.php#table");
}
else{
    echo '<script>alert("An Error Occurred !")</script>';
}
?>