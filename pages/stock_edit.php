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
              <h4 class="m-4 font-weight-bolder text-primary ">STOCK EDIT</h4>
            </div>

            <div class="card-body">               
                        <?php 

                        $id = $_GET["id"];
                        include'../includes/connection.php';
                        $sql = "SELECT * FROM stock_table WHERE stock_id='$id'"; 
                        $result=mysqli_query($db, $sql); 
                        while ($row = mysqli_fetch_array($result)){

                        $stock_id = $row["stock_id"];
                        $quantity= $row["quantity"];
                        $price=$row["price"];
                        $description_note=$row["description_note"];
                        $stocked_date=$row["stocked_date"];


                        ?> 
                        <form role="form" method="post" action="stock_edit_action.php?id=<?php echo $stock_id;?>">
                        <div class="form-group">
                        <input type="hidden"   class="form-control" value="<?php echo $stock_id; ?>" name="stock_id">
                        </div>
                        <div class="form-group">
                        <label>PRODUCT</label>
                        <select class="form-control" name="product" placeholder="select category">

                            <?php
                                            $sql2 = "SELECT * FROM product_item_table";
                                            $result2 = mysqli_query($db, $sql2);
                                            while($row2 = mysqli_fetch_array($result2) ){
                                                $selected = "";
                                                if($row2["prod_ctgry_id"]==$row["prod_ctgry_id"]){
                                                    $selected = "selected";
                                                }
                            ?>

                        <option <?=$selected ?> value="<?=$row2["product_id"]?>"><?=$row2["product_name"]?></option>
                        
                        <?php
                        }
                        ?>

                        </select>
                        </div>
                        <div class="form-group">
                        <label>PRODUCT CATEGORY</label>
                        <select class="form-control" name="category" placeholder="select category">

                            <?php
                                            $sql1 = "SELECT * FROM product_category_table";
                                            $result1 = mysqli_query($db, $sql1);
                                            while($row1 = mysqli_fetch_array($result1) ){
                                                $selected = "";
                                                if($row1["prod_ctgry_id"]==$row["prod_ctgry_id"]){
                                                    $selected = "selected";
                            }
                            ?>

                        <option <?=$selected ?> value="<?=$row1["prod_ctgry_id"]?>"><?=$row1["prod_ctgry_name"]?></option>
                        
                        <?php
                            }
                        ?>

                        </select>
                        </div>
                        <div class="form-group">
                        <label>SUPPLIER</label>
                        <select class="form-control" name="supplier" placeholder="select category">

                            <?php
                                            $sql3 = "SELECT * FROM supplier";
                                            $result3 = mysqli_query($db, $sql3);
                                            while($row3 = mysqli_fetch_array($result3) ){
                                                $selected = "";
                                                if($row3["SUPPLIER_ID"]==$row["supplier_id"]){
                                                    $selected = "selected";
                            }
                            ?>

                        <option <?=$selected ?> value="<?=$row3["SUPPLIER_ID"]?>"><?=$row3["COMPANY_NAME"]?></option>
                        
                        <?php
                        }
                        ?>

                        </select>
                        </div>
                        <div class="form-group">
                        <label>QUANTITY</label>
                        <input type="number"  min="1" max="999999999"  class="form-control" value="<?php echo $quantity; ?>" name="quantity" required>
                        </div>
                        <div class="form-group">
                        <label>Price</label>
                        <input type="number"  min="1" max="999999999"  class="form-control" value="<?php echo $price; ?>" name="price" required>
                        </div>
                        <div class="form-group">
                        <label>DESCRIPTION NOTE</label>
                        <textarea rows="5" cols="50" class="form-control"  name="description_note" required><?php echo $description_note; ?></textarea>
                        </div>
                        <div class="form-group">
                        <label>DATE IN STOCK</label>
                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" value="<?php echo $stocked_date; ?>" placeholder="Date Stock In" name="datestocked" required>
                        </div>
                        <div class="form-group">
                        <input hidden type="text"  min="1" max="999999999" class="form-control" placeholder="user" name="user" value="<?php echo $_SESSION['FIRST_NAME']." ".$_SESSION['LAST_NAME']." as ".$_SESSION['TYPE'];?>">
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i><a href="product.php">Back</a></button>
                        </form>  
                        <?php } ?>
        
            </div>

        </div>
          
<?php
                        
include'../includes/footer.php';
?>

