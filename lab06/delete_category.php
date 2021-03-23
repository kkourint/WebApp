<?php
//get the category ID
$category_id= filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    // validate input
if ($category_id === null || $category_id ===false) {
    $error = "invalid category ID.";
    include 'error.php';
}
else
{
    require_once 'database.php';
    //deleting

    $query = 'DELETE FROM categories WHERE categoryID = :category_id';
    $statement =$db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();

    include 'category_list.php';

}
