<?php 

require_once '../load.php';
confirm_logged_in();

if(isset($_POST['submit'])) {
    $data = array(
        'fname'=>trim($_POST['fname']),
        'uname'=>trim($_POST['uname']),
        'email'=>trim($_POST['email'])

    );

    $message = createUser($data);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New User</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/hps2ffl.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <h1>Create a new user</h1>
    <section>
            <?php echo !empty($message)?$message:'';?>
            <form class="form" action="admin_createuser.php" method="post">
                <div>
                    <label id="fname" for="first_name">First Name:</label>
                    <input id="first_name" type="text" name="fname" value="">
                </div>
                <div>
                    <label id="uname" for="username">Username:</label>
                    <input id="username" type="text" name="uname" value="">
                </div>
              <!--  <div>
                    <label for="password">Passowrd:</label>
                    <input id="password" type="text" name="pword" value=""> NOTE: change type to password 
                </div>  -->
                <div>
                    <label id="email" for="email">Email:</label>
                    <input type="email" name="email" value="">
                </div>
                <p>Note: password will be automatically generated and shared to user via email</p>
                <button type="submit" name="submit" id="submit">Create User</button>
            </form>
    </section>
</body>
</html>