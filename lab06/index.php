<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
}
// Get name for selected category
if ($category_id == NULL || $category_id == FALSE) {
    $category_name = 'All Categories';
} else {
    $queryCategory = 'SELECT * FROM categories WHERE categoryID = :category_id';
    $statement1 = $db->prepare($queryCategory);
    $statement1->bindValue(':category_id', $category_id);
    $statement1->execute();
    $category = $statement1->fetch();
    $category_name = $category['categoryName'];
    $statement1->closeCursor();
}

// Get all categories
$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

// Get products for selected category
if ($category_id == NULL || $category_id == FALSE) {
    $queryProducts = 'SELECT * FROM products ORDER BY productID';
    $statement3 = $db->prepare($queryProducts);
}
else {
    $queryProducts = 'SELECT * FROM products WHERE categoryID = :category_id ORDER BY productID';
    $statement3 = $db->prepare($queryProducts);
    $statement3->bindValue(':category_id', $category_id);
}
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
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
        <h1>Product List</h1>
        <aside>
            <h2>Categories</h2>
            <nav>
                <ul>
                    <li><a href=".">All Categories</a></li>
                    <?php foreach ($categories as $category) : ?>
                        <li><a href=".?category_id=<?php echo $category['categoryID']; ?>">
                                <?php echo $category['categoryName']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </aside>
        <section>
            <h2><?php echo $category_name; ?></h2>
            <table class="table table-striped table-bordered">
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product['productCode']; ?></td>
                        <td><?php echo $product['productName']; ?></td>
                        <td class="right"><?php echo $product['listPrice']; ?></td>
                        <td>
                            <form action="delete_product.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                                <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>">
                                <input type="submit" class="btn btn-secondary" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p><a href="add_product_form.php">Add Product</a></p>
            <p><a href="category_list.php">List Categories</a></p>
        </section>
    </main>
    <footer>
    </footer>
</div>
</body>
</html>