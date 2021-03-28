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
function addGame($Opponent, $Goals, $Spectators, $Location, $GameType){
    global $db;
    global $error, $successMessage;
    $query= 'INSERT INTO games 
               (Opponent, Goals, Spectators, Location, GameType) 
            VALUE
                (:Opponent, :Goals, :Spectators, :Location, :GameType)';
    $statement = $db->prepare($query);
    $statement ->bindValue(':Opponent', $Opponent);
    $statement ->bindValue(':Goals', $Goals);
    $statement ->bindValue(':Spectators', $Spectators);
    $statement ->bindValue(':Location', $Location);
    $statement ->bindValue(':GameType', $GameType);
    $success =$statement->execute();
    $statement->closeCursor();
    if ($statement->errorCode() !==0 && $success===False){
        $sqlError= $statement->errorInfo();
        $error='INSERT error &rarr; The game <strong>' . $Opponent . '</strong> was not added because: ' . $sqlError[2];

    }else{
        $successMessage='The game <strong>'. $Opponent .'</strong> was successfully added to the database. ';
    }
}

function getGameInfo($id){
    global $db;
    global $error;
    $query = 'SELECT * FROM games WHERE ID = :Game_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':Gme_id', $id, PDO::PARAM_INT);
    $statement->execute();
    $game = $statement->fetch();
    $statement->closeCursor();
        if ($statement->errorCode() !==0 && empty($game)){
            $sqlError = $statement->errorInfo();
            $error = 'SELECT error &rarr; The movie with the ID <strong>' . $id . '</strong> was not retrieved because: '.$sqlError[2];

        }
        return $game;
}
