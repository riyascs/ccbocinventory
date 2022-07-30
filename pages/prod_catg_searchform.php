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
          <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Product category's Detail</h4>
            </div>
            <a href="pro_add_category.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
            <div class="card-body">
          <?php 
              $query = 'SELECT * FROM prod_ctgry WHERE prod_ctgry_id ='.$_GET['id'];
              $result = mysqli_query($db, $query) or die(mysqli_error($db));
              while($row = mysqli_fetch_array($result))
              {   
                $prod_ctgry_id= $row['prod_ctgry_id'];
                $prod_ctgry_name= $row['prod_ctgry_name'];
              }
              $id = $_GET['id'];
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
   /* $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, COUNT("QTY_STOCK") AS QTY_STOCK, COUNT("ON_HAND") AS ON_HAND, CNAME, COMPANY_NAME, p.SUPPLIER_ID, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON p.SUPPLIER_ID=s.SUPPLIER_ID where PRODUCT_CODE ='.$zzz.' GROUP BY `SUPPLIER_ID`, `DATE_STOCK_IN`';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {*/
                                 
                echo '<tr>';
                echo '<td>'. '45'.'</td>';
                echo '<td>'. '30'.'</td>';
                echo '<td>'. '5600'.'</td>';
                echo '<td>'. '4205'.'</td>';

                echo '</tr> ';
                       /* }*/
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>


<?php
include'../includes/footer.php';
?>