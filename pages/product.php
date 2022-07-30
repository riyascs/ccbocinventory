<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

?>       
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Products&nbsp;<!--<a  href="product_add.php"  type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>-->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>CATEGORY</th>
                     <th>PRODUCT NAME</th>
                     <th>PRODUCT CODE</th>
                     
                     <th>ACTION</th>
                   </tr>
               </thead>
          <tbody>
         
<?php                  
        $query = 'SELECT product_id,prod_ctgry_id,product_code,product_name,description FROM product_item_table group by product_code ';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                
                echo '<tr>';
                $query1 = "SELECT prod_ctgry_name FROM product_category_table WHERE prod_ctgry_id = $row[prod_ctgry_id]";
                $result1 = mysqli_query($db, $query1); 
                while ($row1 = mysqli_fetch_assoc($result1)) {
                echo '<td>'. $row1['prod_ctgry_name'].'</td>';
                echo '<td>'. $row['product_name'].'</td>';
                echo '<td>'. $row['product_code'].'</td>';
                
               
                      echo '<td align="right"> <div class="btn-group">
                      <a type="button" class="btn btn-outline-primary " href="productInventory.php?action=add & id='.$row['product_id'] . '"><i class="fas fa-fw fa-list"></i> Inventory</a>
					  <a type="button" class="btn btn-outline-primary " href="stock_add.php?action=add & id='.$row['product_id'] . '"><i class="fas fa-fw fa-plus"></i> Stock</a>
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="product_details.php?action=edit & id='.$row['product_id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 10px;" href="product_edit.php?action=edit & id='.$row['product_id']. '">
                                    <i class="fas fa-fw fa-dltt"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;" href="product_delete.php?action=delete & id='.$row['product_id']. '">
                                    <i class="fas fa-fw fa-delete"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>';
                echo '</tr> ';
                        }
            
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

  <!-- Product Modal-->
  <div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="pro_transac.php?action=add">
          <div class="form-group">
             <?php
               echo $aaa;
             ?>
           </div>
           <div class="form-group">
             <?php
               echo $productitem ;
             ?>
           </div>
           <div class="form-group">
             <?php
               echo $productcode ;
             ?>
           </div>
           <div class="form-group">
             <?php
               echo $sup;
             ?>
           </div>
           <div class="form-group">
             <textarea rows="5" cols="50" texarea class="form-control" placeholder="Description" name="description" required></textarea>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity" required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="999999999" class="form-control" placeholder="On Hand" name="onhand" required>
           </div>
           <div class="form-group">
             <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price" required>
           </div>
           <div class="form-group">
             <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Stock In" name="datestock" required>
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