<?php
include'../../includes/connection.php';
include'../../includes/sidebar.php';
$Aa = getUserType();
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }  
$id=$_GET['id'];
$row = getTransaction($id);  

            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction </h4></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
<div class="" id="" >
    <div class="modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Transaction</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="addAction.php">
           <div class="form-group">
             <label>Transaction ID</label>
			 <span class="control-value text-primary"><?php echo $row['transactionID'] ?></span>
           </div>
		   <div class="form-group">
             <label>Description</label>
			 <span class="control-value text-primary"><?php echo $row['description'] ?></span>
           </div>
		   
		   <div class="form-group">
			<label>Division</label>
			<span class="control-value text-primary"><?php echo $row['code'] ?></span>
		   </div>
		   <div class="form-group">
			<label>Status</label>
			<span class="control-value text-primary"><?php echo $row['status'] ?></span>
		   </div>
		   <div class="form-group">
			<label>View Products</label>
             
			 
			 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Name</th>
                     <th>Quantity</th>
                     
                   </tr>
               </thead>
          <tbody>
		  <?php
		  $rows =getTransactionProduct($row['id']);
		  if($rows)
		  foreach($rows as $prod){
		  echo '<tr>';
		  //print_r($prod);
		  echo '<td>'. $prod['product_name'].'</td>';
		  echo '<td>'. $prod['qty'].'</td>';
		  echo '</tr>';
		  }
		  ?>
		  </tbody>
		  
		  </table>
           </div>
           
           
		   <div class="form-group">
             <div id="productAddTraResult" ></div>
           </div>
           
            
            
          </form>  
        </div>
      </div>
    </div>
  </div>
  
                        </div>
                    </div>
                  </div>

<?php
include'../../includes/footer.php';
?>