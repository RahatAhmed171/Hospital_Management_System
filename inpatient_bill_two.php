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
echo "Connected successfully";
}
// kaj hocche start date-end date calculate, test charges calculate and insert to bill
$inpatientID=$_GET['inpatient_id'];
$surgeries=$_GET['surgery'];
$sql1="SELECT start_date, end_date, DATEDIFF(end_date, start_date) AS day_difference
FROM inpatient where ipid = '$inpatientID'";
$result1 = $conn->query($sql1);



if ($result1) {
    $row1 = $result1->fetch_assoc();
    $dayDifference = $row1["day_difference"];
    $roomcharge=$dayDifference*1000;
  
} else {
    // Handle any errors with the query.
    echo "Error in query 1: " . $conn->error;
}
$sql2="SELECT SUM(test_amount) AS total_amount FROM test WHERE ipid ='$inpatientID'";
$result2 = $conn->query($sql2);

if ($result2) {
    $row2 = $result2->fetch_assoc();
    if ($row2['total_amount'] !== null) {
      // If rows were returned, set the PHP variable
      $totalTestCharges = $row2['total_amount'];
  } else {
      // If no rows were returned, set the PHP variable to zero
      $totalTestCharges = 0;
  }

}
 else {
    // Handle any errors with the query.
    echo "Error in query 1: " . $conn->error;
}
$grandTotal=$totalTestCharges+$roomcharge+$surgeries;


$sql3="INSERT INTO bill (test_charge,no_of_days,room_charge,Surgeries,Total,ipid,opid	) VALUES ('$totalTestCharges','$dayDifference',$roomcharge,'$surgeries','$grandTotal','$inpatientID',NULL)";
$result3 = $conn->query($sql3);

if ($result3) {
   
   
} else {
    // Handle any errors with the query.
    echo "Error in query 2: " . $conn->error;
}
$sql4="SELECT name,age,phone,sex,address,start_date,end_date,room_id from inpatient WHERE ipid ='$inpatientID'";
$result4 = $conn->query($sql4);
// Calculate the total amount
if ($result4) {
  $row4 = $result4->fetch_assoc();

  // Store each column's value in separate variables
  $name = $row4['name'];
  $age = $row4['age'];
  $phone = $row4['phone'];
  $sex = $row4['sex'];
  $address = $row4['address'];
  $start_date = $row4['start_date'];
  $end_date = $row4['end_date'];
  $room_id = $row4['room_id'];


} else {
  // Handle any errors with the query.
  echo "Error in query 2: " . $conn->error;
}
$output=ob_get_clean();
$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Inpatient Bill </title>
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
            <input type="text" id="input-name" value="<?php echo $name; ?>"  readonly><br>
        </div>
        <div class="form-box" data-errormsg="">
            <label for="input-phone">Phone:</label>
            <input type="text" id="input-phone" value="<?php echo $phone; ?>"  readonly><br>
        </div>
        <div class="form-box" data-errormsg="">
            <label for="input-address">Address:</label>
            <input type="text" id="input-address" value="<?php echo $address; ?>"  readonly><br>
        </div>
        <div class="form-box" data-errormsg="">
            <label for="input-age">Age:</label>
            <input type="number" id="input-number" value="<?php echo $age; ?>"  readonly><br>
        </div>
        <div class="form-box" data-errormsg="">
            <label for="input-gender">Gender:</label>
            <input type="text" id="input-gender" value="<?php echo $sex; ?>"  readonly><br>
        </div>

    
      <div class="form-box" data-errormsg="">
        <label for="input-sdate">Starting Date:</label>
        <input type="date" id="input-sdate" value="<?php echo $start_date; ?>"  readonly><br>
    </div>
    <div class="form-box" data-errormsg="">
        <label for="input-edate">Ending Date:</label>
        <input type="date" id="input-edate" value="<?php echo $end_date; ?>"  readonly><br>
    </div>
    
    <div class="form-box" data-errormsg="">
    <label for="input-room">Room No:</label>
            <input type="number" id="input-room" value="<?php echo $room_id; ?>"  readonly><br>
    </div>

    <div class="form-box" data-errormsg="">
    <label for="input-tcharge">Test Charges:</label>
            <input type="number" id="input-tcharge" value="<?php echo $totalTestCharges; ?>"  readonly><br>
    </div>
    <div class="form-box" data-errormsg="">
    <label for="input-rcharge">Room Charges:</label>
            <input type="number" id="input-rcharge" value="<?php echo $roomcharge; ?>"  readonly><br>
    </div>
    <div class="form-box" data-errormsg="">
    <label for="input-scost">Surgery Costs:</label>
            <input type="number" id="input-scost" value="<?php echo $surgeries; ?>"  readonly><br>
    </div>
    <div class="form-box" data-errormsg="">
    <label for="input-total">Total:</label>
            <input type="number" id="input-total" value="<?php echo $grandTotal; ?>"  readonly><br>
    </div>
</form>
  
  
  
  <footer> Address: Probortok Circle, Chittagong</footer>
  </body>
  </html>
