<?php
//connect
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
session_start(); //login succesful, session start hbe

?>
<!DOCTYPE html>
<html>
<head>

<title> Hospital Management Login</title>

</head>
<body>
<?php

// If form submitted, insert values into the database.
if (isset($_POST['submit'])){ //data gula ekhane
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($conn,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `login_info` WHERE username='$username'
and password='$password'"; //check usrname and password exists in db
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username; //session username die save hbe
            // Redirect user to index.php
	    header("Location: index.php");
	    exit();
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
	}
    }
    else{
    }
?>
<div class="form">
<h1>Log In</h1>
<form method="post" action="login.php">
<input type="text" name="username" placeholder="Username" autocomplete="off" required />
<input type="password" name="password" placeholder="Password" autocomplete="off" required />
<input name="submit" type="submit" value="Login" />
</form>

</div>
<?php  ?>
</body>
</html>