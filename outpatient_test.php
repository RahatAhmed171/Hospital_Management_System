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
    <title>Outpatient Test </title>
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
  padding-top: 30px;
  padding-bottom: 20px;
}
main>h1{
    text-align: center;
    font-size: 20px;
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
   <h1>Outpatient Test Registration </h1>
    </main>
    
    
    <form action="outpatient_test.php" method="POST">
   
    <div class="form-one-container">
    <label for="outpatient-id">Outpatient ID:</label>
    <input type="text" id="outpatient-id" name="outpatient-id" value="<?php echo isset($_GET['inserted_id']) ? htmlspecialchars($_GET['inserted_id']) : ''; ?>" readonly>
    <br>
    <label for="test-one-name">Test name:</label>
    <select id="test-one-name" name="test-one-name" size="10">
    <option value="X-Ray">X-Ray</option>
    <option value="Blood Count">Blood Count (CBC)</option>
    <option value="MRI">MRI</option>
    <option value="Creatanine point">Createnine kidney test</option>
    <option value="CT">City Scan(CT)</option>
    <option value="ECG">ECG</option>
    <option value="Endoscopy">Endoscopy</option>
    <option value="HIV">HIV</option>
    <option value="Prostate Test">Prostate Test</option>
     <option value="Dengue Test">Dengue Test</option>
    <!-- Add more test options as needed -->
    </select>
    
    <label for="test-one-amount">Test amount:</label>
    <input type="number" id="test-one-amount" name="test-one-amount">
    
    <label for="test-one-date">Test Date:</label>
    <input type="date" id="test-one-date" name="test-one-date">
    
    <label for="doctor-one-name">Doctor name:</label>
       
            <ul id="doctor-one-list" style="display: none;">
             <?php
             ob_start();
                $query = "SELECT docid,name FROM doctor";
                $result = mysqli_query($conn, $query);
           
                if (mysqli_num_rows($result) > 0) {
                    // 3. Loop through the results and generate the dropdown options
                    while ($row = mysqli_fetch_assoc($result)) {
                        $doctorName = $row["name"];
                        
                        echo "<li onclick='selectoneDoctor(\"$doctorName\")'>$doctorName</li>";
                    }
                }
             ?>
            </ul>
        
        <input type="text" id="doctor-one-name" name="doctor-one-name">
    
    </div>
    <br>
    <div class="form-two-container">
    
    <label for="test-two-name">Test name:</label>
    <select id="test-two-name" name="test-two-name" size="10">
    <option value="X-Ray">X-Ray</option>
    <option value="Blood Count">Blood Count (CBC)</option>
    <option value="MRI">MRI</option>
    <option value="Creatanine point">Createnine kidney test</option>
    <option value="CT">City Scan(CT)</option>
    <option value="ECG">ECG</option>
    <option value="Endoscopy">Endoscopy</option>
    <option value="HIV">HIV</option>
    <option value="Prostate Test">Prostate Test</option>
    <option value="Dengue Test">Dengue Test</option>
    
    <!-- Add more test options as needed -->
    </select>
    
    <label for="test-two-amount">Test amount:</label>
    <input type="number" id="test-two-amount" name="test-two-amount">
    
    <label for="test-two-date">Test Date:</label>
    <input type="date" id="test-two-date" name="test-two-date">
    
    <label for="doctor-two-name">Doctor name:</label>
      
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
        
        <input type="text" id="doctor-two-name" name="doctor-two-name">
    </div>
    <button>Generate Bill</button>
    </form>
    
   
    
    <!-- Repeat the above div structure for the other two forms -->
    
    
    
    
    

        
        
    

    <footer> Address: Probortok Circle, Chittagong</footer>
    <script>
        var dropdownOpen = false;
        const doctorTwoNameInput = document.getElementById('doctor-two-name');
        doctorTwoNameInput.addEventListener('click', function() {
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
          
            document.getElementById("doctor-two-name").value = doctorName;
            toggleDropdown();
        }

        const doctorOneNameInput = document.getElementById('doctor-one-name');
        doctorOneNameInput.addEventListener('click', function() {
   toggleoneDropdown();
});
        function toggleoneDropdown() {
            var doctorList = document.getElementById("doctor-one-list");
            dropdownOpen = !dropdownOpen;

            if (dropdownOpen) {
                doctorList.style.display = "block";
            } else {
                doctorList.style.display = "none";
            }
        }

        function selectoneDoctor(doctorName) {
          //document.getElementById("selected-one-doctor").textContent = doctorName;
            document.getElementById("doctor-one-name").value = doctorName;
            toggleoneDropdown();
        }
    </script>

</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

//thik korte hbe
$OPid=$_POST["outpatient-id"];

$test_one_name = $_POST["test-one-name"];
$test_one_amount = $_POST["test-one-amount"];
$test_one_date = $_POST["test-one-date"];
$doctorOneName = $_POST["doctor-one-name"];

$test_two_name = $_POST["test-two-name"];
$test_two_amount = $_POST["test-two-amount"];
$test_two_date = $_POST["test-two-date"];
$doctorTwoName = $_POST["doctor-two-name"];





// Insert data into the database

$query = "SELECT docid,name FROM doctor";
$result = mysqli_query($conn, $query);
  
  while ($row = mysqli_fetch_assoc($result)) {
   
    $doctorName = $row['name'];
    
    if ($doctorOneName === $doctorName) {
        // Found a match, $doctorID now contains the ID of the selected doctor
        $doctorOneID = $row['docid'];
        break; // Exit the loop since we found the ID
    }
    
}
$query = "SELECT docid,name FROM doctor";
$result = mysqli_query($conn, $query);
while ($row2 = mysqli_fetch_assoc($result)) {
  
  $doctorName = $row2['name'];
  
  if ($doctorTwoName === $doctorName) {
      // Found a match, $doctorID now contains the ID of the selected doctor
      $doctorTwoID = $row2['docid'];
      break; // Exit the loop since we found the ID
  }
 
}

$sql1 = "INSERT INTO test (patient_type,test_name,test_amount,test_date,test_result,docid,opid,ipid	) VALUES ('outpatient','$test_one_name',$test_one_amount,'$test_one_date','null','$doctorOneID','$OPid',NULL)";
$sql2 = "INSERT INTO test (patient_type,test_name,test_amount,test_date,test_result,docid,opid,ipid	) VALUES ('outpatient','$test_two_name',$test_two_amount,'$test_two_date','null','$doctorTwoID','$OPid',NULL)";
if ($conn->query($sql1) === TRUE) {
 
  $lastInsertedfirstId = $conn->insert_id;

  // Redirect to the success page with the ID as a query parameter

} else {
  echo "Error: " . $sql1 . "<br>" . $conn->error;
}
if ($conn->query($sql2) === TRUE) {
 
  $lastInsertedsecondId = $conn->insert_id;
  $output=ob_get_clean();
  header("Location: outpatient_bill.php?inserted_first_id=" . $lastInsertedfirstId . "&inserted_second_id=" . $lastInsertedsecondId . "&data1=" . $OPid);
  exit();

  // Redirect to the success page with the ID as a query parameter
  

} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}



// Insert data into the database


$conn->close();
}
?>
