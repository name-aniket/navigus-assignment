<?php

    header('Access-Control-Allow-Origin: *');
    
    include_once '../../config/database.php';

    $username = htmlspecialchars($_POST['username']);

    $password = htmlspecialchars($_POST['password']);


    $stmt = mysqli_prepare($link, "SELECT password,view_permission, CONCAT(firstname,' ' ,lastname) as name, avatar FROM Login L, User U WHERE username = email AND email = ?");

    mysqli_stmt_bind_param($stmt, 's', $username);

    if (mysqli_stmt_execute($stmt)) {

        $row = mysqli_fetch_array(mysqli_stmt_get_result($stmt));
        
        if ($row['password'] === $password) {
            
            /**
             * Valid User
             * Start session
             * Store username in the session.
             */
            
            session_start();

            $_SESSION['user_detail'] = array(
                'username' => $username,
                'name'     => $row['name'],
                'avatar'   => $row['avatar'],
                'view_permission'=> $row['view_permission']  
            );

            $response = array(
                'status'  => 200,
                'message' => 'Valid user'
            );

        }else {
            /**
             * Unauthorised User
             */
            $response = array(
                'status' => 401,
                'message'=> 'Incorrect username or password.'
            );
        }
        
    } else {
        /**
         * Some techinical Fault
         */
        $response = array(
            'status' => 401,
            'message'=> 'Somethings went wrong! Please try after sometime.'
        );

    }

    echo json_encode($response);
?>