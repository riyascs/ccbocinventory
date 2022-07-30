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
    $sql = "SELECT DISTINCT prod_ctgry_name, prod_ctgry_id FROM prod_ctgry order by prod_ctgry_name asc";
    $result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

    $aaa = "<select class='form-control' name='category_namme' required>
            <option disabled selected hidden>Select Category</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        $aaa .= "<option value='".$row['prod_ctgry_id']."'>".$row['prod_ctgry_name']."</option>";
    }

    $aaa .= "</select>";

  $query = 'SELECT * FROM prod_items ,prod_ctgry WHERE prod_item_id ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))  
    {   
      /*$query1 = 'SELECT prod_ctgry_name from prod_ctgry INNER JOIN prod_items ON prod_ctgry.prod_ctgry_id = prod_items.prod_ctgry_id';
      $query1 = "SELECT * from prod_ctgry,prod_items";
      $result1 = mysqli_query($db,$query1) or die(mysqli_error($db));*/
      
      $prod_item_id = $row['prod_item_id'];
      $catg_name = $row['prod_ctgry_name'];
      $prod_item_name = $row['prod_item_name'];
      $product_item_code =$row['product_item_code'];
 
    }
      $id = $_GET['id'];
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Product Category</h4>
            </div>
            <a href="pro_add_item.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Back</a>
            <div class="card-body">

            <form role="form" method="post" action="pro_edit_items1.php">
              <input type="hidden" name="prod_item_id" value="<?php echo $prod_item_id ?>" />
                <div class="form-group">
                    <?php
                    echo $aaa;
                    ?>
                </div>
                <div class="form-group">
                    <input class="form-control" name="prod_item_name" value="<?php echo $prod_item_name ; ?>">
                </div>   
                <div class="form-group">
                    <input class="form-control" name="product_item_code" value="<?php echo $product_item_code;?>">
                    </div>     
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
            </form>    
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>