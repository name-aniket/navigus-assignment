<?php
    session_start();

    require_once '../../config/database.php';

    $email = $_SESSION['user_detail']['username'];

    $query = "UPDATE User SET status = 'Not viewing' WHERE email = ?";

    $stmt = mysqli_prepare($link, $query);

    mysqli_stmt_bind_param($stmt, 's', $email);

    if (mysqli_stmt_execute($stmt))
        unset($_SESSION['user_detail']);

    echo json_encode(array(
        'status'  => 200
    ));
?>