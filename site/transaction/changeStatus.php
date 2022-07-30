<?php
include'../../includes/connection.php';

$tID = $_POST['tid'];
$status = $_POST['status'];
			
			
              
	   $sql = "UPDATE  transactionproduct SET status =1  WHERE trasID = $tID";       
	   $sql2 = "UPDATE  transaction SET status =1  WHERE id = $tID";       
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
