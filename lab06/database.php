<?php
    $dsn = 'mysql:host=localhost;dbname=webdsuco_kkourint1';
    $username = 'webdsuco_kkourint1';
    $password = 'webdsuco_kkourint1';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>