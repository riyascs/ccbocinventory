<?php

	//1. Collect Parameter
	$id = $_GET["deleteid"];
	
	//3. DB Connection
	include'../includes/connection.php';
	
	//4. Create the SQL Statement
	$sql  = "DELETE FROM product_item_table WHERE product_id='$id'";
	
	//5. Excecute Statement
	if(mysqli_query($db, $sql)){
    ?>
		 <script type="text/javascript">alert("Product Item is Successfully Deleted.");window.location = "product.php";</script>";
    <?php
	}else{
        echo "Error in updating product in Database: " . $sql . "<br>" . mysqli_error($db);
	}
	
?>