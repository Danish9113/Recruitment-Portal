<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="home.css">
  <script src="https://kit.fontawesome.com/3b57a2a2a7.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Home Page -->
  <?php 
  echo'<div class="mainheader">
    <div class="header">
      <div class="logo-container">
        <img src="logo.png" alt="" class="logo-img">
      </div>
      <h1 class="text-center">Recruitment Portal</h1>
    </div>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg >
      <div class=" collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mx-2">
        <li class="nav-item active">
          <a class="nav-link" href="Home.php">Home <span class=" sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Browse Vacancies<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Resources<span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Helpdesk<span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="https://github.com/Danish9113" class="nav-link"><i class="fab fa-github"></i></a>
        </li>
        <li class="nav-item">
          <a href="https://www.linkedin.com/in/danish-naseem-a8a3ba248" class="nav-link"><i
              class="fab fa-linkedin-in"></i></a>
        </li>
        <li class="nav-item">
          <a href="https://instagram.com/naseem_danish_?igshid=MzNlNGNkZWQ4Mg==" class="nav-link"><i
              class="fab fa-instagram"></i></a>
        </li>
        <li class="nav-item">
          <a href="https://twitter.com/DanishNaseem_U?s=09" class="nav-link"><i class="fab fa-twitter"></i></a>
        </li>
      </ul>';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo'<p class="text my-0 mx-2">Welcome<br> '. $_SESSION['username']. ' </p>';
      }
      else{

      echo'<button type="button" class="btn btn-secondary mx-2" id="popcart" data-container="body" data-toggle="popover"
        data-placement="bottom" data-html="true" data-content="Vivamus
    sagittis lacus vel augue laoreet rutrum faucibus."><a href="login.php">Login</a>
      </button>
      <button type="button" class="btn btn-secondary mx-2" id="popcart" data-container="body" data-toggle="popover"
        data-placement="bottom" data-html="true" data-content="Vivamus
    sagittis lacus vel augue laoreet rutrum faucibus."><a  href="signup.php">Signup</a>
      </button>';
      }

  echo'</div>
  </nav>
  </div>';
?>
  <div class="home-hero-bg bgcol">
    <img src="background.svg" alt="" width="417" height="646"
      class="home-hero-bg-graphic home-hero-bg-graphic-left home-hero-bg-graphic-lg">
    <img src="background2.svg" alt="" width="219" height="379"
      class="home-hero-bg-graphic home-hero-bg-graphic-left home-hero-bg-graphic-sm">
    <img src="background3.svg" alt="" width="472" height="667"
      class="home-hero-bg-graphic home-hero-bg-graphic-right home-hero-bg-graphic-lg">
    <img src="background4.svg" alt="" width="219" height="461"
      class="home-hero-bg-graphic home-hero-bg-graphic-right home-hero-bg-graphic-sm">
  </div>
</body>
</html>