<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from signup where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: profile.php");
            } 
            else{
                echo "Invalid Credentials";
            }
        }
        
    } 
    else{
        echo "Invalid Credentials";
    }
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="home.css">
  <script src="https://kit.fontawesome.com/3b57a2a2a7.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<!-- Heading  -->
<body>
<?php 
    require('navbar.php');
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
      <!-- Login Form -->
      <div class="Container">
        <div class="Form">
          <h2>Login</h2>
          <Form action="login.php" method="post">
            <div class="Input__box">
              <i class="fa fa-envelope"></i>
              <Input type="text" placeholder="Username" name="username" />
            </div>
            <div class="Input__box">
              <i class="fa fa-key"></i>
              <input type="password" id="password" placeholder="Password" name="password" />
              <span class="eye" id="togglePassword">
                <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
              </span>
            </div>
            <div class="Input__box">
              <button type="submit" class="btn btn-primary">Login</button>
              <span class="button-space"></span>
            </div>
            <br>
            <P class="Forget">
              Forgot Password? <A href="#">Click here</A>
            </P>
            <P class="Forget">
              Don't have An Account? <A href="signup.php">Sign Up</A>
            </P>
          </Form>
        </div>
      </div>
    </div>
  </Section>
<!-- Show Password -->
  <script>
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
</body>
</html>