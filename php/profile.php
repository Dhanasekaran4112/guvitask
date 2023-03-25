<?php
use Predis;

require "../assets/vendor/autoload.php";

$redis_host = 'localhost';
$redis_port = 6379;

$servername = 'localhost';
$username = 'root';
$password = '';

try {
  $uname = $_POST['username'];
  $redis = new Redis();
  $redis->connect($redis_host, $redis_port);
  if ($redis->exists($username)) {
    $user_data = json_decode($redis->get($username), true);
  } else {

    $conn = new PDO("mysql:host=$servername;dbname=mydb",$username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    $redis->set($username, json_encode($user_data));
  }

  header("Location: profile.html?username={$user_data['username']}&password={$user_data['password']}&email={$user_data['email']}&mobile={$user_data['mobile']}&dob={$user_data['dob']}");
} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage();
}
