<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Inpatient Test </title>
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
   <h1>Inpatient Test Registration </h1>
    </main>
    
    <label for="inpatient-id">Inpatient ID:</label>
    <input type="text" id="inpatient-id" name="inpatient-id">
    <div class="form-container">
    <form>
    <label for="test-name">Test name:</label>
    <select id="test-name" name="test-name" size="10">
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
    
    <label for="test-amount">Test amount:</label>
    <input type="number" id="test-amount" name="test-amount">
    
    <label for="test-date">Test Date:</label>
    <input type="date" id="test-date" name="test-date">
    
    <label for="doctor-name">Doctor name:</label>
    <select id="doctor-name" name="doctor-name" size="10">
    <option value="doc1">Doctor 1</option>
    <option value="doc2">Doctor 2</option>
    <option value="doc3">Doctor 3</option>
    <!-- Add more doctor options as needed -->
    </select>
    
    
    </form>
    </div>
    <br>
    <div class="form-container">
    <form>
    <label for="test-name">Test name:</label>
    <select id="test-name" name="test-name" size="10">
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
    
    <label for="test-amount">Test amount:</label>
    <input type="number" id="test-amount" name="test-amount">
    
    <label for="test-date">Test Date:</label>
    <input type="date" id="test-date" name="test-date">
    
    <label for="doctor-name">Doctor name:</label>
    <select id="doctor-name" name="doctor-name" size="10">
    <option value="doc1">Doctor 1</option>
    <option value="doc2">Doctor 2</option>
    <option value="doc3">Doctor 3</option>
    <!-- Add more doctor options as needed -->
    </select>
    
    </form>
    </div>
    <button>Add test</button>
    
    <!-- Repeat the above div structure for the other two forms -->
    
    
    
    
    

        
        
    </body>

    <footer> Address: Probortok Circle, Chittagong</footer>
</body>
</html>