<?php
include('../includes/connection.php');
			$prod_ctgry_id = $_POST['prod_ctgry_id'];
			$prodncategoryname = $_POST['prodncategoryname'];
			
		
	 			$query = 'UPDATE prod_ctgry set prod_ctgry_name="'.$prodncategoryname.'" WHERE
                 prod_ctgry_id ="'.$prod_ctgry_id.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));

							
?>	
	<script type="text/javascript">
			alert("You've Update Product Successfully.");
			window.location = "pro_add_category.php";
		</script>