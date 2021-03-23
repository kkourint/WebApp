<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kourintchoute-Lab 6</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="container">
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
    <!-- add code for the table here -->

    <table class="table-striped table table-bordered w-auto">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Action</th>

        </tr>
        <?php foreach ($categories as $category): ?>

        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="delete_category.php" method="post">
                    <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" class="btn btn-secondary" value="Delete"
                      aria-label="Delete <?php echo $category['categoryName']; ?>">


                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Category</h2>
    
    <!-- add code for the form here -->
    <form action="add_category.php" method="post">
        <label for="category-name">Name:</label>
        <input type="text" id="category-name" name="category-name" class="form-control-sm" autofocus>
        <input type="submit" class="btn btn-secondary" value="Add Category">

    </form>

    <br>
    <p><a href="index.php">List Products</a></p>
    </main>
    <footer>
    </footer>
</div>
</body>
</html>