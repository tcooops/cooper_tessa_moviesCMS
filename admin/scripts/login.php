<?php
function login($username, $password, $ip){
    $pdo = Database::getInstance()->getConnection();
    $get_user_query = 'SELECT * FROM tbl_user WHERE user_name = :username AND user_pass=:password';
    $user_set = $pdo->prepare($get_user_query);
    $user_set->execute(
        array(
            ':username'=>$username,
            ':password'=>$password
        )
    );

    if ($found_user = $user_set->fetch(PDO::FETCH_ASSOC)) {
        //We found user in the DB, let them in!
        $found_user_id = $found_user['user_id'];

        //Write the username and user id into session
        $_SESSION['user_id'] = $found_user_id;
        $_SESSION['user_name'] = $found_user['user_fname']; // using first name but could be username
        // this adds the user_date to the session 
        $_SESSION['user_date'] = $found_user['user_date'];
        // will be adding logins here soon...

        // 1) Here, I added the user_date to our query. I called on it in our admin/index.php to display. Exactly as we did with the displaying of the name. No research needed.
        $get_date_query = 'UPDATE tbl_user SET user_ip= :user_ip, user_date WHERE user_id=:user_id';
        $update_user_set = $pdo->prepare($update_user_query);
        $update_user_set->execute(
            array(
                ':user_ip'=>$ip,
                ':user_id'=>$found_user_id
            )
        );

        //Redirect user back to index.php
        redirect_to('index.php');
    } else {
        //This is invalid attempt, reject it!
        return 'Access denied. Input is invalid, please try again.';
    }
}

 function confirm_logged_in(){
    if (!isset($_SESSION['user_id'])) {
        redirect_to("admin_login.php");
    }
}

function logout(){
    session_destroy();
    redirect_to('admin_login.php');
}

