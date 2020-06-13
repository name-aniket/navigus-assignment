<?php

    header('Access-Control-Allow-Origin: *');
    
    session_start();

    require_once '../../config/database.php';

    $email = $_SESSION['user_detail']['username'];

    $stmt = mysqli_prepare($link, "SELECT firstname, lastname, avatar, email From User Where email = ?");

    mysqli_stmt_bind_param($stmt, 's', $email);

    if (mysqli_stmt_execute($stmt)) {
        
        $row = mysqli_fetch_array(mysqli_stmt_get_result($stmt));

        $response = array(
            'status'   => 200,
            'firstname'=> $row['firstname'],
            'lastname' => $row['lastname'],
            'avatar'   => $row['avatar'],
            'email'    => $row['email']  
        );

    } else{

        $response = array(
            'status'   => 401,
            'message'  => 'Somethings went wrong.' 
        );

    }

    echo json_encode($response);
?>