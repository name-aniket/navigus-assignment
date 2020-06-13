<?php

    require_once '../../config/database.php';

    $stmt = mysqli_prepare($link, "SELECT firstname, lastname, last_viewed FROM User WHERE view_permission = 'Y'");

    if (mysqli_stmt_execute($stmt)) {
        
        $records = array();

        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_array($result)) {
    
            $record = array(
                'firstname'     => $row['firstname'],
                'lastname'      => $row['lastname'],
                'last_viewed'   => $row['last_viewed']
            );

            array_push($records, $record);
        }

        /**
         * Database error.
         */
        $response = array(
            'status' => 200,
            'data'   => $records,
            'message'=> 'Get the list'
        );

    } else {
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