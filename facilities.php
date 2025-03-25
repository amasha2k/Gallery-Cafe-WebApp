<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - The Gallery Café</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(255, 255, 255);
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

        .about-page {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin: 20px;
        }

        .left-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 20px;
        }

        .main-image {
            width: 300px; 
            height: auto;
            margin-bottom: 20px;
        }

        .reservation-btn {
            display: block;
            width: 200px;
            background-color: #ffc107;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }

        .reservation-btn:hover {
            background-color: #e0a800;
        }

        .facilities-list {
            flex: 1;
            margin: 0 20px;
        }

        .facilities-images {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .facilities-images img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .reservation-btn:hover {
            background-color: #e0a800;
        }
        p {
            font-size: 1em;
            font-family: 'Papyrus', sans-serif;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.6);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">The Gallery Cafe'</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="welcome.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="promotion.php">Events & Promo</a></li>
                <li class="nav-item"><a class="nav-link" href="facilities.php">Facilities</a></li>
                <li class="nav-item"><a class="nav-link" href="cus_reservation.php">Reservations</a></li>
                <li class="nav-item"><a class="nav-link" href="cartcus.php">My Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">My Orders</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="about-page">
            <div class="left-column">
                <img src="images\cc3e6f6a18a69fc90aa3f9d21dc4763b.jpg"alt="Main Image" class="main-image">
                <a href="reservation.php" class="reservation-btn">Make a Reservation</a>
            </div>
            <div class="facilities-list">
                <h3>Our Facilities</h3>
                <p>The Gallery Cafe</p>
                <ul>
                    <li>Indoor and Outdoor Dining areas</li>
                    <li>High parking capacity</li>
                    <li>Experienced Chefs and Staff</li>
                    <li>Children - friendly Facilities</li>
                    <li>Bar area, Reservation facilities</li>
                    <li>Food takeaway and delivery</li>
                    <li>Pool area and activity area</li>
                    <li>River side</li>
                </ul>
            </div>
            <div class="facilities-images">
                <img src="images/f1.jpg" alt="Facility Image 1">
                <img src="images/f2.jpg" alt="Facility Image 2">
                <img src="images/f3.jpeg" alt="Facility Image 3">
            </div>
        </div>
    </div>
    

<footer class="bg-light text-center text-lg-start mt-4">
    <div class="text-center p-3">
        © 2024 The Gallery Café. All Rights Reserved.
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
