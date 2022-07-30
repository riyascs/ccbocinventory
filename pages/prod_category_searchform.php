<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
$id = $_GET['id'];
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
            ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product category's Detail</h4>
            </div>
            <a href="prod_category_add.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
            <div class="card-body">
          <?php 
              $query = 'SELECT * FROM product_category_table WHERE prod_ctgry_id ='.$_GET['id'];
              $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $prod_ctgry_id= $row['prod_ctgry_id'];
                $prod_ctgry_name= $row['prod_ctgry_name'];
              }
             
          ?>

                  <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product category<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $prod_ctgry_name; ?><br>
                        </h5>
                      </div>
                    </div>
          </center>

          <div class="card shadow mb-4 col-xs-12 col-md-15 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventory</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>No of Products</th>
                     <th>No of Supplier</th>
                     <th>TOtal Quantity</th>
                     <th>On Hand</th>

                   </tr>
               </thead>
          <tbody>

<?php                  
                 $query1 = "SELECT COUNT(product_id) as product,COUNT(supplier_id) as supplier,SUM(quantity) as quantity,price from stock_table
                 WHERE prod_ctgry_id = '$id' group by product_id";
                 $result1 = mysqli_query($db,$query1);
                 while($row1=mysqli_fetch_array($result1)){
            
                
                ?> 
                 
                <tr>
                <td><span class='badge badge-info'><?php echo $row1['product'];?></span></td>
                <td><span class='badge badge-info'><?php echo $row1['supplier']; ?></span></td>
                <td><span class='badge badge-info'><?php echo $row1['quantity']; ?></span></td>
                <td><span class='badge badge-info'><?php echo $row1['price']; ?></span></td>

                </tr>
                <?php
                 } 
                  
?>  
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>


<?php
include'../includes/footer.php';
?>