<?php
   header("Access-Control-Allow-Origin: *");

  $city_string = $_REQUEST["city_name"];

  require_once "login.php";
  $conn = new mysqli($hn, $un, $pw, $db);
 
  if($conn->connect_error)
    die($conn->connect_error); 
 
 
 if($stmt = $conn -> prepare("SELECT city_name FROM cities WHERE city_name LIKE ?%")){
   $stmt -> bind_param("s", $city_string) ;
   $stmt->execute();
   $stmt->bind_result("$city");
   $stmt->fetch();

   echo $city;
 }
 $conn ->close();
?>