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
</head>

<body>
  <!-- Home Page -->
  <?php 
    require('navbar.php');
    ?>
  <!-- Search Box -->
  <div class="container">
    <form action="" class="searchbar">
      <div class="search-container">
        <div class="search-box">
          <p class="job"><b>Search Jobs</b></p>
          <label for="job-title">Job Title</label>
          <input type="text" id="job-title" placeholder="Enter job title">

          <label for="job-location">Job Location</label>
          <select id="job-location">
            <option value="Any">Any</option>
            <option value="new delhi">New Delhi</option>
            <option value="noida">Noida</option>
            <option value="grugram">Grugram</option>
            <option value="hydrabad">Hydrabad</option>
            <option value="bengaluru">Bengaluru</option>
            <option value="patna">Patna</option>
            <option value="kolkata">Kolkata</option>
          </select>
          <label for="expected-salary">Expected Salary</label>
          <input type="text" id="expected-salary" placeholder="Enter expected salary">
          <label for="org-type">Organization Type</label>
          <select id="org-type">
            <option value="any">Any</option>
            <option value="government">Government</option>
            <option value="private">Private</option>
            <option value="mnc">MNCs</option>
          </select>

          <div class="button-container">
            <button class="search-button">Search</button>
            <button class="clear-button">Clear</button>
          </div>
        </div>
        <!-- Notification Box -->
        <div class="notification">
          <p class="job"><b>Notifications</b>
            <hr>
          </p>
        </div>
      </div>
    </form>
  </div>
</body>
</html>