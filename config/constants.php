<?php 

  //Start session
  if(!isset($_SESSION)) { 
    session_start(); 
  } 


   //Creating constants for non Repeating values 
   define('SITEURL','http://localhost/food_order/');
   define('LOCALHOST' , 'localhost');
   define('DB_USERNAME' , 'root');

   define('DB_PASSWORD' , '');

   define('DB_NAME', 'food_order');
   
   
   $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//Database connection
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());//Selecting database







?>