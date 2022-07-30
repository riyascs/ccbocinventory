<?php

	//1. Collect Parameter
	$id = $_GET["deleteid"];
	
	//3. DB Connection
	include'../includes/connection.php';
	
	//4. Create the SQL Statement
	$sql  = "DELETE FROM product_category_table WHERE prod_ctgry_id='$id'";
	
	//5. Excecute Statement
	if(mysqli_query($db, $sql)){
    ?>
		 <script type="text/javascript">alert("Category is Successfully Deleted.");window.location = "prod_category_add.php";</script>";
    <?php
	}else{
        echo "Error in updating product in Database: " . $sql . "<br>" . mysqli_error($db);
	}
	
?>