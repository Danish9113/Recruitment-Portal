<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.html");
    exit;
}
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
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    <?php 
    require('navbar.php');
    ?>
    <?php
        echo '<p class="text-blue my-0 mx-2">Welcome <br>'. $_SESSION['username']. ' </p> '
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="profile">
                    <div class="text-center profile-icon">
                        <i class="fas fa-user-circle" ></i>
                    </div>
                    <div class="profilebody">
                    <p class="text-center"><?php echo $_SESSION['username']; ?></p>
                    <p class="text-center"><?php echo $email; ?></p>
                    <p class="text-center"><?php echo $phone; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-card">
                    <h3><a href="register.php">Complete Profile</a></h3>
                </div>
                <div class="profile-card">
                    <h3>View Profile</h3>
                    <!-- Display user details here -->
                </div>
                <div class="profile-card">
                    <h3> <a href="updateprofile.php">Update Profile</a></h3>

                    <!-- Update profile form here -->
                </div>
                <div class="profile-card">
                    <h3>Saved Jobs</h3>
                    <ul>
                        <!-- List of saved jobs -->
                    </ul>
                </div>
                <div class="profile-card">
                    <h3>User Activity</h3>
                    <!-- User activity content -->
                </div>
                <div class="profile-card">
                    <h3>Applied Jobs</h3>
                    <ul>
                        <!-- List of applied jobs -->
                    </ul>
                </div>
                <div class="profile-card">
                    <a href="logout.php">
                        <h3>Log Out</h3>
                    </a>
                    <!-- User activity content -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>