<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
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

            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction <a  href="transaction/one.php" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			  <!--
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Transaction Number</th>
                     <th>Customer</th>
                     <th width="13%"># of Items</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT *, FIRST_NAME, LAST_NAME
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              ORDER BY TRANS_D_ID ASC';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'. $row['FIRST_NAME'].' '. $row['LAST_NAME'].'</td>';
                echo '<td>'. $row['NUMOFITEMS'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="trans_view.php?action=edit & id='.$row['TRANS_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
							-->
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>
<!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="tranAdd.php?action=add">
           <div class="form-group">
             <label>Transaction ID</label>
			 <input class="form-control" placeholder="Transaction ID" name="transId" required>
           </div>
		   <div class="form-group">
             <label>Description</label>
			 <textarea class="form-control" placeholder="Transaction ID" name="des" required></textarea>
           </div>
		   
		   <div class="form-group">
			<label>Division</label>
			<select name="division" id="division" class="form-control" required>
				<option value="" >Select Division</option>
				<?php
				$row = getDivisions();
				foreach($row as $divi){
					//print_r($divi);
				echo '<option value="'.$divi[0].'" >'.$divi[1].'</option>';	
				}
				?>
				
			</select>
		   </div>
		   <div class="form-group">
			<label>Products</label>
             <a  id="productAddTra" href="#" type="button" class="btn btn-dark bg-gradient-dark" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
           </div>
           
           
		   <div class="form-group">
             <div id="productAddTraResult" ></div>
           </div>
           
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>
  <div class="form-group" id="productAddTra2"> </div>
  <script>
  var i =0;
  $( "#productAddTra" ).click(function() {
	//$("#productAddTraResult").apend("test")
	i++;
	var conHtml = '<p>Product '+i+'</p>';
	conHtml += '<div class="form-group" class="productAddTra1">';
	conHtml += ' <select name="traProduct['+i+']"   class="form-control" required>';
	conHtml += '<option value="" >Select Product</option>';
	<?php
		$row = getProducts();
		foreach($row as $produ){
		$proName =mysqli_real_escape_string($db,$produ[2]);			//print_r($divi);
	?>
	conHtml += '<option value="<?php echo $produ[0] ?>" ><?php echo $produ[1]." - ".$proName ?></option>';	
	<?php
		}
	?>
	conHtml += '</select>';
	conHtml += '<input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity['+i+']" required>';
	
    conHtml += ' </div>';
	
	$(  conHtml).appendTo( "#productAddTraResult" );
	});
  </script>