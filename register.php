<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3b57a2a2a7.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sedgwick+Ave+Display&display=swap" rel="stylesheet">
<link rel="stylesheet" href="home.css">  
<link rel="stylesheet" href="register.css">
</head>

<body onload="generateCaptcha();">
<?php 
    require('navbar.php');
?>
  <form id="registerform" action="db_register.php" method="post">
    <div class="container">
      <center>
        <h3 align="left">Complete Profile</h3>
      </center>
      <hr>
      <label><b> First Name</b> </label> <br>
      <input type="text" name="firstname" placeholder="Enter First Name" size="15" required />
      <br>
      <label> <b>Middle Name </b></label> <br>
      <input type="text" name="middlename" placeholder=" Enter Middle name" size="15" />
      <br>
      <label><b> Last Name </b></label> <br>
      <input type="text" name="lastname" placeholder=" Enter Last Name" size="15" />

      <label><b> Age </b></label> <br>
      <input type="text" name="age" placeholder=" Enter Your Age" size="15" required />


      <label><b> Date of Birth</b> </label>
      <input type="date" id="dob" name="dob" placeholder="dd-mm-yyyy" size="15" required />
      <div>
        <label>
          <b>
            Gender</b>
        </label><br>
        <input type="radio" value="Male" name="gender" checked> Male
        <input type="radio" value="Female" name="gender"> Female
        <input type="radio" value="Other" name="gender"> Other
        <br><br>

        <label> <b>Guardian's/Father's Name</b> </label>
        <input type="text" name="fathername" placeholder="Guardian's/Father's Name" size="15" required />
        <label> <b>Highest Education </b></label> <br>
        <select name="highesteducation">
          <option value="Highest Education">Highest Education</option>
          <option value="Graduate">Graduate</option>
          <option value="Under Graduate">Under Graduate</option>
          <option value="post Graduate">Post Graduate</option>
          <option value="Phd">Phd</option>
          <option value="Diploma">Diploma</option>
          <option value="Others">Others</option>
        </select>
        <label><b> Educational Qualification</b></label><br>
        <input type="text" name="qualification" placeholder="B-tech" size="15" required />


        <label><b>Specialization/Major</b> </label>
        <input type="text" name="major" placeholder="Computer Science" size="15" required />


        <label> <b>
            Board/University </b>
        </label><br>
        <input type="text" name="board" placeholder="Jamia Milia Islamia" size="15" required />


        <label> <b>
            Nature of the Course </b>
        </label>

        <select name="course">
          <option value=" Nature of the Course">Nature of the Course</option>
          <option value="Full Time">Full Time</option>
          <option value="Part Time">Part Time</option>
          <option value="Distane Mode">Distane Mode</option>

        </select>
        <label for="phone"><b>Mobile Number</b><br></label> <br>
        <select name="code" id="code">
          <option>+91</option>
          <option>+92</option>
          <option>+34</option>
          <option>+86</option>
          <option>+12</option>
          <option>+94</option>
          <option>+85</option>
        </select>
        <br>
        <input type="text" id="mobNum" name="phone" placeholder=" 9113XXXXXX" maxlength="10" required>
        <label for="email"><b>E-mail</b><br></label>
        <input type="text" id="emailInput" placeholder="abc@gmail.com" name="email" required>

        <label><b> Choose the File to upload Resume/CV </b></label><br>
        <input type="file" name="resume" id="myFile" /> <br /><br />

        <label><b>Upload Additional Certificate (If Any)</b> </label><br>
        <input type="file" id="myFile" name="file" /> <br /><br />

        <label><b>Skills </b></label>
        <textarea name="skills" class="add " cols="50" rows="5" placeholder=" Enter Your Skills" value="skills"
          required>
        </textarea>
        <br>

        <label><b>Current Address </b></label>
        <textarea name="current" class="add " cols="50" rows="5" placeholder=" Enter Your Current Address"
          value="address" required></textarea>
        <label> <b>Permanent Address </b> </label>
        <textarea name="permanent" class="add" cols="80" rows="5" placeholder=" Enter Your Permanent  Address"
          value="address" required></textarea>
        <br>
        <label >Captcha</label>
          <div class="captcha-container">
          <input type="text" id="mainCaptcha" readonly="readonly"/>
  <input class="refresh-btn" type="button" id="refresh" value="Refresh" onclick="generateCaptcha();"/>
  
        </div>
<label>Fill Captcha</label>
<div class="captcha-container">
<input type="text" id="txtinput"/>
<input class="refresh-btn" type="button" id="Button1" value="Check" onclick="CheckValidCaptcha();"/>
</div>
        <input type="checkbox" id="check"><span> I agree all the terms and condition.</span><br><br>
        <br>
        <button type="reset" class="registerbtn" id="resetbtn">Reset/Clear</button>
        <br>
        <button type="submit" class="registerbtn">Register</button>
        <br>

  </form>
  <!-- Captcha -->
    <script type="text/javascript">

      function generateCaptcha()
      {
      var cap = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','1','2','3','4','5','6','7','8','9','0');
      var i; 
      for (i=0;i<4;i++){
      var a = cap[Math.floor(Math.random() * cap.length)];
      var b = cap[Math.floor(Math.random() * cap.length)];
      var c = cap[Math.floor(Math.random() * cap.length)];
      var d = cap[Math.floor(Math.random() * cap.length)];
      
      }
      var code = a + b + c + d;
      document.getElementById("mainCaptcha").value = code
      }
      function CheckValidCaptcha(){
      var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
      var string2 = removeSpaces(document.getElementById('txtinput').value);
      
       if (string1 == string2){
      document.getElementById('success').innerHTML = "Form is validated Successfully";
      alert("Form is validated Successfully");
      return true;
      }   
      else{
      document.getElementById('error').innerHTML = "Please Enter a Valid Captcha";
      
      return false;
      }     
      }
      
      function removeSpaces(string){
      return string.split(' ').join('');
      }
    $(document).ready(function () {
      $("#mobNum").intlTelInput({
        separateDialCode: true,
        customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
          return "e.g. " + selectedCountryPlaceholder;
        },
      });
    });
    const emailInput = document.getElementById("emailInput");
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    emailInput.addEventListener("input", function () {
      const emailValue = this.value;

      if (emailRegex.test(emailValue)) {
        this.classList.remove("invalid");
      } else {
        this.classList.add("invalid");
      }
    });  
  </script>
</body>
</html>