<?php 
 session_start();

 require_once "login.php";
  $conn = new mysqli($hn,$un, $pw, $db);

  $query = "INSERT INTO candidate (first_name, last_name, address, introduction, status, resume) VALUES(?,?,?,?,?,?)";

  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $address= $_POST["address"];
  $introduction = $_POST["introduction"];
  $status = $_POST["status"];
  
  if($_FILES){
  $resume= $_FILES["resume"];
  $resumePath = $resume["name"];
  } else {
  $resumePath = "resume.txt";
  }
   

  if($stmt = $conn->prepare($query)){
 
  
  $stmt->bind_param("ssssis",$firstName, $lastName, $address, $introduction, $status, $resumePath);
  $stmt->execute();
  echo $_SESSION["email"];
  $lastId = $conn-> insert_id;
  echo $lastId;
  $query = "UPDATE user SET profile_id =" . $lastId . " WHERE user_email ='" . $_SESSION["email"] ."'" ; 
  
  if($conn->query($query))
    echo "Success";
  else 
    echo "fail";
  
   //$_SESSION("isProfileSet") = 1;

  $stmt->close();

  }

?>