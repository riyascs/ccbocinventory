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

            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction <a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
<div class="" id="" >
    <div class="modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="addAction.php">
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
			<label>Add Products</label>
             <a  id="productAddTra"  type="button" class="btn btn-dark bg-gradient-dark" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
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
  
                        </div>
                    </div>
                  </div>

<?php
include'../../includes/footer.php';
?>
<!-- Product Modal-->
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