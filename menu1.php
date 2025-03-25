<?php
require_once "Handlers/dbconn.php";
session_start();
$userId = $_SESSION['userId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Café</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            z-index: 1000;
            position: relative;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8em;
            font-weight: bold;
            color: #333;
        }

        .navbar-nav .nav-link {
            color: #333;
            transition: color 0.3s, background-color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #fff;
            background-color: #ffc107;
            border-radius: 5px;
        }

        .splash-screen {
            position: relative;
            height: 60vh;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow: hidden;
            background-image: url('images/pexels-chevanon-324028.jpg');
            background-size: cover;
            background-position: center;
            margin-bottom: 30px;
        }

        .splash-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .splash-content {
            position: relative;
            z-index: 2;
        }

        .splash-content h1 {
            font-size: 5em;
            font-family: 'Rastanty Cortez', serif;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
            margin-bottom: 10px;
        }

        .splash-content p1 {
            font-size: 0.5em;
            font-family: 'Papyrus', sans-serif;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.6);
        }

        .splash-text {
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 1em;
            font-family: 'Arial', sans-serif;
            z-index: 3;
        }

        .topnav input[type="text"] {
            width: 200px; /* Increase or decrease as needed */
            padding: 6px;
            border: none;
            margin-top: 8px;
            margin-right: 16px;
            font-size: 17px;
            background-color: #f9f9f9; /* Light gray background */
            border-radius: 5px;
        }

        .topnav button[type="submit"] {
            background-color: #2196F3; /* Blue button color */
            color: rgb(103, 230, 152);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .reserv-btn {
            width: 200px;
            background-color: #fcfcfc;
            color: rgb(39, 65, 5);
            text-align: center;
            padding-left: 50px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }

        .form_search {
            display: flex;
            align-items: flex-start;
            width: 300px;
            margin: auto 2px auto 1100px;
            transform: translateY(-20px);
        }

        .form_search input {
            margin-right: 20px;
            width: 500px;
        }

        .form_search button {
            background-color: #f6f6f6;
            border-radius: 10px;
        }

        .form_search button:hover {
            transform: scale(1.1);
            transition: 0.25s ease-in-out;
        }

        .item {
            margin: 0 auto;
            width: 90%;
        }

        .item th {
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            background-color: #bbf7d0;
        }

        .item td {
            text-align: center;
        }

        .btn_add {
            margin: 8px;
            border-radius: 20px;
            background-color: #fef3c7;
        }

        .btn_add:hover {
            transform: scale(1.1);
            transition: 0.25s ease-in-out;
        }
        table{
            margin-top: 40px;
        }
    </style>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#"><i id="ico" class='bx bxs-bowl-hot'></i>The Gallery Café</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="welcome.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="menu1.php">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="reservation.php">Reservations</a></li>
            <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="customer.php">My Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

            <?php
            if(isset($_SESSION['username'])){
                echo '<a class="nav-link" href="Handlers/logout.php"> <li class="nav-item"> LogOut</li></a>';
            }
            else{
                echo '<a class="nav-link" href="login1.php"><li class="nav-item"> Login/Register</li></a>';
            }


            ?>
        </ul>
    </div>
</nav>

<div class="splash-screen">
    <div class="splash-overlay"></div>
    <div class="splash-text"></div>
    <div class="splash-content">
        <h1>The Gallery Café</h1>
        <p1>AWAY &nbsp;&nbsp;&nbsp;&nbsp;FROM &nbsp;&nbsp;&nbsp;&nbsp;HOME</p1>
    </div>
</div>

<!--sandwiches-->
<center>
    <a href="sanwiches.php" class="reserv-btn">Sandwiches</a>
    <a href="cakes.php" class="reserv-btn">Full cakes</a>
    <a href="Merchandise.php" class="reserv-btn">Merchandise</a>
    <a href="croissants.php" class="reserv-btn">Croissants</a>
</center>

<section>
    <form class="form_search" method="post" action="#">
        <input type="text" name="text">
        <button id="search" name="search">Search</button>
    </form>
</section>

<?php

if(isset($_POST['search'])){
$search = $_POST['text'];
    $sql = "SELECT * FROM `products` WHERE `Product_Origin` LIKE '%$search%' ORDER BY `Product_name` ASC";
    $result = mysqli_query($conn, $sql);
}
else{
    $sql = "SELECT * FROM `products` ORDER BY `Product_name` ASC";
    $result = mysqli_query($conn, $sql);
}


?>

<div id="table">
    <table border="1" class="item">
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Item Price(Rs)</th>
            <th>Available Qty</th>
            <th>Origin Country</th>
            <th>Add to Cart</th>
        </tr>
        <?php


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Product_id'] . "</td>";
            echo "<td>" . $row['Product_name'] . "</td>";
            echo "<td>" . $row['Product_Price'] . "</td>";
            echo "<td>" . $row['Product_Qty'] . "</td>";
            echo "<td>" . $row['Product_Origin'] . "</td>";

            $sqlCart = "SELECT * FROM `cart` WHERE `Ord_user_id`='$userId' AND `Ord_product_id`='" . $row['Product_id'] . "'";
            $resultCart = mysqli_query($conn, $sqlCart);
            $rowCart = mysqli_fetch_assoc($resultCart);

            if ($rowCart) {
                echo '<td><button class="btn_add" style="background-color: #e0a800" onclick="window.location.href=\'Handlers/Addcarthandler.php?key=' . $row['Product_id'] . '\'">Add Another</button></td>';
            } else {
                echo '<td><button class="btn_add" onclick="window.location.href=\'Handlers/Addcarthandler.php?key=' . $row['Product_id'] . '\'">Add to Cart</button></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>

<!-- Footer -->
<footer class="bg-light text-center text-lg-start mt-4">
    <div class="text-center p-3">
        <center><b><p>© 2024 The Gallery Café. All Rights Reserved.</p></b></center>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
