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
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>Welcome, <?php echo $_SESSION['user_name'];?>!</h2>

    <a href="admin_logout.php">Sign Out</a>
</body>
</html>