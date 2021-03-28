<?php include 'header.php';?>
<h1 class="text-center">Update Game</h1>
<form action="." method="post" class="col-lg-6 mx-auto">
    <hr>
    <div class="form-group">
        <label>Game ID</label>
        <input type="text" class="form-control" name="ID" id="ID" value="<?php echo $game['ID']; ?>"> disabled>
    </div>
    <div class="form-group">
        <label for="opponent">Opponent</label>
        <input type="text" class="form-control" name="opponent" id="opponent" placeholder="Opponent"
               value="<?php echo isset($Opponent) ?$Opponent : $game['Opponent']; ?>" autofocus>

    </div>
    <div class="form-group">
        <label for="number-goals"> Number of Goals</label>
        <input type="text" class="form-control" name="number-goals" id="number-goals" placeholder="Number of Goals"
               value="<?php echo isset($Goals) ?$Goals : $game['Goals']; ?>">
    </div>


    <div class="form-group">
        <label for="number-spectators"> Number of Spectators</label>
        <input type="text" class="form-control" name="number-spectators" id="number-spectators" placeholder="Number of Spectators"
               value="<?php echo isset($Spectators) ?$Spectators : $game['Spectators']; ?>">
    </div>

    <div class="form-group">
        <label for="game-location"> Location of the Game</label>
        <input type="text" class="form-control" name="game-location" id="game-location" placeholder="Location of the Game"
               value="<?php echo isset($Location) ?$Location : $game['Location']; ?>">
    </div>

    <div class="form-group">
        <label for="game-type"> Type of Game</label>
        <select class="custom-select" name="game-type" id="game-type" >
            <option value="Friendly"<?php if ($GameType==='Friendly' || (!isset($GameType) && $game['GameType'] ==='Friendly')) echo 'selected' ; ?>>Friendly</option>
            <option value="Official"<?php if ($GameType==='Official' || (!isset($GameType) && $game['GameType'] ==='Official')) echo 'selected' ; ?>>Official</option>
            <option value="Training"<?php if ($GameType==='Training' || (!isset($GameType) && $game['GameType'] ==='Training')) echo 'selected' ; ?>>Training</option>
        </select>
    </div>

    <div class="form-group text-center">
        <input type="hidden" name="ID" value="<?php echo $game['ID']; ?>">
        <input type="hidden" name="action" value="update-game">
        <input type="submit" class="btn btn-secondary" value="Update Game">
        <a href="." class="btn btn-secondary">Cancel</a>
    </div>
</form>
<?php include 'footer.php'; ?>
