<?php
//getting the category name
$categoryName = filter_input(INPUT_POST, 'category-name');

if (empty($categoryName)){
    $error= "Invalid category name. Please enter a name and try again.";
    include 'error.php';

}
else{
    require_once 'database.php';

    //adding category to the database
    $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue('categoryName', $categoryName);
    $statement->execute();
    $statement->closeCursor();
    include 'category_list.php';
}
