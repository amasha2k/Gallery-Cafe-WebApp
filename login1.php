<?php
session_start();
if (isset($_SESSION['loginError'])) {
    $loginfail = $_SESSION['loginError'];
    unset($_SESSION['loginError']);
} else {
    $loginfail = "";
}

if (isset($_SESSION['signupSucess'])) {
    $Sucess = $_SESSION['signupSucess'];
    unset($_SESSION['signupSucess']);
} else {
    $Sucess = "";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery Café</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            background-image: url('./images/pb.jpg');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 1200px;
            overflow: hidden;
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
        #login-box {
            overflow: hidden;
            position: fixed;
            top: 30%;
            left: 35%;
            transform: translateY(-30%);
        }
        ::-webkit-scrollbar {
            display: none;
        }
        .log_form {
            overflow: hidden;
            width: 600px;
            margin: 10px;
        }
        .qu_log {
            margin-top: 23px;
        }
        .text_foot {
            position: absolute;
            top: 90%;
            left: 23%;
        }
        #Error {
            display: none;
            color: red;
        }
        .success{
            position:fixed;
            top:5%;
            left:50%;
            font-size:16px;
            transform:translateX(-35%);
            //border:2px solid black;
            border-radius: 20px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding:8px;
            width:600px;
            display: none;
            margin:12px auto;
            background: #bbf7d0;


        }
    </style>
</head>
<body>
<div class="success" id="success_id">

</div>
<div id="login-box">
    <div class="left">
        <form class="log_form" id="form" action="Handlers/loginhandler.php" method="POST" onsubmit="return checknull()">

            <h1>Login</h1>
            <input type="text" id="email" name="email" placeholder="Email" />
            <input type="password" id="pass" name="password" placeholder="Password" />
            <div id="Error">This is my Sample Error</div>
            <input type="submit" name="login_submit" value="Login" />
            <p class="qu_log">I don't have an Account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>

    <script>
        function checkcred() {

            var loginFail = "<?php echo $loginfail ?>";
            console.log(loginFail);
            var alertmsg = document.getElementById("Error");
            if (loginFail !== '') {
                alertmsg.style.display = 'block';
                alertmsg.innerHTML = loginFail;
            }

            var Sucess = "<?php echo $Sucess ?>";
            console.log(Sucess);
            var succdiv = document.getElementById("success_id");
            if (Sucess !== '') {
                succdiv.style.display = 'flex';
                succdiv.innerHTML = Sucess;
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            checkcred();
        });

        function checknull(){
                var username = document.getElementById("email").value;
                var password = document.getElementById("pass").value;
                var alertmsg = document.getElementById("Error");

                if (username.trim() === '' || password.trim() === '') {
                    alertmsg.style.display = 'block';
                    alertmsg.innerHTML = 'Both fields are required';
                    return false;
                } else {
                    alertmsg.style.display = 'none';
                    return true;
                }
            }
    </script>
    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="text_foot">
            <center><b>© 2024 The Gallery Café. All Rights Reserved.</b></center>
        </div>
    </footer>
</div>
</body>
</html>
