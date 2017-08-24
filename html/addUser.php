<?php
  function areParametersSet(){
     if( isset($_POST['password']) && isset($_POST['email']) )
       return true;
     else
       return false;
  }

  echo $_POST['password'];
  echo $_POST['email'];

  if(areParametersSet()){

  require_once "login.php";
  $conn = new mysqli($hn,$un, $pw, $db);

  if($conn->connect_error)
    die($conn->connect_error);

  $query = "INSERT INTO user (user_email, user_password, user_type_id, is_profile_set) VALUES(?,?,?,0)";

  if($stmt = $conn->prepare($query)){
  $email = htmlentities($conn->real_escape_string($_POST["email"]));
  
  $salt1 ="1de3";
  $salt2 ="1kdu";
  $pw = $_POST["password"];
  //Passwords do not need to be cleansed since it's converted into HexaDecimal.
  $pw = hash("ripemd128","$salt1$pw$salt2");

  $userType = htmlentities($conn->real_escape_string($_POST["userType"]));
  
  $stmt->bind_param("ssi",$email, $pw, $userType);
  $stmt->execute();
  echo "Success";
  $stmt->close();

  }

 $conn->close();
  
  header('Location: index.html');
  exit;
}else {
 echo "Parameters not set";
}
 

?>