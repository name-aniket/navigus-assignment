<?php

    session_start();

    require_once '../../config/database.php';

    if ($_SESSION['user_detail']['view_permission'] === 'Y') {
        /**
         * Add user to the temporary table.
         * If user already in the table then update the timestamp.
         * Otherwise insert into the tables.
         */

        /**
         * Find whether user already viewing the doc.
         */
        $stmt = mysqli_prepare($link, "SELECT username FROM userViewLog WHERE username = ?");

        mysqli_stmt_bind_param($stmt, 's', $_SESSION['user_detail']['username']);

        mysqli_stmt_execute($stmt);

        $row = mysqli_fetch_array(mysqli_stmt_get_result($stmt));

        if ($row === null) {
            
            $query = "INSERT INTO userViewLog values(?,now(),?,?, ?)";

            $stmt = mysqli_prepare($link, $query);

            $username = $_SESSION['user_detail']['username'];
            $name = $_SESSION['user_detail']['name'];
            $avatar = $_SESSION['user_detail']['avatar'];
            $status = 'View';
            
            mysqli_stmt_bind_param($stmt, 'ssss', $username, $name, $avatar, $status);
            
            mysqli_stmt_execute($stmt);

        } else {
            
            $query = "UPDATE userViewLog set last_viewed = now(), status = 'View' WHERE username = ?";

            $stmt = mysqli_prepare($link, $query);

            $username = $_SESSION['user_detail']['username'];

            mysqli_stmt_bind_param($stmt, 's', $username);

            mysqli_stmt_execute($stmt);
        }

        $response = array(
            'status' => 200,
            'message'=> 'Has required permission'
        );

    } else {
        $response = array(
            'status' => 401,
            'message'=> 'You do not have permission to access this resource!'
        );
    }

    echo json_encode($response);
?>