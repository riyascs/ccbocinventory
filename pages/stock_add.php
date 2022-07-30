<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  
 ?>

          
        <div class="card shadow mb-4 col-xs-12 col-md-10 border-bottom-primary mx-auto display:block display:flex ">
            <div class="card-header py-3 bg-">
              <h4 class="m-4 font-weight-bolder text-primary ">ADD STOCK</h4>
            </div>

            <div class="card-body">               
                <form role="form" method="post" action="stock_add_action.php?">
                <div class="form-group">

                </div>
                <div class="form-group">
                <?php
                        $id = $_GET['id'];
                        $query1 = "SELECT product_id,product_name,product_code FROM product_item_table WHERE product_id =$id";
                        $result1 = mysqli_query($db, $query1);
                        while($row1 = mysqli_fetch_array($result1)){
                        $product_name = $row1['product_name'];
                        $product_code = $row1['product_code'];
                        $product_id = $row1['product_id'];
                        }
                    ?>
                </div>
                <div class="form-group">
                    <input hidden type="text"   class="form-control"  name="product_id" value="<?php echo $product_id; ?>">
                </div>
                <div class="form-group">
                    <div><h5><span class="text-light bg-dark">   PRODUCT  NAME: </span>&nbsp&nbsp&nbsp<?php echo $product_name; ?></h5></div><hr/>
                    <div><h5><span class="text-light bg-dark" >  PRODUCT CODE    : </span>&nbsp&nbsp<?php echo $product_code; ?> </h5></div><hr/>             
                </div>
                
                <div class="form-group">
                    <label>Please Select Supplier</label>
                    <select class="form-control" name="supplier" placeholder="select Supplier">
                        <?php
                                        
                                        $sql2 = "SELECT * FROM supplier";
                                        $result2 = mysqli_query($db, $sql2);
                                        while($row2 = mysqli_fetch_array($result2) ){
                                        ?>
                    <option value="<?=$row2["SUPPLIER_ID"]?>"><?=$row2["COMPANY_NAME"]?></option>
                    <?php
                                        }
                                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Type available quantity</label>
                    <input type="number"  min="1" max="999999999" class="form-control"  name="quantity" required>
                </div>
                <div class="form-group">
                    <label>Unit Price</label>
                    <input type="number"   class="form-control"  name="price" required>
                </div>
                <div class="form-group">
                    <label>Stock in Date</label>
                    <input type="text" id="set_bdate" min="YYYY-mm-dd" max="YYYY-mm-dd"  onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control"  name="datestocked" required>
                </div>
                <div class="form-group">
                    <input hidden type="number"  min="1" max="999999999" class="form-control"  name="user" value="<?php $_SESSION['MEMBER_ID']?>">
                </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <a href="../pages/stock.php"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button></a>    
                </form>       
            </div>

        </div>
          
<?php
include'../includes/footer.php';
?>

