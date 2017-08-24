<?php
  header("Access-Control-Allow-Origin: *");
  session_start();

  require_once "login.php";
  $conn = new mysqli($hn,$un, $pw, $db);

  if($conn->connect_error)
    die($conn->connect_error);

  $query = 'SELECT * FROM "candidate" WHERE id = (SELECT profile_id FROM user WHERE user_email="' . $_SESSION["email"] . '")';

  $result = $conn->query($query);
  $json = '[';
  
   $row = $result->fetch_assoc() 
   
   $json .= '"firstName" : "' . $row["first_name"] . '",';
   $json .= '"lastName" : "' . $row["last_name"] . '",'; 
   $json .= '"address" : "' . $row["address"] . '",'; 
   $json .= '"introduction" : "' . $row["introduction"] . '",'; 
   $json .= '"status" : "' . $row["status"] . '",'; 
   $json .= '"resume" : "' . $row["resume"] . '",' ;  
   $json .= '}';
   $json .= ']';
 
  echo $json;


$conn->close();
?>