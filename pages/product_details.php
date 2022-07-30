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
            $id = $_GET["id"];
            $sql = "SELECT * FROM product_item_table WHERE product_id='$id'"; 
            $result = mysqli_query($db, $sql); 
            while($row = mysqli_fetch_array($result) ){

            $product_id = $row["product_id"];
            $prod_ctgry_id = $row["prod_ctgry_id"];
            $product_code= $row["product_code"];
            $product_name=$row["product_name"];
            $bar_code=$row["bar_code"];
            $description=$row["description"];
            $quantity=$row["quantity"];

            $query1 = "SELECT prod_ctgry_name FROM product_category_table WHERE prod_ctgry_id=$prod_ctgry_id";
            $result1 = mysqli_query($db,$query1);
            if($row1 = mysqli_fetch_assoc($result1)){
              $prod_ctgry_name = $row1["prod_ctgry_name"];

          ?>
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product Details</h4>
            </div>
            <a href="product.php" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">               
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Category<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          :<?php echo $prod_ctgry_name; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Product Code<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                          :<?php echo $product_code; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                        Product Name<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5> 
                        :<?php  echo $product_name; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                        Description Note<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5> 
                        :<?php  echo $description; ?> <br>
                        </h5>
                      </div>
                    </div>
                    <div class="form-group row text-left">
                      <div class="col-sm-3 text-primary">
                        <h5>
                          Available Quantity<br>
                        </h5>
                      </div>
                      <div class="col-sm-9">
                        <h5>
                        :<?php echo $quantity; ?> <br>
                        </h5>
                      </div>
                    </div>
            </div>
          </div>

          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">History of Product&nbsp;<!--<a  href="stock_add.php"  type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>-->
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
                
                $query2 = "SELECT * FROM product_item_table WHERE product_id = $product_id group by product_id";
                $result2 = mysqli_query($db,$query2);
                while($row2 = mysqli_fetch_array($result2)){

                ?>
          <tr>      
                 <td><?php echo $row2['product_name'] ; ?></td>                     
                 <td><?php echo $row2['product_name'] ; ?></td>
                 <td>0</td>
                 <td><?php echo $row2['Date_updated'] ; ?></td>
                 <td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="product_details.php?action=details & id=<?=$row["product_id"]?>"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 10px;" href="product_edit.php?action=edit & id=<?=$row["product_id"]?>">
                                    <i class="fas fa-fw fa-dltt"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;" href="product_delete.php?action=delete & id=<?=$row["product_id"]?>">
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
                ?>                                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>

