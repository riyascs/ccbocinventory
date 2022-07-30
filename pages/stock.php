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
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Add Stock&nbsp;<!--<a  href="stock_add.php"  type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>-->
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
          <tr>
                <?php                  
                $query = 'SELECT stock_id,supplier_id,product_id,sum(quantity) as quantity,stocked_date FROM stock_table GROUP BY product_id';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
                while ($row = mysqli_fetch_assoc($result)) { 
                ?>                            
                
                <?php
                 $query2 = "SELECT product_name FROM product_item_table WHERE product_id = $row[product_id]";
                 $result2 = mysqli_query($db, $query2); 
                 while ($row2 = mysqli_fetch_assoc($result2)) {
                  ?>
                 <td><?php echo $row2['product_name']; ?></td>
                 <?php
                 }
                 ?>
                 <?php
                 $query3 = "SELECT COMPANY_NAME FROM supplier WHERE SUPPLIER_ID = $row[supplier_id]";
                 $result3 = mysqli_query($db, $query3); 
                 while ($row3 = mysqli_fetch_assoc($result3)) {
                  ?>
                 <td><?php echo $row3['COMPANY_NAME']; ?></td>
                 <?php } ?>
                 <td><?php echo $row['quantity']; ?></td>
                 <td><?php echo $row['stocked_date']; ?></td>
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
                ?>                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';
?>

  