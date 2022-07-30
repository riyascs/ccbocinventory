<?php
include'../../includes/connection.php';
include'../../includes/sidebar.php';
$tid = $_GET['id'];
$row =getTransaction($tid);
            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">View Transaction </h4></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
<div class="" id="" >
    <div class="modal-" role="document">
      <div class="modal-content">
       
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
			<span class="control-value text-primary"><?php echo getStatusName($row['status']) ?></span>
		   </div>
		   <div class="form-group">
			<label><h5>View Products</h5></label>
             
			 
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