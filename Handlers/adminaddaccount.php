<?php
require_once "dbconn.php";
session_start();
?>
<?php
// fetching error handling variable
if (isset($_SESSION['admin_error'])) {
    $admin_error = $_SESSION['admin_error'];
    unset($_SESSION['admin_error']);
} else {
    $admin_error = "";
}
if (isset($_SESSION['message'])) {
    $success = $_SESSION['message'];
    unset($_SESSION['message']);
} else {
    $success = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Wix Air</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- ======= Styles ====== -->
    <style>
        /*=============== GOOGLE FONTS ===============*/
        @import url("https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600&display=swap");

        /*=============== VARIABLES CSS ===============*/
        :root {
            /*========== Colors ==========*/
            /*Color mode HSL(hue, saturation, lightness)*/
            --first-color: hsl(230, 75%, 56%);
            --title-color: hsl(230, 75%, 15%);
            --text-color: hsl(230, 12%, 40%);
            --body-color: hsl(230, 100%, 98%);
            --container-color: hsl(230, 100%, 97%);
            --border-color: hsl(230, 25%, 80%);
            --primary-color: #3d5cb8;
            --primary-color-dark: #334c99;
            --text-dark: #0f172a;
            --text-light: #64748b;
            --extra-light: #f1f5f9;
            --white: #ffffff;
            --max-width: 1200px;
            --lightblue: #93c5fd;
            --exlightblue: #dbeafe;
            --red: #991b1b;
            --shadered: #fee2e2;
            --black1: #0000000;
            --blue: #4640e1;

            /*========== Font and typography ==========*/
            /*.5rem = 8px | 1rem = 16px ...*/
            --body-font: "Syne", sans-serif;
            --h2-font-size: 1.25rem;
            --normal-font-size: .938rem;

            /*========== Font weight ==========*/
            --font-regular: 400;
            --font-medium: 500;
            --font-semi-bold: 600;
            --max-width: 1200px;
        }

        body {
            height: 100vh;
            overflow-y: hidden;
        }

        .container123 {
            justify-content: space-evenly;
            display: flex;
            position: absolute;
            width: 1200px;
            top: 10%;
            left: 21%;
        }

        .left {
            padding: 20px;
        }

        .left input {
            padding: 8px;
            margin: 12px 0;
        }

        #Flighttable {
            width: 90%;
            border-collapse: collapse;
            margin: 10px auto;
        }

        #Flighttable thead td {
            font-weight: 600;
        }

        #Flighttable tr {
            color: var(--black1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        #Flighttable tr:last-child {
            border-bottom: none;
        }

        #Flighttable tbody tr:hover {
            background: var(--blue);
            color: var(--white);
            border-radius: 10px;
        }

        #Flighttable tr td {
            padding: 10px;
        }

        #Flighttable tr td {
            text-align: center;
        }

        .left {
            position: relative;
        }

        .right h2 {
            text-align: center;
            padding: 40px;
        }

        .left h2 {
            text-align: center;
        }

        .left button {
            height: 40px;
            width: 200px;
            margin-left: 60px;
            background: linear-gradient(#4640e1, #2069be, #1574d2);
            border-radius: 0.938rem;
            border: none;
            color: var(--white);
            margin-top: 30px;
            font-family: var(--body-font);
            font-weight: 300;
            transition: 0.5s ease-in-out;
        }

        .left button:hover {
            transform: scale(1.1);
            opacity: 0.5;
        }

        .tag {
            margin: 2px 0 20px 15px;
            width: 300px;
            height: 33px;
            padding-left: 10px;
            border-radius: 10px;
            box-shadow: 0 0 5px var(--primary-color);
            border: none;
            font-family: var(--body-font);
            font-size: 16px;
            outline: none;
        }

        #del {
            padding: 8px;
            border-radius: 10px;
            margin-right: 20px;
        }

        #row_btn {
            background-color: transparent;
            border: none;
        }

        #del:hover {
            background-color: var(--shadered);
        }

        #del ion-icon:hover {
            color: black;
        }

        #alertmsg {
            z-index: 1;
            position: absolute;
            top: 78%;
            left: 0;
            text-align: center;
            width: 100%;
            color: red;
        }

        #success {
            width: 300px;
            background: #bbf7d0;
            margin: 0 auto;
            padding: 10px;
            border-radius: 20px;
            text-align: center;
            display: none;
        }
    </style>
</head>

<body>
<div class="container123">
    <div class="left">
        <div id="success">

        </div>
        <h2>Add New Account</h2>
        <form action="settingshandler.php" method="post" onsubmit="return validInput()" id="myform">
            <br>
            <div id="alertmsg">
            </div>

            <label> User Name</label><br>
            <label>
                <input class="tag" type="text" name="name" id="name" />
                <br>
            </label>
            <label>Email</label><br>
            <label>
                <input class="tag" type="text" name="email" id="email">
                <br>
            </label>
            <label>Password</label><br>
            <label>
                <input class="tag" type="text" name="password" id="password">
                <br>
            </label>
            <br>
            <label>Select Account type:<br>
                <input type="radio" name="sel" value="1">Admin <input style="margin-left: 10px;" type="radio" name="sel" value="2">Staff<br><br></label>
            <button type="submit" id="submit_btn">Add</button>
        </form>
    </div>

    <div class="right">
        <h2>Current Admins</h2>
        <?php
        $sql = "SELECT * FROM `admin` ORDER BY `admin_id` ASC ";
        $result = mysqli_query($conn, $sql);

        echo '<table id="Flighttable">
                <thead>
                <tr>
                    <th>AdminID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>State</th>
                </tr>
                </thead>
                <tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['admin_id'] . '</td>
                    <td>' . $row['username'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td><span id="del"><button id="row_btn" onclick="deleteAdmin(' . $row['admin_id'] . ')">Delete</button></span></td>
                </tr>';
        }

        echo '</tbody></table>';
        ?>
        <h2>Current Staff Accounts</h2>
        <?php
        $sql = "SELECT * FROM `staff` ORDER BY `staff_id` ASC ";
        $result = mysqli_query($conn, $sql);

        echo '<table id="Flighttable">
                <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>State</th>
                </tr>
                </thead>
                <tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['staff_id'] . '</td>
                    <td>' . $row['username'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td><span id="del"><button id="row_btn" onclick="deletestaff(' . $row['staff_id'] . ')">Delete</button></span></td>
                </tr>';
        }

        echo '</tbody></table>';
        ?>
    </div>
</div>
<script>
    function checkcred() {
        var loginFail = "<?php echo $admin_error ?>";
        var alertmsg = document.getElementById("alertmsg");
        if (loginFail !== '') {
            alertmsg.style.display = 'block';
            alertmsg.innerHTML = loginFail;
        }
    }


    function onecheck() {
        var loginFail1 = "<?php echo $success ?>";
        console.log(loginFail1);
        var alertmsg1 = document.getElementById("success");
        if (loginFail1 !== '') {
            alertmsg1.style.display = 'block';
            alertmsg1.innerHTML = loginFail1;
            setTimeout(function() {
                alertmsg1.style.display = 'none';
            }, 7000); // Hide after 30 seconds
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        checkcred();
        onecheck();
    });

</script>
<script>
    function validInput() {
        var username = document.getElementById("name").value;
        var age = document.getElementById("age").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        var alertmsg = document.getElementById("alertmsg");

        if (username.trim() === '' || password.trim() === '' || age.trim() === '' || email.trim() === '') {
            alertmsg.style.display = 'block';
            alertmsg.innerHTML = 'All the fields are required';
            return false;
        } else {
            alertmsg.style.display = 'none';
            return true;
        }
    }

    document.getElementById('email').addEventListener('input', function validpass() {
        var email = document.getElementById("email").value;
        var pattern = /^[a-zA-Z0-9._%+-]+@gallery\.com$/;
        var pattern2 = /^[a-zA-Z0-9._%+-]+staff@gallery\.com$/;
        if (pattern.test(email) || pattern2.test(email)) {
            // Email is valid
            const btn = document.getElementById('submit_btn');
            document.getElementById("alertmsg").innerHTML = "";
            document.getElementById("alertmsg").style.display = 'none'; // Hide the error message
            btn.disabled = false;
            btn.style.cursor = 'pointer';
            btn.style.pointerEvents = 'auto';
            return true;
        } else {
            const btn = document.getElementById('submit_btn');
            const err_msg = document.getElementById("alertmsg");

            err_msg.style.display = 'block';
            err_msg.innerHTML = "Please enter a valid email address (someone@gallery.com/someone-staff@gallery.com)";
            btn.disabled = true;
            btn.style.cursor = 'not-allowed';
            btn.style.pointerEvents = 'none';
            return false;
        }
    });

    function deleteAdmin(adminId) {
        if (confirm('Are you sure you want to delete this admin?')) {
            window.location.href = 'deleteadmin.php?adminid=' + adminId;
        }
    }

    function deletestaff(adminId) {
        if (confirm('Are you sure you want to delete this Staff Account?')) {
            window.location.href = 'staffdel.php?staffid=' + adminId;
        }
    }
</script>
</body>

</html>
