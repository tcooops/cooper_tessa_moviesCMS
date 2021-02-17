<?php
function createUser($user_data) {
    ##Testing only, remove it later
    //return var_export($user_data, true);

    ## 1. Run the proper sql query to insert user
    $pdo = Database::getInstance()->getConnection();

    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_name, user_pass, user_email)';
    $create_user_query .= ' VALUES(:fname, :username, :password, :email)';

    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array( // this tells the placeholders where to grab their info. This will be a SAFE bet. Protects code from sql injection
            ':fname'=>$user_data['fname'],
            ':username'=>$user_data['uname'],
            ':password'=>$user_data['pword'],
            ':email'=>$user_data['email'],
        )
    );

    ## 2. Redirect to index.php if user has been created successfully (maybe with a message?, otherwise show error message)

    if($create_user_result){
        redirect_to('index.php');
    }else {
        return 'The user was not created';
    }

}