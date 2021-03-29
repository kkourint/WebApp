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
function updateGame($id, $Opponent, $Goals, $Spectators, $Location, $GameType){
    global $db;
    global $error, $successMessage;
    $query = 'UPDATE games
                SET ID= :Game_id,
                Opponent= :Opponent,
                Goals= :Goals,
                Spectators=:Spectators,
                Location= :Location,
                GameType=:GameType
             WHERE ID = :Game_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':Game_id', $id, PDO::PARAM_INT);
    $statement->bindValue(':$Opponent', $Opponent);
    $statement->bindValue(':$Goals', $Goals);
    $statement->bindValue(':$Spectators', $Spectators);
    $statement->bindValue(':$Location', $Location);
    $statement->bindValue(':$GameType', $GameType);
    $statement = $statement->closeCursor();
    $statement->closeCursor();
    if ($statement->errorCode() !==0 && $success ===false){
        $sqlError->$statement->errorInfor();
        $error = 'UPDATE error &rarr; The game <strong>' . '</strong> was not updated because: ' . $sqlError[2];
    }else{
        $successMessage = 'The game <strong>' . $Opponent . '</strong> was successfully updated.';
    }
}
function deleteGame($id, $Opponent){
    global $db;
    global $error, $successMessage;
    $query = 'DELETE FROM games WHERE ID = :Game_id';
    $statement = $db->prepare($query);
    $statement ->bindValue(':Game_id', $id, POD::PARAM_INT);
    $success = $statement->execute();
    $statement->closeCursor();
    if ($statement->errorCode() !== 0 && $success === false) {
        $sqlError = $statement->errorInfo();
        $error = 'DELETE error &rarr; The game <strong>' . $Opponent . '</strong> was successfully deleted.';

    }else{
        $successMessage = 'The game <strong>' . $Opponent . '</strong> was successfully deleted';

    }
}
