<?php include 'header.php'; ?>
<table class="table table-hover">
    <caption><h1>Game List</h1></caption>
    <thead>
    <tr>
        <th scope="col">Opponent</th>
        <th scope="col">Number of Goals</th>
        <th scope="col">Number of Spectators</th>
        <th scope="col">Location of the Game</th>
        <th scope="col">Type of Game</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($games as $game) : ?>
    <tr>
        <td><?php echo $game['Opponent']; ?></td>
        <td><?php echo $game['Goals']; ?></td>
        <td><?php echo $game['Spectators']; ?></td>
        <td><?php echo $game['Location']; ?></td>
        <td><?php echo $game['GameType']; ?></td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="show-update-game">
                <input type="hidden" name="ID" value="<?php echo $game['ID']; ?>">
                <input type="submit" class="btn btn-secondary" value="Update" aria-label="Update <?php echo $game['Opponent'];?>">

            </form>
        </td>
        <td>
            <form action="." method="post">
                <input type="hidden" name="action" value="delete-game">
                <input type="hidden" name="ID" value="<?php echo $game['ID']; ?>">
                <input type="submit" class="btn btn-secondary" value="Delete" aria-label="Delete <?php echo $game['Opponent'];?>">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php include 'footer.php';?>