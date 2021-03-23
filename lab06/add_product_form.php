<?php
require('database.php');
$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kourintchoute-Lab 6</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<div class="container">
    <header><h1>Product Manager</h1></header>
    <main class="col-lg-6 mx-auto">
        <h1>Add Product</h1>
        <form action="add_product.php" method="post">
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" class="form-control">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label for="code">Code:</label>
            <input type="text" id="code" name="code" class="form-control"><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control"><br>
            <label for="price">List Price:</label>
            <input type="text" id="price" name="price" class="form-control"><br>
            <input type="submit" class="btn btn-secondary" value="Add Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>
    <footer>
    </footer>
</div>
</body>
</html>