<?php
    header('Access-Control-Allow-Origin: *');
    
    session_start();

    require_once '../../config/database.php';
        /**
         * Remove user from the temporary table.
         * If user already in the table then remove.
         * Otherwise do nothing.
         */

        /**
         * Find whether user already viewing the doc.
         */
        $stmt = mysqli_prepare($link, "SELECT username FROM userViewLog WHERE username = ?");

        mysqli_stmt_bind_param($stmt, 's', $_SESSION['user_detail']['username']);

        mysqli_stmt_execute($stmt);

        $row = mysqli_fetch_array(mysqli_stmt_get_result($stmt));

        if ($row != null) {

            $query = "UPDATE userViewLog set status = 'No View' WHERE username = ?";
            
            $stmt = mysqli_prepare($link, $query);

            mysqli_stmt_bind_param($stmt, 's', $_SESSION['user_detail']['username']);

            mysqli_stmt_execute($stmt);
        }
?>