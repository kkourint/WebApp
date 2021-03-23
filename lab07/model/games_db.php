<?php
function getAllGames(){
    global $db;
    global $error;
    $query='SELECT*FROM games ORDER BY Opponent';
    $statement=$db->prepare($query);
    $statement->execute();
    $games=$statement->fetchAll();
    $statement->closeCursor();
    if ($statement->errorCode() !== 0 && empty($games)){
        $sqlError=$statement->errorInfor();
        $sqlError='SELECT error &rarr; The games were not retrieved decause: ' .$sqlError[2];

    }
    return $games;
}