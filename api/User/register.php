<?php

    header('Access-Control-Allow-Origin: *');

    include_once '../../config/database.php';

    $username  = htmlspecialchars($_POST['username']);

    $password  = htmlspecialchars($_POST['password']);

    $firstName = htmlspecialchars($_POST['firstname']);

    $lastName  = htmlspecialchars($_POST['lastname']);

    $avatar = "avatar".rand(1,4).".jpg";

    $permission = array(
        'N','Y','Y','N','Y','Y','Y','N','Y','Y'
    );

    /**
     * Assign randomly permission of each registering user.
     */
    $view_permission = $permission[rand(0,9)];

    
    $insert_user  = "INSERT INTO User(firstname, lastname, email, avatar, view_permission) values('$firstName','$lastName','$username','$avatar', '$view_permission')";
    
    $insert_login = "INSERT INTO Login values(NULL, '$username', '$password')";

    if (mysqli_query($link, $insert_user) && mysqli_query($link, $insert_login)) {
        $response = array(
            'status'  => 200,
            'message' => 'Registered Successfully'
        );        
    }else{
        $response = array(
            'status'  => 401,
            'message' => 'Please try again'
        );
    }
    
    echo json_encode($response);
?>