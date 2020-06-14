<?php

    session_start();

    $response = array(
        'status'   => 200,
        'name'     => $_SESSION['user_detail']['name'], 
        'avatar'   => $_SESSION['user_detail']['avatar'],
        'email'    => $_SESSION['user_detail']['username']  
    );

    echo json_encode($response);
?>