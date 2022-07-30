<?php
include'../../includes/connection.php';
?>

            <?php
			//print_r($_POST);
			
			
              $tID = $_POST['transId'];
              $des = $_POST['des'];
              $divi = $_POST['division'];
			  $traProduct = $_POST['traProduct'];
			  $quantity = $_POST['quantity'];
               
        $sql = "INSERT INTO transaction (transactionID, description, site,CreateBy) VALUES ('$tID', '$des', '$divi',  {$_SESSION['MEMBER_ID']})";
		//echo $sql;
if (mysqli_query($db, $sql)) {
  $last_id = mysqli_insert_id($db);
 // echo "New record created successfully. Last inserted ID is: " . $last_id;
  
  if($traProduct){
	  
	  foreach($traProduct as $key => $onePro){
		 $sql2 = "INSERT INTO transactionproduct (trasID, site, createby,productID, qty,status) VALUES 
		 ($last_id, $divi,{$_SESSION['MEMBER_ID']},$traProduct[$key], $quantity[$key],'0')"; 
		//echo $sql2."<br>"; 
		mysqli_query($db,$sql2)or die ('Error in updating product in Database '.$sql2);
	  }
  }
  
  
  
  
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
            ?>
              <script type="text/javascript">
			  window.location = "index.php";
			  </script>
