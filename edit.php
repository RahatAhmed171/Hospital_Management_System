<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$conn = new mysqli($servername, $username, $password, $dbname);
ob_start();

// Check connection
if (!$conn) {
  echo "Connected unsuccessfully";
  die("Connection failed: " . mysqli_connect_error());
}
else{

}

include("auth.php");
$test_id = $_GET['id'];
$sql="SELECT test_id,test_name from test where test_id='$test_id'";
$result= $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $test_name = $row["test_name"];

 
  } else {
    
  }
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Test List</title>
    <link rel="icon" type="image/png" href="http://example.com/myicon.png">
    <style>
body {
  padding: 0;
  margin: 0;
}
header {
  font-family: Georgia, 'Times New Roman', Times, serif;
  text-align: center;
  color:rgb(10, 10, 10);
  font-size: 50px;
  position: fixed;

  top: 0;
  width: 100%;
  background-color: rgb(96, 207, 86);
  height: 70px;
}
main {
  /* header and footer padding */
  padding-top: 60px;
  padding-bottom: 60px;
}
main>h1{
    text-align: center;
    font-size: 30px;
}
.center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 45vh; /* Adjust this to your preference */
}
footer {
    font-family: Georgia, 'Times New Roman', Times, serif;
    text-align: center;
  color:rgb(2, 2, 2);
  font-size: larger;
  position: fixed;
  bottom: 0;
  width: 100%;
  background-color:rgb(96, 207, 86);
  height: 50px;
}



</style>
  </head>
  <body>
  <header> Hospital Management System </header>
    <main id="container">
   
    </main>
    
    <form method="post" action="edit.php">
		
    <div class="form-box" data-errormsg="">
        <label for="input-tid">Test ID:</label>
        <input type="text" id="input-tid" name="test_id" value="<?php echo $test_id; ?>"  readonly>
    </div>
    <div class="form-box" data-errormsg="">
        <label for="input-tname">Test Name:</label>
        <input type="text" id="input-tname" value="<?php echo $test_name; ?>"  readonly>
    </div>
    <br>
    
    <div class="form-box" data-errormsg="">
        <label for="input-tresult">Test Result:</label>
        <textarea id="input-tresult" name="test_result" rows="4" cols="50"></textarea>
    </div>

    <div class="form-box">
        
        <button id="button-update" type="submit">Update</button>
    </div>
	</form>
  <br>
    <a href="logout.php">Logout</a>

    <footer> Address: Probortok Circle, Chittagong</footer>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){


$test_result=$_POST["test_result"];

$test_id = $_POST["test_id"];


$sql1 = "UPDATE test SET test_result = '$test_result' WHERE test_id = '$test_id'"; //update not working
$result= $conn->query($sql1);
if ($result) {
 
  $output=ob_get_clean();
    header("Location:test_list.php");
    exit();
    
  // Redirect to the success page with the ID as a query parameter

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>