<?php

    session_start();

    require_once '../../config/database.php';

    $query = "SELECT name, avatar FROM userViewLog WHERE status = 'View' AND username <> ?";

    $stmt = mysqli_prepare($link, $query);

    mysqli_stmt_bind_param($stmt, 's', $_SESSION['user_detail']['username']);

    if (mysqli_stmt_execute($stmt)) {

        /**
         * List user
         */
        $records = array();

        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_array($result)) {
            $record = array(
                'name'      => $row['name'],
                'avatar'    => $row['avatar']
            );
            array_push($records, $record);
        }

        $response = array(
            'status' => 200,
            'data'   => $records,
            'message'=> 'Get the list'
        );

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