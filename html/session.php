<?php
   header("Access-Control-Allow-Origin: *");
   session_start();
   if(isset($_SESSION["email"])){
   $json = '[{"email" :"' . $_SESSION["email"] . '",';
   $json .= '"userType" :"' . $_SESSION["userType"] . '",';    
   $json .= '"isProfileSet" :"' . $_SESSION["isProfileSet"] . '"}]';
   echo $json;
  } else 
   echo "error";
?>

