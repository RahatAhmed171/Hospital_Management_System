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

$sql="SELECT
  t.test_id,
    t.patient_type,
    t.test_amount,
    t.test_date,
    t.test_result,
    d.name AS doctor_name,
CASE
    WHEN t.patient_type = 'inpatient' THEN i.name
    WHEN t.patient_type = 'outpatient' THEN o.name
    ELSE NULL  -- Handle the case when patient_type is neither 'inpatient' nor 'outpatient'
END AS patient_name
FROM
test t
INNER JOIN
doctor d ON t.docid = d.docid
LEFT JOIN
inpatient i ON t.patient_type = 'inpatient' AND t.ipid = i.ipid
LEFT JOIN
outpatient o ON t.patient_type = 'outpatient' AND t.opid = o.opid;
";

$result= $conn->query($sql);

if ($result) {
   
 
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



</style>
  </head>
  <body>
    <header> Hospital Management System </header>
    <main id="container">
   
    </main>
    <body>
    
    <a href="logout.php">Logout</a>
    <table width="80%" border=2>
        <tr>
            <td>Test id</td>
            <td>Name</td>
            <td>Patient type</td>
            <td>Test amount</td>
            <td>Test Date</td>
            <td> Referred Doctor</td>
            <td> Report</td>
            <td>Actions</td>
        </tr>

        <?php
         while( $r = $result->fetch_assoc())
         {
             echo "<tr>";
             echo "<td>".$r['test_id']."</td>";
             echo "<td>".$r['patient_name']."</td>";
             echo "<td>".$r['patient_type']."</td>";
             echo "<td>".$r['test_amount']."</td>";
             echo "<td>".$r['test_date']."</td>";
             echo "<td>".$r['doctor_name']."</td>";
             echo "<td>".$r['test_result']."</td>";
             echo "<td><a href=\"edit.php?id=$r[test_id]\">Edit</a> | <a href=\"delete.php?id=$r[test_id]\" onClick = \"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
     
         }
         ?>
    </table>

       
        
    

  
</body>
</html>
