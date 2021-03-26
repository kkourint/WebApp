<?php
$dsn='mysql:host=localhost;dbname=webdsuco_kkourint1';
$username='webdsuco_kkourint1';
$password='webdsuco_kkourint1';

try{
    $db=new PDO($dsn, $username, $password);
}
catch (PDOException $se){
    $errorMessage=$e->getMessage();
    include 'view/header.php';
    echo '<h1>Database Error</h1>';
    echo '<p>' .$errorMessage . '</p>';
    include 'view/footer.php';
    exit();
}