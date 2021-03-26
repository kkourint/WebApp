<?php
function getAllGames(){
    global $db;
    //global $error;
    $query='SELECT*FROM games ORDER BY Opponent';
    $statement=$db->prepare($query);
    $statement->execute();
    $games=$statement->fetchAll();
    $statement->closeCursor();
    if ($statement->errorCode() !== 0 && empty($games)){
        $sqlError=$statement->errorInfo();
        $sqlError='SELECT error &rarr; The games were not retrieved because: ' .$sqlError[2];

    }
    return $games;
}