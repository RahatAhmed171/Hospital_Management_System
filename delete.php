<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
  echo "Connected unsuccessfully";
  die("Connection failed: " . mysqli_connect_error());
}
else{

}

include("auth.php");

$id = $_GET['id'];
$sql = "delete from test where test_id = '$id'";
$result = mysqli_query($conn,$sql);
if($result)
{
    header("Location:index.php");
    exit();
}

?>