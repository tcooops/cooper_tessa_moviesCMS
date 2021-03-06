<!-- ADMIN LOGIN PAGE -->

<?php
    require_once '../load.php';
    $ip = $_SERVER['REMOTE_ADDR'];

    if (isset($_SESSION['user_id'])) {
        redirect_to("index.php"); // prevents someone who is logged in from accessing log in page. redirects them to index.php.
    }
    
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/hps2ffl.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>  
    <h1>Admin Panel</h1>
            <?php echo !empty($message)?$message:'';?>
                <form class="form" action="admin_login.php" method="post">
                    <label for="username">Username:</label>
                    <input id="username" type="text" name="username" value="">
                    <label for="password">Password:</label>
                    <input id="password" type="password" name="password">
                    <button type="submit" name="submit">Submit</button>
                    <br>
                    <a href="../index.php">back to home</a>
                </form>
</body>
</html>