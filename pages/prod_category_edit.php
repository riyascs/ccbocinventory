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


  $query = 'SELECT * FROM product_category_table WHERE prod_ctgry_id ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $catg_name = $row['prod_ctgry_name'];
      $prod_ctgry_id = $row['prod_ctgry_id'];
 
    }
      $id = $_GET['id'];
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Product Category</h4>
            </div>
            <a href="prod_category_add.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="prod_category_edit1.php">
              <input type="hidden" name="prod_ctgry_id" value="<?php echo $prod_ctgry_id; ?>" />

              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Product Category:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Product Category" name="prodncategoryname" value="<?php echo $catg_name; ?>" required>
                </div>
              </div>
              </div>
              <hr>

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>
  </div>

<?php
include'../includes/footer.php';
?>