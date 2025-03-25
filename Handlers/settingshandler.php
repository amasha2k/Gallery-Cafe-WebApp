<?php
session_start();
require_once "dbconn.php";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sel = $_POST['sel'];

  if($sel==1){
      $sql = "SELECT * FROM `admin` WHERE email = '$email'";
      $result = mysqli_query($conn,$sql);
      $result_row = mysqli_num_rows($result);
      if($result_row > 0 )
      {
          $_SESSION['admin_error'] = "Admin Account Already Exists";
          header("Location:adminaddaccount.php");
      }
      else
      {

          $sql_insert ="INSERT INTO `admin`(`username`,`email`,`pass`) 
                   VALUES ('$name','$email','$password')";

          $result_insert = mysqli_query($conn,$sql_insert);

          if($result_insert){
              header("Location:adminaddaccount.php");
          }
          else{
              $_SESSION['admin_error']="Query Failed";
              header("Location:adminaddaccount.php");
          }
      }
  }
  else{
      $sql_insert ="INSERT INTO `staff`(`username`,`email`,`pass`) 
                   VALUES ('$name','$email','$password')";

      $result_insert = mysqli_query($conn,$sql_insert);

      if($result_insert){
          header("Location:adminaddaccount.php");
      }
      else{
          $_SESSION['admin_error']="Query Failed";
          header("Location:adminaddaccount.php");
      }
  }


}


?>