<?php
// Get the category data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($category_id == null || $category_id == false ||
  $code == null || $name == null || $price == null || $price == false)
{
  $error = "Invalid category data. Check all fields and try again.";
  include('error.php');
} else {
  require_once('database.php');

    // Add the product to the databases
    $query = 'INSERT INTO categories
                (categoryID, categoryCode, categoryName, listPrice)
	      VALUES
	        (:category_id, :code, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closerCursor();

    // Display the Category List page
    include('index.php');

}
?>
