<?php
session_start();
include 'connection.php'; // Include the database connection file

// Retrieve user information from the database based on the logged-in user's username
$username = $_SESSION['username'];
$sql = "SELECT * FROM signup WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    // Handle the database query error
    die("Database query error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $phone = $row['phone'];
} else {
    // Handle the case where the user is not found in the database
    die("User not found in the database");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile Page</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="home.css">
    <style>
        .profile-header {
            background-color: #e6edf3;
            color: #ffffff;
            padding: 20px;
        }
        .row{
            margin-top: 22vh;
          }
          @media screen and (max-width: 991px){
            .row{
              margin-top: 48vh;
            }
          }
          .form-control{
            border-radius: 60px;
          }

        .profile-header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        .logo {
            text-align: center;
            padding: 10px 0;
        }

        .logo-img {
            max-width: 80px;
            height: auto;
        }

        .profile-card {
            background-color: #7777fc;
            border: 1px solid #dee2e6;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-card1 {
            background-color: #7777fc;
            border: 1px solid #dee2e6;
            border-radius: 130px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-icon {
            font-size: 3rem;
        }

        .logo {
            margin-left: 31.5%;
            margin-top: -110px;

        }

        .logo2 {
            margin-left: -1px;
            margin-top: -2vh;

        }
    </style>
</head>

<body>
<?php 
    require('navbar.php');
?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-card1">
                    <div class="text-center profile-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <p class="text-center"><?php echo $_SESSION['username']; ?></p>
                    <p class="text-center"><?php echo $email; ?></p>
                    <p class="text-center"><?php echo $phone; ?></p>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-card">
                    <h2>Update Profile</h2>
                    <form id="update-profile-form">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="mobno">Mobile Number:</label>
                            <input type="tel" class="form-control" id="mobno" placeholder="Enter mobile number"
                                maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="skills">Skills:</label>
                            <input type="text" class="form-control" id="skills" placeholder="Enter skills">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                    <p class="mt-3"><small>Last updated: August 20, 2023</small></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>