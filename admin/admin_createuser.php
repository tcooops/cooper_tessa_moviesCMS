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
        <div id="create-user-form">
            <?php echo !empty($message)?$message:'';?>
            <form action="admin_createuser.php" method="post">
                <div>
                    <label for="first_name">First Name:</label>
                    <input id="first_name" type="text" name="fname" value="">
                </div>
                <div>
                    <label for="username">Username:</label>
                    <input id="username" type="text" name="uname" value="">
                </div>
              <!--  <div>
                    <label for="password">Passowrd:</label>
                    <input id="password" type="text" name="pword" value=""> NOTE: change type to password 
                </div>  -->
                <div>
                    <label for="email">Email:</label>
                    <input id="email" type="email" name="email" value="">
                </div>
                <button type="submit" name="submit" id="submit">Create User</button>
            </form>
        </div>
    </section>
</body>
</html>