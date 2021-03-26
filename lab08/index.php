<?php
require 'model/database.php';
require 'model/games_db.php';

if (!empty($_POST)){
    $_POST=array_map('trim',$_POST);
}
if (isset($_POST['action'])){
    $action=filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
}
elseif (isset($_GET['action'])){
    $action=filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
else{
    $action='list-games';
}

if ($action==='list-games'){
    $games=getAllGames();
    $Opponent='List Games';
    include 'view/games_list.php';
}
else{
    $error="The <strong>$action</strong> action was not handled in the code.";
    $games=getAllGames();
    include 'view/games_list.php';

}
