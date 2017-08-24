<?php
  function areParametersSet(){
     if( isset($_POST['password']) && isset($_POST['email']) )
       return true;
     else
       return false;
  }

  if(areParametersSet()){
  require_once "login.php";
  $conn = new mysqli($hn,$un, $pw, $db);

  if($conn->connect_error)
    die($conn->connect_error);

  $query = "SELECT user_password, user_type_id, is_profile_set FROM user WHERE user_email = ?";
  //Santize
  $email = htmlentities($conn->real_escape_string($_POST['email']));
//Salt and Hash entered password.
  $salt1 ="1de3";
  $salt2 ="1kdu";
  $pw = $_POST["password"];
  //Passwords do not need to be cleansed since it's converted into HexaDecimal.
  $pw = hash("ripemd128","$salt1$pw$salt2");

  if($stmt = $conn->prepare($query)){
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($storedPw, $userType, $isProfileSet);
    $stmt->fetch();
    $stmt->close();
   

    if($pw == $storedPw){
    session_start();
    $_SESSION["timeout"] = time() + 600;
    $_SESSION["email"] = $email;
    $_SESSION["userType"] = $userType;
    $_SESSION["isProfileSet"] = $isProfileSet;
    
    $conn->close();

    header('Location: index.html');
    exit;
    }
    else 
      echo "Incorrect";
  }

 }
 $conn->close();
?>