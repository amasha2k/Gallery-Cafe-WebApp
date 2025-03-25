<?php
session_start();
require_once('dbconn.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($email) || empty($password)) {
            $_SESSION['SignupError'] = "All fields are required.";
            header("Location: ../signup.php");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['SignupError'] = "Invalid email format.";
            header("Location: ../signup.php");
            exit();
        }

        $hashedpass = password_hash($password, PASSWORD_BCRYPT);

        $check_username = $conn->prepare("SELECT * FROM `user` WHERE `username` = ? OR `email` = ?");
        $check_username->bind_param("ss", $username, $email);
        $check_username->execute();
        $result = $check_username->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['SignupError'] = "Username or Email already exists.";
            header("Location: ../signup.php");
            exit();
        } else {
            $sql = $conn->prepare("INSERT INTO `user`( `username`, `email`, `pass`) VALUES (?, ?, ?)");
            $sql->bind_param("sss", $username, $email, $hashedpass);

            if ($sql->execute()) {
                $_SESSION['signupSucess'] ="Your Account Created Successfully.";
                header("Location: ../login1.php");
                exit();
            } else {
                $_SESSION['SignupError'] = "Error: " . $sql->error;
                header("Location: ../signup.php");
                exit();
            }
        }
    }
}
?>
