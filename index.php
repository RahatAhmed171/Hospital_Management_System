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

        <div class="center">
            <img src="ezgif.com-webp-to-jpg.jpg" alt="Centered Image">
        </div>
      
        <div class="button-container">
        <button><a href="outpatient_reg.php"><b>Outpatient Registration</b></a></button>
    <button><a href="inpatient_reg.php"><b>Inpatient Registration</b></a></button>
    <button><a href="inpatient_test.php"><b>Inpatient Test</b></a></button>
    <button><a href="inpatient_bill.php"><b>Inpatient Bill</b></a></button>
    <button><a href="admin.php"><b>Admin</b></a></button>
        </div>
        
    </body>

    <footer> Address: Probortok Circle, Chittagong</footer>
</body>
</html>