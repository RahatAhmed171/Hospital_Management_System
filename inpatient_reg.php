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

  <form id="form-user" action="#" method="post">
        
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
      <input type="text" id="input-hproblem" autofocus placeholder="Health Problem" name="Health Problem" tabindex="1"/>
  </div>

  <div class="form-box" data-errormsg="">
    <label for="input-sdate">Starting Date:</label>
    <input type="date" id="input-sdate" autofocus placeholder="Starting Date" name="Starting Date" tabindex="1"/>
</div>

<div class="form-box" data-errormsg="">
  <label for="bed-toggle">Bed No:</label>
  <input type="checkbox" id="bed-toggle" autofocus placeholder="Bed No" name="Bed No" tabindex="1"/>
  <ul id="bed-choices">
    <li>101</li>
    <li>102</li>
    <li>103</li>
    <li>104</li>
    <li>105</li>
</ul>
</div>
  
    <div class="form-box">
        <button id="button-reset">Cancel</button>
        <button id="button-register" type="submit">Register</button>
    </div>
</form>

  <footer> Address: Probortok Circle, Chittagong</footer>
</body>
</html>