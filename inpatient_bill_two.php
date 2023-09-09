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
// kaj hocche start date-end date calculate, test charges calculate and insert to bill
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
  <form id="form-user" action="inpatient_reg.php" method="post">
        
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

    
      <div class="form-box" data-errormsg="">
        <label for="input-sdate">Starting Date:</label>
        <input type="date" id="input-sdate" autofocus placeholder="Starting Date" name="Starting_Date" tabindex="1"/>
    </div>
    <div class="form-box" data-errormsg="">
        <label for="input-edate">Ending Date:</label>
        <input type="date" id="input-edate" autofocus placeholder="Ending Date" name="Ending_Date" tabindex="1"/>
    </div>
    
    <div class="form-box" data-errormsg="">
    <label for="input-room">Room No:</label>
            <input type="number" id="input-room" autofocus placeholder="Room" name="Room" tabindex="1"/>
    </div>

    <div class="form-box" data-errormsg="">
    <label for="input-tcharge">Test Charges:</label>
            <input type="number" id="input-tcharge" autofocus placeholder="Test Charges" name="tcharges" tabindex="1"/>
    </div>
    <div class="form-box" data-errormsg="">
    <label for="input-rcharge">Room Charges:</label>
            <input type="number" id="input-rcharge" autofocus placeholder="Room Charges" name="rcharges" tabindex="1"/>
    </div>
    <div class="form-box" data-errormsg="">
    <label for="input-scost">Surgery Costs:</label>
            <input type="number" id="input-scost" autofocus placeholder="Surgery Costs" name="scosts" tabindex="1"/>
    </div>
    <div class="form-box" data-errormsg="">
    <label for="input-total">Total:</label>
            <input type="number" id="input-total" autofocus placeholder="Total" name="total" tabindex="1"/>
    </div>
</form>
  
  
  
  <footer> Address: Probortok Circle, Chittagong</footer>
  </body>
  </html>