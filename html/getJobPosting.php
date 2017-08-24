<?php
   header("Access-Control-Allow-Origin: *");


  require_once "login.php";
  $conn = new mysqli($hn,$un, $pw, $db);

  if($conn->connect_error)
    die($conn->connect_error);

  $query = "SELECT * FROM job_posting";

  $result = $conn->query($query);
  $rowCount = $result->num_rows;
  $i = 0;
  $json = '[';
  
   while( $row = $result->fetch_assoc() ){
   $i++;
   $json .= '{';  
   $json .= '"id" : "' . $row["id"] . '",';
   $json .= '"title" : "' . $row["title"] . '",'; 
   $json .= '"description" : "' . $row["description"] . '",'; 
   $json .= '"responsibility" : "' . $row["responsibility"] . '",'; 
   $json .= '"requirement" : "' . $row["requirement"] . '",'; 
   $json .= '"benefit" : "' . $row["benefit"] . '",' ; 
   $json .= '"salary" : "' . $row["salary"]. '",'; 
   $json .= '"date_posted" : "' . $row["date_posted"] . '"'; 
   $json .= '}';

   if($i < $rowCount)
      $json .= ',';
  }
  $json .= ']';
 
  echo $json;


$conn->close();
?>