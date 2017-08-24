<?php 
 require_once "login.php";
  $conn = new mysqli($hn,$un, $pw, $db);

  $query = "INSERT INTO company (name, description, location) VALUES(?,?,?)";

  $name = $_POST["name"];
  $description = $_POST["description"];
  $location = $_POST["location"];

  if($stmt = $conn->prepare($query)){
 
  
  $stmt->bind_param("sss",$name, $description, $location);
  $stmt->execute();
  echo "Success";
  $stmt->close();

  }

?>