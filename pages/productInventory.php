<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

$pid =$_GET['id'];

$totalStock =getTotalProductStock($pid);

$totalTransaction =getTotalProductTransaction($pid);

$totalPrduct =$totalStock - $totalTransaction ;

?>       
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Products&nbsp;Inventory</h4>
			  <label>Name: <?php echo getPrductCodeName($pid); ?></label><br>
			  <label>Quantity: <?php echo $totalPrduct; ?></label>
            </div>
			
            <div class="card-body">
			<h4 class=" font-weight-bold text-primary">Stock List</h4>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Stock Date</th>
                     <th>quantity</th>
                     <th>ACTION</th>
                   </tr>
               </thead>
          <tbody>
         
<?php                  
        $pid = $_GET['id'];
		$rows = getStockByProduct($pid);
            foreach ($rows as $row) {
                                
                echo '<tr>';
                
                echo '<td>'. $row['stocked_date'].'</td>';
                echo '<td>'. $row['quantity'].'</td>';
               
                
               
                      echo '<td align="right"> <div class="btn-group">
                          <a type="button" class="btn btn-primary bg-gradient-primary" href="stock_details.php?action=edit & id='.$row['stock_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                             </td>';
                echo '</tr> ';
                        }
?>                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
				  
		 <div class="card-body">
			<h4 class=" font-weight-bold text-primary">Transaction List</h4>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Transaction ID</th>
                     <th>Quantity</th>
					 <th>Status</th>
                     <th>ACTION</th>
                   </tr>
               </thead>
          <tbody>
		  <?php
		  $rows = getTransactionByProduct($pid);
            foreach ($rows as $row) {
                                
                echo '<tr>';
                
                echo '<td>'. $row['transactionID'].'</td>';
                echo '<td>'. $row['qty'].'</td>';
				echo '<td>'. getStatusName($row['status']).'</td>';
               
                
               
                      echo '<td align="right"> <div class="btn-group">
                          <a type="button" class="btn btn-primary bg-gradient-primary" href="transaction/view.php?action=edit & id='.$row['trasID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                             </td>';
                echo '</tr> ';
                        }
?>      
		  
		  </tbody>
		  </table>
		  </div>
		  </div>
         

<?php
include'../includes/footer.php';
?>