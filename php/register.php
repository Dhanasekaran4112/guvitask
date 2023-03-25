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
  $password = $_POST['password'];
  $email= $_POST['email'];
  $dob = $_POST['dob'];
  $address = $_POST['address'];
  $mobile = $_POST['mobile'];
  $age = $_POST['age'];

  echo "The tow params are $username and $password and $email and $dob and $address and $mobile and $age";
  //code...
  $conn = new PDO("mysql:host=$servername;dbname=mydb",$username, $password );

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
try {
  //code...
  $sql = "INSERT INTO users (username, password,email,dob,address,mobile,age) VALUES (?,?,?,?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->execute(["$username","$password","$email","$dob","$address","$mobile","$age",]);
} catch (\Throwable $th) {
   echo $th;
}

echo " New record created successfully";
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
?>