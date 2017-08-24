<?php
  require_once "login.php";
  $conn = new mysqli($hn,$un, $pw, $db);

  if($conn->connect_error)
    die($conn->connect_error);

   $query = "INSERT INTO job_posting (title, description, responsibility, requirement, benefit, salary) VALUES(?,?,?,?,?,?)";

   if($stmt = $conn->prepare($query)){
    $title = $_POST["title"];
    $desc = $_POST["desc"];
    $resp = $_POST["resp"];
    $require = $_POST["require"];
    $benefit = $_POST["benefit"];
    $salary = $_POST["salary"];
   
    $stmt->bind_param("ssssss", $title, $desc, $resp, $require, $benefit, $salary);
    $stmt->execute(); 

    echo "Entered";   

    $stmt->close();

    }

   $conn->close();


?>