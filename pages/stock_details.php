<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
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

          <?php
          $id = $_GET['id'];
          $query1 = "SELECT stock_id,product_id,supplier_id,sum(quantity) as quantity,modified_date FROM stock_table WHERE stock_id=$id GROUP BY product_id";
          $result1 = mysqli_query($db,$query1);
          while($row = mysqli_fetch_array($result1)){
            $product_id = $row['product_id'];
            $supplier_id = $row['supplier_id'];
            $quantity = $row['quantity'];
            $modified_date = $row['modified_date'];

            $query2="SELECT COMPANY_NAME FROM supplier inner join stock_table on supplier.SUPPLIER_ID = $supplier_id";
            $result2 = mysqli_query($db,$query2);
            if($row2=mysqli_fetch_assoc($result2)){
            
            $query3="SELECT product_name FROM product_item_table inner join stock_table on product_item_table.product_id = $product_id";
            $result3 = mysqli_query($db,$query3);
            if($row3=mysqli_fetch_assoc($result3)){
          ?>



          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product Stock Details</h4>
            </div>
            <a href="stock.php" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">               
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          :<?php echo $row3['product_name']; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Supplier<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5> 
                        :<?php  echo $row2['COMPANY_NAME']; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Quantity<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                        :<?php echo $quantity; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Last Stock Date<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                        :<?php echo $modified_date; ?> <br>
                        </h5>
                      </div>
                    </div>
            </div>
          </div>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">History of Stock&nbsp;<!--<a  href="stock_add.php"  type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>-->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>PRODUCT</th>
                     <th>SUPPLIER</th>
                     <th>QUANTITY</th>
                     <th>STOCKED DATE</th>
                     <th>ACTION</th>
                   </tr>
               </thead>
          <tbody>
          <?php 
                
                $query1 = "SELECT * FROM stock_table WHERE product_id = $product_id";
                $result1 = mysqli_query($db,$query1);
                while($row1 = mysqli_fetch_array($result1)){
                  $query2 = "SELECT product_name FROM product_item_table INNER JOIN stock_table ON product_item_table.product_id = $product_id";
                  $result2 = mysqli_query($db,$query2);
                  if($row2=mysqli_fetch_assoc($result2)){

                    $query3 = "SELECT COMPANY_NAME FROM supplier INNER JOIN stock_table ON supplier.SUPPLIER_ID = $supplier_id";
                    $result3 = mysqli_query($db,$query3);
                    if($row3=mysqli_fetch_assoc($result3)){
                ?>
          <tr>      
                 <td><?php echo $row2['product_name']; ?></td>                     
                 <td><?php echo $row3['COMPANY_NAME']; ?></td>
                 <td><?php echo $row1['quantity']; ?></td>
                 <td><?php echo $row1['modified_date']; ?></td>
                 <td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="stock_details.php?action=details & id=<?=$row["stock_id"]?>"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 10px;" href="stock_edit.php?action=edit & id=<?=$row["stock_id"]?>">
                                    <i class="fas fa-fw fa-dltt"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;" href="stock_delete.php?action=delete & id=<?=$row["stock_id"]?>">
                                    <i class="fas fa-fw fa-delete"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
                          </div> </td>
                </tr> 
                <?php
                }
              }
            }
          }     
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

