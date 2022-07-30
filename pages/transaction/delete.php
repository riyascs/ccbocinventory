<?php
include'../../includes/connection.php';

$id=$_GET['id'];
			
			
              
	   $sql = "DELETE FROM transactionproduct WHERE trasID = $id";       
	   $sql2 = "DELETE FROM transaction WHERE id = $id";
		//echo $sql;
if (mysqli_query($db, $sql)) {
		mysqli_query($db,$sql2)or die ('Error in updating product in Database '.$sql2);
	 
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
            ?>
              <script type="text/javascript">
			  window.location = "index.php";
			  </script>
