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
echo "Connected successfully";
}
$outpatientID=$_GET['data1'];
echo "$outpatientID";
$testFirstID=$_GET['inserted_first_id'];
$testSecondID=$_GET['inserted_second_id'];
$sql1="SELECT name,age,phone,sex FROM outpatient where opid=$outpatientID";
$result1 = $conn->query($sql1);

if ($result1) {
    $row1 = $result1->fetch_assoc();
    $patient_name = $row1['name'];
    $patient_age = $row1['age'];
    $patient_phone = $row1['phone'];
    $patient_sex = $row1['sex'];
    $result1->free();
} else {
    // Handle any errors with the query.
    echo "Error in query 1: " . $conn->error;
}
$sql2="SELECT test_name,test_amount FROM test where test_id=$testFirstID";
$result2 = $conn->query($sql2);

if ($result2) {
    $row2 = $result2->fetch_assoc();
    $testName1 = $row2['test_name'];
    $testAmount1 = $row2['test_amount'];
    $result2->free();
} else {
    // Handle any errors with the query.
    echo "Error in query 1: " . $conn->error;
}
$sql3="SELECT test_name,test_amount FROM test where test_id=$testSecondID";
$result3 = $conn->query($sql3);

if ($result3) {
    $row3 = $result3->fetch_assoc();
    $testName2 = $row3['test_name'];
    $testAmount2 = $row3['test_amount'];
    $result3->free();
} else {
    // Handle any errors with the query.
    echo "Error in query 2: " . $conn->error;
}

// Calculate the total amount
$totalAmount = $testAmount1 + $testAmount2;

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Outpatient Bill </title>
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
  <h1>Outpatient Bill </h1>
  </main>
  <body>
  <div>
  <form>
  <label for="name">Name:</label>
  <input type="text" id="name" value="<?php echo $patient_name; ?>"  readonly><br>
  
  <label for="age">Age:</label>
  <input type="number" id="age" value="<?php echo $patient_age; ?>"  readonly><br>
  
  <label for="sex">Sex:</label>
  <input type="text" id="sex" value="<?php echo $patient_sex; ?>"  readonly><br>
  
  <label for="phone">Phone Number:</label>
  <input type="tel" id="phone" value="<?php echo $patient_phone; ?>"  readonly><br>
  
  <label for="testName">Test name:</label>
  <input type="text" id="testName" value="<?php echo $testAmount1; ?>" readonly>
  
  <label for="testAmount">Test amount:</label>
  <input type="text" id="testAmount" value="<?php echo $testAmount2; ?>"  readonly><br>
  
  <label for="totalBill">Total bill:</label>
  <input type="text" id="totalBill" value="<?php echo $totalAmount; ?>" readonly><br>
  </form>
  </div>
  <button>Print Bill</button>
  
  
  
  <footer> Address: Probortok Circle, Chittagong</footer>
  </body>
  </html>
