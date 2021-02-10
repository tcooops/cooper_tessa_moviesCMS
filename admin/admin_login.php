<?php
    require_once '../load.php';
    $ip = $_SERVER['REMOTE_ADDR'];

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if(!empty($username) && !empty($password)) {
            $result = login($username,$password,$ip);
            $message = $result;
        } else {
            $message = 'Please fill out the required fields';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>  
    <h1>Admin Panel</h1>
    <?php include 'templates/header.php'; ?>
        <div class="admin-login-wrapper">
        <?php echo !empty($message)?$message:'';?>
            <form action="admin_login.php" method="post">
                <label for="username">Username:</label>
                <input id="username" type="text" name="username" value="">
                <label for="password">Password:</label>
                <input id="password" type="password" name="password">
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    <?php include 'templates/footer.php'; ?>
</body>
</html>