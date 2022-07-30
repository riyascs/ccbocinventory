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
              <h4 class="m-4 font-weight-bolder text-primary ">DELETE PRODUCT</h4>
            </div>

            <div class="card-body">               
                        <?php 
                            $id = $_GET["id"];
                        include'../includes/connection.php';
                                    $sql = "SELECT * FROM product_item_table WHERE product_id='$id'"; 
                                    $result = mysqli_query($db, $sql); 
                                    if($row = mysqli_fetch_array($result) ){

                        $product_id = $row["product_id"];
                        $product_code= $row["product_code"];
                        $product_name=$row["product_name"];
                        $bar_code=$row["bar_code"];
                        $description=$row["description"];
                        $quantity=$row["quantity"];
                                    ?> 
                    <form role="form" method="post" action="product_delete_action.php?deleteid=<?php echo $product_id; ?>">
                    <div class="form-group">
                        <input type="hidden"   class="form-control" value="<?php echo $product_id; ?>" name="product_id" >
                    </div>
                    <div class="form-group">
                        <label>CATEGORY</label>
                        <select class="form-control" name="category" placeholder="select category">
                        
                            <?php
                                            $sql1 = "SELECT * FROM product_category_table";
                                            $result1 = mysqli_query($db, $sql1);
                                            while($row1 = mysqli_fetch_array($result1) ){
                                                $selected = "";
                                                if($row["prod_ctgry_id"]==$row1["prod_ctgry_id"]){
                                                    $selected = "selected";
                                                }
                                            ?>

                        <option readonly <?=$selected ?> value="<?=$row1["prod_ctgry_id"]?>"><?=$row1["prod_ctgry_name"]?></option>
                        
                        <?php
                                            }
                                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>PRODUCT CODE</label>
                        <input readonly type="text"  min="1" max="999999999"  class="form-control" value="<?php echo $product_code; ?>" name="code" required>
                    </div>
                    <div class="form-group">
                        <label>PRODUCT NAME</label>
                        <input readonly type="text"  class="form-control" value="<?php echo $product_name; ?>" name="name" required>
                    </div>
                    <div class="form-group">
                    <label>BAR CODE</label>
                    <input readonly type="text"   class="form-control" value="<?php echo $bar_code; ?>" name="barcode" required>
                    </div>
                    <div class="form-group">
                    <label>DESCRIPTION</label>
                        <textarea readonly rows="5" cols="50" class="form-control"  name="description" required><?php echo $description; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>AVAILABLE QUANTITIES</label>
                        <input readonly type="number"  min="1" max="999999999" class="form-control" value="<?php echo $quantity; ?>" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <input hidden type="text"  min="1" max="999999999" class="form-control" placeholder="user" name="user" value="<?php echo $_SESSION['FIRST_NAME']." ".$_SESSION['LAST_NAME']." as ".$_SESSION['TYPE'];?>">
                    </div>
                        <hr>
                        <button  class="btn btn-danger form-control"><i class="fa fa-times fa-fw"></i>Do you want to delete this recode ? iF YES , then Click</button>
                    </form>  
                    <?php
                        }
                    ?>      
            </div>

        </div>
          
<?php
include'../includes/footer.php';
?>

