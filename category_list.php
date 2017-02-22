<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
 <?php foreach ($products as $product) : ?>
     <tr>
           <td><?php echo $product['productCode']; ?></td>
	         <td><?php echo $product['productName']; ?></td>
		       <td class="right"><?php echo $product['listPrice'];
		       ?></td>
		             <td><form action="delete_product.php"
			     method="post">
			             <input type="hidden" name="product_id"
				               value="<?php echo
					       $product['productID']; ?>">
					               <input type="hidden"
						       name="category_id"
						                 value="<?php
								 echo
								 $product['categoryID'];
								 ?>">
								         <input
									 type="submit"
									 value="Delete">
									       </form></td>
									           </tr>
										       <?php
										       endforeach;
										       ?>

?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>Product Manager</h1></header>
<main>
dy>
<header><h1>Product Manager</h1></header>
<main>
    <h1>Category List</h1>
        <table>
	        <tr>
		            <th>Name</th>
			                <th>&nbsp;</th>
					        </tr>        
						                <tr>
								            <td>Guitars</td>
									                <td>
											                <form
													action="delete_category.php"
													method="post">
													                    <input
															    type="hidden"
															    name="category_id"
															                               value="1"/>
																		                           <input
																					   type="submit"
																					   value="Delete"/>
																					                   </form>
																							               </td>
																								               </tr>
																									                       <tr>
																											                   <td>Basses</td>
																													               <td>
																														                       <form
																																       action="delete_category.php"
																																       method="post">
																																                           <input
																																			   type="hidden"
																																			   name="category_id"
																																			                              value="2"/>
																																						                          <input
																																									  type="submit"
																																									  value="Delete"/>
																																									                  </form>
																																											              </td>
																																												              </tr>
																																													                      <tr>
																																															                  <td>Drums</td>
																																																	              <td>
																																																		                      <form
																																																				      action="delete_category.php"
																																																				      method="post">
																																																				                          <input
																																																							  type="hidden"
																																																							  name="category_id"
																																																							                             value="13"/>
																																																										                         <input
																																																													 type="submit"
																																																													 value="Delete"/>
																																																													                 </form>
																																																															             </td>
																																																																             </tr>
																																																																	                 
																																																																			     </table>

																																																																			         <h2
																																																																				 class="margin_top_increase">Add
																																																																				 Category</h2>
																																																																				     <form
																																																																				     action="add_category.php"
																																																																				     method="post"
																																																																				               id="add_category_form">

																																																																					               <label>Name:</label>
																																																																						               <input
																																																																							       type="text"
																																																																							       name="name"
																																																																							       />
																																																																							               <input
																																																																								       id="add_category_button"
																																																																								       type="submit"
																																																																								       value="Add"/>
																																																																								           </form>
																																																																									       
																																																																									           <p><a
																																																																										   href="index.php">List
																																																																										   Products</a></p>

<body>
    <header><h1>Product Manager</h1></header>

        <main>
	        <h1>Add Product</h1>
		        <form action="add_product.php" method="post"
			              id="add_product_form">

				                  <label>Category:</label>
						              <select
							      name="category_id">
							                  <?php
									  foreach
									  ($categories
									  as
									  $category)
									  :
									  ?>
									                  <option
											  value="<?php
											  echo
											  $category['categoryID'];
											  ?>">
											                      <?php
													      echo
													      $category['categoryName'];
													      ?>
													                      </option>
															                  <?php
																	  endforeach;
																	  ?>
																	              </select><br>

																		                  <label>Code:</label>
																				              <input
																					      type="text"
																					      name="code"><br>

																					                  <label>Name:</label>
																							              <input
																								      type="text"
																								      name="name"><br>
																								      <label>List
																								      Price:</label>
																								                  <input
																										  type="text"
																										  name="price"><br>

																										              <label>&nbsp;</label>
																											                  <input
																													  type="submit"
																													  value="Add
																													  Product"><br>
																													          </form>


    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>
