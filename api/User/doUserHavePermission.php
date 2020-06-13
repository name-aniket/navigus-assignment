<?php
    session_start();

    require_once '../../config/database.php';

    $email = $_SESSION['user_detail']['username'];

    $stmt = mysqli_prepare($link, "SELECT view_permission FROM User WHERE email = ?");

    mysqli_stmt_bind_param($stmt, 's', $email);

    if (mysqli_stmt_execute($stmt)) {
        
        $row = mysqli_fetch_array(mysqli_stmt_get_result($stmt));

        if ($row['view_permission'] === 'Y'){
            
            $response = array(
                'status' => 200,
                'message'=> 'Has required permission'
            );

        }else{
            /**
            * Database error.
            */
            $response = array(
                'status' => 401,
                'message'=> 'You do not have permission to access this resource !'
            );
        }

    }else{
        /**
         * Database error.
         */
        $response = array(
            'status' => 401,
            'message'=> 'Something went wrong. Please try again alter !'
        );
    }

    echo json_encode($response);
?>