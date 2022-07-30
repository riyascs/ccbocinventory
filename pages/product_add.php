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

          
        <div class="card shadow mb-4 col-xs-12 col-md-10 border-bottom-primary mx-auto display:block display:flex ">
            <div class="card-header py-3 bg-">
              <h4 class="m-4 font-weight-bolder text-primary ">ADD PRODUCT</h4>
            </div>

            <div class="card-body">               
                <form role="form" method="post" action="product_add_action.php?">
                    <?php
                        $id = $_GET['id'];
                        $query1 = "SELECT prod_ctgry_id,prod_ctgry_name FROM product_category_table WHERE prod_ctgry_id =$id";
                        $result1 = mysqli_query($db, $query1);
                        while($row1 = mysqli_fetch_array($result1)){
                        $prod_ctgry_name = $row1['prod_ctgry_name'];
                        $prod_ctgry_id = $row1['prod_ctgry_id'];
                    ?>
                <div class="form-group">
                    <input hidden type="text"   class="form-control"  name="prod_ctgry_id" value="<?php echo $prod_ctgry_id; ?>">
                </div>
                <div class="form-group">
                    <div><h5><span class="text-light bg-dark">   CATEGORY : </span>&nbsp&nbsp&nbsp<?php echo $prod_ctgry_name; ?></h5></div><hr/>            
                </div>

                <div class="form-group">
                    <input type="text"  min="1" max="999999999"  class="form-control" placeholder="Type Product Code" name="code" required>
                </div>
                <div class="form-group">
                    <input type="text"  class="form-control" placeholder="Type Product name" name="name" required>
                </div>
                <div class="form-group">
                    <textarea rows="5" cols="50" class="form-control" placeholder="Description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <input hidden type="text"  min="1" max="999999999" class="form-control" placeholder="user" name="user" value="<?php echo $_SESSION['FIRST_NAME']." ".$_SESSION['LAST_NAME']." as ".$_SESSION['TYPE'];?>">
                </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <a href="../pages/product.php"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>      
                </form>           
            </div>

        </div>
          
<?php
                        }
include'../includes/footer.php';
?>

