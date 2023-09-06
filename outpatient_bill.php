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
  <input type="text" id="name" value="John Doe" readonly><br>
  
  <label for="age">Age:</label>
  <input type="number" id="age" value="30" readonly><br>
  
  <label for="sex">Sex:</label>
  <input type="text" id="sex" value="Male" readonly><br>
  
  <label for="phone">Phone Number:</label>
  <input type="tel" id="phone" value="123-456-7890" readonly><br>
  
  <label for="testName">Test name:</label>
  <input type="text" id="testName" value="COVID-19 Test" readonly>
  
  <label for="testAmount">Test amount:</label>
  <input type="text" id="testAmount" value="$50" readonly><br>
  
  <label for="totalBill">Total bill:</label>
  <input type="text" id="totalBill" value="$50" readonly><br>
  </form>
  </div>
  <button>Print Bill</button>
  
  
  
  <footer> Address: Probortok Circle, Chittagong</footer>
  </body>
  </html>