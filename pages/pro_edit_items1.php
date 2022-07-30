<?php
include('../includes/connection.php');
            $prod_item_id = $_POST['prod_item_id'];
			$category_namme = $_POST['category_namme'];
			$prod_item_name = $_POST['prod_item_name'];
            $product_item_code = $_POST['product_item_code'];
	
	 			$query = 'UPDATE prod_items set prod_ctgry_id="'.$category_namme.'",prod_item_name="'.$prod_item_name.'",product_item_code="'.$product_item_code.'" WHERE
                 prod_item_id ="'.$prod_item_id.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	    <script type="text/javascript">
			alert("You've Update Product Successfully.");
			window.location = "pro_add_item.php";
		</script>