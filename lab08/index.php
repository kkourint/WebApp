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

}elseif ($action==='show-add-game'){
    $Opponent='Add Game';
    include 'view/games_add.php';
}elseif ($action==='add-game') {
    $Opponent = filter_input(INPUT_POST, 'opponent', FILTER_SANITIZE_STRING);
    $Goals = filter_input(INPUT_POST, 'number-goals', FILTER_SANITIZE_NUMBER_INT);
    $Spectators = filter_input(INPUT_POST, 'number-spectators', FILTER_SANITIZE_NUMBER_INT);
    $Location = filter_input(INPUT_POST, 'game-location', FILTER_SANITIZE_STRING);
    $GameType = filter_input(INPUT_POST, 'game-type');

    if (!strlen($Opponent) || !strlen($Goals) || !strlen($Spectators) || !strlen($Location) || $GameType === 'choose') {
        $error = 'All fields in the Add form must contan data. Please ensure all form element contain appropriate values.';
        $pageTitle = 'Add Game';
        include 'view/games_add.php';
    } else {
        addGame($Opponent, $Goals, $Spectators, $Location, $GameType);
        $games = getAllGames();
        $pageTitle = 'List Games';
        include 'view/games_list.php';

    }
} elseif ($action=='show-update-game'){
    $id=filter_input(INPUT_POST, 'ID' , FILTER_SANITIZE_NUMBER_INT);
    $movie = getGameInfo($id);
    $pageTitle= 'Update Game';
    include 'view/games_update.php';
}
elseif ($action ==='update-game'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $Opponent = filter_input(INPUT_POST, 'opponent', FILTER_SANITIZE_STRING);
    $Goals = filter_input(INPUT_POST, 'number-goals', FILTER_SANITIZE_NUMBER_INT);
    $Spectators = filter_input(INPUT_POST, 'number-spectators', FILTER_SANITIZE_NUMBER_INT);
    $Location = filter_input(INPUT_POST, 'game-location', FILTER_SANITIZE_STRING);
    $GameType = filter_input(INPUT_POST, 'game-type');

    if (!strlen($Opponent) || !strlen($Goals) || !strlen($Spectators) || !strlen($Location)) {
        $error = 'All fields in the Update form must contain data. Please ensure all form element contain appropriate values.';
        $game=getGameInfo($id);
        $pageTitle = 'Update Game';
        include 'view/games_update.php';
    } else {
        updateGame($id, $Opponent, $Goals, $Spectators, $Location, $GameType);
        $games = getAllGames();
        $pageTitle ='List Movies';
        include 'view/games_list.php';
    }

}elseif ($action === 'delete-movie'){
    $id = filter_input(INPUT_POST, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $game =getGameInfo($id);
    $Opponent = $game['Opponent'];
    deleteGame($id, $Opponent);
    $games = getAllGames();
    $pageTitle= 'List Games';
}

elseif($action === 'clear=message'){
  header('Location:.');
}

/*else{
    $error="The <strong>$action</strong> action was not handled in the code.";
    $games=getAllGames();
    $pageTitle='Code Error';
    include 'view/games_list.php';

}
*/