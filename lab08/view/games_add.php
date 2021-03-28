<?php include 'header.php';?>
<h1 class="text-center">Add Game</h1>
<form action="." method="post" class="col-lg-6 mx-auto">
    <hr>
    <div class="form-group">
        <label for="opponent">Opponent</label>
        <input type="text" class="form-control" name="opponent" id="opponent" placeholder="Opponent"
               value="<?php if (!is_null($Opponent)) echo $Opponent; ?>" autofocus>

    </div>
    <div class="form-group">
        <label for="number-goals"> Number of Goals</label>
        <input type="text" class="form-control" name="number-goals" id="number-goals" placeholder="Number of Goals"
               value="<?php if (!is_null($Goals)) echo $Goals; ?>"
    </div>


    <div class="form-group">
        <label for="number-spectators"> Number of Spectators</label>
        <input type="text" class="form-control" name="number-spectators" id="number-spectators" placeholder="Number of Spectators"
               value="<?php if (!is_null($Spectators)) echo $Spectators; ?>"
    </div>

    <div class="form-group">
        <label for="game-location"> Location of the Game</label>
        <input type="text" class="form-control" name="game-location" id="game-location" placeholder="Location of the Game"
               value="<?php if (!is_null($Location)) echo $Location; ?>"
    </div>

    <div class="form-group">
        <label for="game-type"> Type of Game</label>
        <select class="custom-select" name="game-type" id="game-type" >
            <option value="choose">Specify the type of Game</option>
            <option value="Friendly"<?php if ($GameType==='Friendly') echo 'selected' ; ?>>Friendly</option>
            <option value="Official"<?php if ($GameType==='Official') echo 'selected' ; ?>>Official</option>
            <option value="Training"<?php if ($GameType==='Training') echo 'selected' ; ?>>Training</option>
        </select>

        <div class="form-group text-center">
            <input type="hidden" name="action" value="add-game">
            <input type="submit" class="btn btn-secondary" value="Add Game">
            <a href="." class="btn btn-secondary">Cancel</a>
        </div>
</form>
<?php include 'footer.php'; ?>
