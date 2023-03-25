<?php 

$servername = 'localhost';
$username = 'root';
$password = '';

//creating connection using php data object - ( PDO )

// if(isset($_POST['insert']))
// {

// }
try {
  $username = $_POST['username'];
  $password= $_POST['password'];


  //code...
  $conn = new PDO("mysql:host=$servername;dbname=mydb",$username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
  //code...
  $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':username', $username);
  $stmt->bindValue(':password', $password);
 
  $stmt->execute();
  $count = $stmt->rowCount();
  if($count > 0) {
    $_SESSION['username'] = $username;
    echo "$username";
    
  }
  else {
    echo "Login Not Success";
    echo 'window.location.replace("/");';
  }
} catch (\Throwable $th) {
   echo $th;
}


} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
?>
