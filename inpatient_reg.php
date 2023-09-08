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
?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Inpatient form</title>
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
        #bed-choices {
            display: none;
        }

        /* Show the bed choices when the input is checked */
        #bed-toggle:checked + #bed-choices {
            display: block;
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

  body>
  <header> Hospital Management System </header>
  <main id="container">
  <h1>Inpatient Registration</h1>
  </main>

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
      <label for="input-hproblem">Health Problem:</label>
      <input type="text" id="input-hproblem" autofocus placeholder="Health Problem" name="Health_Problem" tabindex="1"/>
  </div>

  <div class="form-box" data-errormsg="">
    <label for="input-sdate">Starting Date:</label>
    <input type="date" id="input-sdate" autofocus placeholder="Starting Date" name="Starting_Date" tabindex="1"/>
</div>

<div class="form-box" data-errormsg="">
<label for="input-room">Room No:</label>
        <input type="number" id="input-room" autofocus placeholder="Room" name="Room" tabindex="1"/>
</div>
<label for="doctor-assigned">Doctor Assigned:</label>
      
      <ul id="doctor-list" style="display: none;">
      <?php
          $query = "SELECT docid,name FROM doctor";
          $result = mysqli_query($conn, $query);
     
          if (mysqli_num_rows($result) > 0) {
              // 3. Loop through the results and generate the dropdown options
              while ($row = mysqli_fetch_assoc($result)) {
                  $doctorName = $row["name"];
                  echo "<li onclick='selectDoctor(\"$doctorName\")'>$doctorName</li>";
              }
          }
       ?>
      </ul>
  
  <input type="text" id="doctor-assigned" name="doctor-assigned">
  
    <div class="form-box">
        <button id="button-reset">Cancel</button>
        <button id="button-register" type="submit">Register</button>
    </div>
</form>

  <footer> Address: Probortok Circle, Chittagong</footer>
<script>
   var dropdownOpen = false;
        const doctorAssignedInput = document.getElementById('doctor-assigned');
        doctorAssignedInput.addEventListener('click', function() {
   toggleDropdown();
});
        function toggleDropdown() {
            var doctorList = document.getElementById("doctor-list");
            dropdownOpen = !dropdownOpen;

            if (dropdownOpen) {
                doctorList.style.display = "block";
            } else {
                doctorList.style.display = "none";
            }
        }

        function selectDoctor(doctorName) {
          
            document.getElementById("doctor-assigned").value = doctorName;
            toggleDropdown();
        }
  </script>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $name = $_POST["Name"];
  $phone = $_POST["Phone"];
  $address = $_POST["Address"];
  $age = $_POST["Age"];
  $gender = $_POST["Gender"];
  $problem = $_POST["Health_Problem"];
  $start = $_POST["Starting_Date"];
  $room = $_POST["Room"];
  $doctorAssigned = $_POST["doctor-assigned"];

  
  $query = "SELECT docid,name FROM doctor";
  $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
     
      $doctorName = $row['name'];
      
      if ($doctorAssigned === $doctorName) {
          // Found a match, $doctorID now contains the ID of the selected doctor
          $doctorAssignedID = $row['docid'];
          break; // Exit the loop since we found the ID
      }
      
  }





  $sql = "INSERT INTO inpatient (name,age,phone,sex,address,health_problem,start_date,end_date,bed_no,docid,room_id) VALUES ('$name',$age,'$phone','$gender','$address','$problem','$start',NULL,NULL,$doctorAssignedID,$room)";
if ($conn->query($sql) === TRUE) {
  echo "outpatient created successfully";


  // Redirect to the success page with the ID as a query parameter
  header("Location: index.php");
  exit();
}
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>
