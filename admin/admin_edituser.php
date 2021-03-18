<?php 

require_once '../load.php';
confirm_logged_in();

$id = $_SESSION['user_id'];
$current_user = getSingleUser($id);

if(empty($current_user)){
    $message = 'Oops! Failed to get user information';
}

if(isset($_POST['submit'])){
    $data = array(
        'fname'=>trim($_POST['fname']),
        'uname'=>trim($_POST['uname']),
        'pword'=>trim($_POST['pword']),
        'email'=>trim($_POST['email']),
        'id'=> $id,

    );

    $message = editUser($data);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/hps2ffl.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <h1>Edit User Profile</h1>
    <div class="edit-profile-con">
        <?php echo !empty($message)?$message:'';?>
        <?php if (!empty($current_user)):?>
            <form class="form" action="admin_edituser.php" method="post">
            <?php while($user_info = $current_user->fetch(PDO::FETCH_ASSOC)):?>
                <div>
                    <label id="fname" for="first_name">First Name:</label>
                    <input id="first_name" type="text" name="fname" value="<?php echo $user_info['user_fname']; ?>">
                </div>
                <div>
                    <label id="uname" for="username">Username:</label>
                    <input id="username" type="text" name="uname" value="<?php echo $user_info['user_name']; ?>">
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input id="password" type="text" name="pword" value="<?php echo $user_info['user_pass']; ?>"> 
                </div>
                <div>
                    <label id="email" for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $user_info['user_email']; ?>">
                </div> 
                <button type="submit" name="submit" id="submit">Update Profile</button>
                <?php endwhile;?>
            </form>
        <?php endif;?>
    </div>
</body>
</html>