<?php
header("Access-Control-Allow-Origin: *");

try {
  $conn = new PDO("mysql:host=hngomrlb3vfq3jcr.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=uvbqzg1cry7a0pna", "ap3ttbobpo61kgde", "sgf7jmj09390vqcc");
} catch (PDOException $e) {
  echo "Error".$e->getMessage();
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username'";

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
  $row = mysqli_fetch_assoc($result);
  $allowed = strcmp($password,$row["password"]);
  if($allowed==0){
    echo json_encode(true);
  } else {
    echo json_encode(false);
  }
}
?>