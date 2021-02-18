<!-- ADMIN PANEL HOME PAGE -->

<?php 
require_once '../load.php'; 
confirm_logged_in(); // this function will amke sure only a logged in user will see the following. Verify using incogneto mode! 
?>

<!DOCTYPE html>     
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/hps2ffl.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <div class="admin-dashboard">
        <h3>Welcome, <?php echo $_SESSION['user_name'];?>!</h3>
        <h4>Previous login: <?php echo $_SESSION['user_date'];?></h4>
        <h4>Number of logins: <?php echo $_SESSION['logins'];?></h4>
        <!-- number of times logged in will display here -->
        <a href="admin_logout.php">Sign Out</a>
        <br>
        <a href="../index.php">Back to Home</a>
        <br>
        <a href="admin_createuser.php">Create a New Admin</a>
    </div>
</body>
</html>