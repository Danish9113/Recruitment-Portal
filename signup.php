<?php
$phoneError = "";
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connection.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $existSql = "SELECT * FROM `signup` WHERE email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $emailExist = mysqli_num_rows($result);
    if($emailExist > 0){
        $emailError = "Email Already Exists";
    }
    $existSql = "SELECT * FROM `signup` WHERE phone = '$phone'";
    $result = mysqli_query($conn, $existSql);
    $phoneExist = mysqli_num_rows($result);
    if($phoneExist > 0){
        $phoneError = "Number Already Exists";
    }

    // Check whether this username exists
    $existSql = "SELECT * FROM `signup` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        $showError = "Username Already Exists";
    }
    else{
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `signup` ( `username`, `email`,`phone`,`password`,`cpassword`, `dt`) VALUES ('$username','$email','$phone','$hash', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
                header("location:login.php");
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}   
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="signup.css">
  <link rel="stylesheet" href="home.css">
  <script src="https://kit.fontawesome.com/3b57a2a2a7.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>

    <title>SignUp</title>
  </head>
  <body>
  <?php 
    require('navbar.php');
?>
<?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show"  role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($emailError){
    echo ' <div class="alert alert-danger alert-dismissible fade show"  role="alert">
        <strong>Error!</strong> '. $emailError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($phoneError){
    echo ' <div class="alert alert-danger alert-dismissible fade show"  role="alert">
        <strong>Error!</strong> '. $phoneError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
<Section>
    <div class="colour"></div>
    <div class="colour"></div>
    <div class="colour"></div>
    <div class="box">
      <div class="square" style="--I: 0"></div>
      <div class="square" style="--I: 1"></div>
      <div class="square" style="--I: 2"></div>
      <div class="square" style="--I: 3"></div>
      <div class="square" style="--I: 4"></div>
      <div class="Container">
        <div class="Form">
          <h2>Sign Up</h2>
          <Form action="signup.php" method="post">
            <div class="Input__box">
              <i class="fa-solid fa-user"></i>
              <Input Type="Text" placeholder="Name" name="username" required />
            </div>
            <div class="Input__box">
              <i class="fa fa-envelope"></i>
              <input type="email" id="emailInput" placeholder="e-mail" name="email" required />
            </div>

            <div class="Input__box">
              <i class="fa-solid fa-phone"></i>
              <Input type="tel" id="mobNum" placeholder="Phone Number" pattern="[0-9]{10}"  minlength="10" maxlength="10" name="phone" required />
            </div>
            <div class="Input__box">
              <input type="password" id="password" placeholder="Password" name="password" required />
              <span class="eye" id="togglePassword">
                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
              </span>
            </div>
            <div class="Input__box">
              <Input Type="Password" placeholder=" Confirm Password" name="cpassword" required />
            </div>
            <div class="Input__box">
              <button type="submit" class="btn btn-primary">SignUp</button>
              <span class="button-space"></span>
            </div>
          </Form>
        </div>
      </div>
  </Section>
  <script>
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
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', () => {
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
      }
    });
  </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
