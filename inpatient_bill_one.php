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
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
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
.button-container {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Adjust the gap as needed */
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
    <body>

    <form id="form-user" action="inpatient_bill_one.php" method="post">
        
        <div class="form-box" data-errormsg="">
            <label for="input-name">Inpatient ID:</label>
            <input type="text" id="input-inpatient" required placeholder="Inpatient ID" name="inpatient-id" tabindex="2" />
        </div>
        <div class="form-box" data-errormsg="">
            <label for="input-edate">Ending Date:</label>
            <input type="date" id="input-edate" autofocus placeholder="Ending Date" name="Ending_Date" tabindex="1"/>
        </div>

        <div class="form-box" data-errormsg="">
            <label for="input-scost">Surgeries Cost:</label>
            <input type="number" id="input-scost" autofocus placeholder="Surgeries Cost " name="scost" tabindex="1"/>
        </div>

        <div class="form-box">
        
        <button id="button-register" type="submit">Generate Bill</button>
    </div>
    </form>


    <footer> Address: Probortok Circle, Chittagong</footer>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

//thik korte hbe
$IPid=$_POST["inpatient-id"];

$end_date = $_POST["Ending_Date"];
$surgeries_cost = $_POST["scost"];







// Insert data into the database



$sql = "UPDATE inpatient SET end_date = '$end_date' WHERE ipid = '$IPid';";


if ($conn->query($sql) === TRUE) {
 
    $output=ob_get_clean();
    header("Location: inpatient_bill_two.php?inpatient_id=" . $IPid . "&surgery=" . $surgeries_cost);
    exit();
  // Redirect to the success page with the ID as a query parameter

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




// Insert data into the database


$conn->close();
}
?>