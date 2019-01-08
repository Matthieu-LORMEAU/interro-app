<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["username"])){
    $usernameErr = "Please insert a username";
  }
  elseif(strlen($_POST["username"])<10){
    $usernameErr = "Username must be at least 10 characters long";
  }
  else{
    $username = test_input($_POST["username"]);
    $username = trim($username);
  }

  if ((!empty($_POST["new-password"]) && !empty($_POST["confirm-password"])) && $_POST["new-password"]==$_POST["confirm-password"] ) {
    $password = test_input($_POST["new-password"]);
  }
  else{
    $passwordErr = "Passwords are not identical or might be empty";
  }

  if(isset($usernameErr) || isset($passwordErr)){
    if(isset($usernameErr)){
      echo($usernameErr."<br />");
    }
    if(isset($passwordErr)){
      echo($passwordErr."<br />");
    }
    echo("<br /><button><a href='./../views/sign-up/sign-up.html'>Go back to signup</a></button>");
  }
  else{
    $db = mysqli_connect('localhost', 'root', '', 'app2');
    $stmt = $db->prepare("INSERT INTO  user (login, password)  VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    echo("Successfully registered");
    echo("<br /><button><a href='./../views/sign-up/sign-up.html'>Go back to signup</a></button>
          <br /><button><a href='./../views/flights-search/flights-search.php'>Go to flights search</a></button>");
  }
}

function test_input($data) {
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
