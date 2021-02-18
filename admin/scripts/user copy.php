<?php
function createUser($user_data) {
    ##Testing only, remove it later
    //return var_export($user_data, true);

    ## 1. Run the proper sql query to insert user
    $pdo = Database::getInstance()->getConnection();

    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email)';
    $create_user_query .= ' VALUES(:fname, :username, :password, :email)';


    // this is how we generate a random password for our users
    $user_password = rand(100000,999999);
    $user_encrypted_password = password_hash($user_password, PASSWORD_DEFAULT); // This is how we ENCRYPT the password with the password_hash and default encryption. This is what will be displayed in our database instead of the user's actual password.

    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array( // this tells the placeholders where to grab their info. This will be a SAFE bet. Protects code from sql injection
            ':fname'=>$user_data['fname'],
            ':username'=>$user_data['uname'],
            ':password'  => $user_encrypted_password, // this is what will send the encrypted password
            ':email'=>$user_data['email'],
        )
    );

    ## 2. Redirect to index.php if user has been created successfully (maybe with a message?, otherwise show error message)

    if($create_user_result){
        header( "refresh:5;url=../admin/index.php" );
        return 'Your password is '.$user_password;
        // return ' <p class="success">The user has been created. You will be redirected in 5 seconds</p>';
    }else {
        return 'The user was not created';
    }

}