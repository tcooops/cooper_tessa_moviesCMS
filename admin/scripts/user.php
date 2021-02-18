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
        return 'A new user has been created. You will be redirected in 5 seconds';
    }else {
        return 'The user was not created';
    }

    // Now send out the email with the user's information letting them know their account has been created. This code is from our form build last semester and has been altered accordingly

    $results = [];
    $user_fname = '';
    $user_uname = '';
    $user_email = '';
    $user_password = '';
    
    if (isset($_POST['fname']) && $_POST['fname'] !='') {
        $user_fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
    } else {
        $results['message'] = 'Please make sure you leave your name!';
        echo json_encode($results);
        exit;
    }
    
    if (isset($_POST['uname']) && $_POST['uname'] !='') {
        $user_uname = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);
    } else{
        $results['message'] = 'Username has been left blank';
        echo json_encode($results);
        exit;
    }
    
    if (isset($_POST['email']) && $_POST['email'] !='') {
        $user_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    }else{
        $results['message'] = 'email is blank';
        echo json_encode($results);
        exit;
    }
    
    if (isset($_POST['pword']) && $_POST['pword'] !='') { 
        $user_password = filter_var($_POST['pword'], FILTER_SANITIZE_STRING); 
    }else{
        $results['message'] = 'Password has not been selected';
        echo json_encode($results);
        exit;
    }
    
    
    $results['fname'] = $user_fname;
    $results['pword'] = $user_password;
    
    
    $email_subject = sprintf('Hello %s! Your account has been created', $user_fname);
    
    $email_recipient = sprintf('%s', $user_email); // this is your TO email
    $email_message = sprintf('Hello %s! Your login credentials are as follows: <br> Email: %s, Username: %s, Password: %s', $user_fname, $user_email, $user_uname, $user_password);
    
    $email_headers = array(
        'From'=>'noreply@tbccreative.ca',
    );
    
    
    $email_result = mail($email_recipient, $email_subject, $email_message, $email_headers);
    
    // spit out in json
    
    echo json_encode($results);



}