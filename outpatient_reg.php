





<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Outpatient Form</title>
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
form{
            margin: 2rem;
            width: 800px;
        }
        .form-box{
            padding: 1rem;
            clear: both;
            width: 100%;
            position: relative;
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
    <h1>Outpatient Registration</h1>
    </main>
    <form id="form-user" action="outpatient_reg.php" method="post">
        
        <div class="form-box" data-errormsg=""> 
            <label for="input-name">Name:</label>
            <input type="text" id="input-name" required placeholder="Name" name="Name" tabindex="2" />
        </div>
        <div class="form-box" data-errormsg="">
            <label for="input-phone">Phone:</label>
            <input type="text" id="input-phone" autofocus placeholder="Phone" name="Phone" tabindex="1"/>
        </div>
        <div class="form-box" data-errormsg="">
            <label for="input-address">Address:</label>
            <input type="text" id="input-address" autofocus placeholder="Address" name="Address" tabindex="2" />
        </div>
        <div class="form-box" data-errormsg="">
            <label for="input-age">Age:</label>
            <input type="number" id="input-number" autofocus placeholder="Number" name="Age" tabindex="1"/>
        </div>
        <div class="form-box" data-errormsg="">
            <label for="input-gender">Gender:</label>
            <input type="text" id="input-gender" autofocus placeholder="Gender" name="Gender" tabindex="1"/>
        </div>
      
        <div class="form-box">
            <button id="button-reset">Cancel</button>
            <button id="button-register" type="submit">Register</button>
        </div>
    </form>










    <footer> Address: Probortok Circle, Chittagong</footer>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$name = $_POST["Name"];
$phone = $_POST["Phone"];
$address = $_POST["Address"];
$age = $_POST["Age"];
$gender = $_POST["Gender"];


$errors = array();

// Validate each input field
if (empty($name)) {
    $errors[] = "Name is required.";
}

if (empty($phone)) {
    $errors[] = "Phone is required.";
}

if (empty($address)) {
    $errors[] = "Address is required.";
}

if (empty($age)) {
    $errors[] = "Age is required.";
} elseif (!is_numeric($age) || $age <= 0) {
    $errors[] = "Age must be a positive number.";
}

if (empty($gender)) {
    $errors[] = "Gender is required.";
}

// Check if there are any validation errors
if (count($errors) > 0) {
    // Display validation errors to the user
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
  }

// Insert data into the database
else{
$sql = "INSERT INTO outpatient (name,age,phone,sex,address) VALUES ('$name',$age,'$phone','$gender','$address')";
if ($conn->query($sql) === TRUE) {
  echo "outpatient created successfully";
  $lastInsertedId = $conn->insert_id;

  // Redirect to the success page with the ID as a query parameter
  header("Location: outpatient_test.php?inserted_id=" . $lastInsertedId);
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}


// Insert data into the database


$conn->close();
}
?>