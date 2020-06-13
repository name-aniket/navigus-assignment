<?php

    session_start();

    require_once '../../config/database.php';

    $email = $_SESSION['user_detail']['username'];

    $stmt = mysqli_prepare($link, "SELECT view_permission FROM User WHERE email = ?");

    mysqli_stmt_bind_param($stmt, 's', $email);

    if (mysqli_stmt_execute($stmt)) {
        
        $row = mysqli_fetch_array(mysqli_stmt_get_result($stmt));

        if ($row['view_permission'] === 'Y') {
            /**
             * User can view document
             *   
             * Update the status to Viewing
             */
            $stmt = mysqli_prepare($link, "UPDATE User SET status = 'Viewing', last_viewed = now() WHERE email = ?");

            mysqli_stmt_bind_param($stmt, 's', $email);

            if (mysqli_stmt_execute($stmt)) {
                /**
                 * Generate list of the user who are
                 * viewing the document.
                 */
                $query = "SELECT firstname, lastname, avatar FROM User WHERE status = 'Viewing' AND email <> ?";

                $stmt = mysqli_prepare($link, $query);

                mysqli_stmt_bind_param($stmt, 's', $email);

                if (mysqli_stmt_execute($stmt)) {

                    /**
                     * List user
                     */
                    $records = array();

                    $result = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_array($result)) {
                        $record = array(
                            'firstname' => $row['firstname'],
                            'lastname'  => $row['lastname'],
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
                
            }else {
                /**
                * Database error.
                */
                $response = array(
                    'status' => 401,
                    'message'=> 'Something went wrong. Please try again alter !'
                );
            }

        }else{
            /**
             * User can not view document
             */
            $response = array(
                'status' => 401,
                'message'=> 'Do not have permission to view the document'
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