<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
             $category = $_POST['category'];
             $productitem = $_POST['productitem']; 
             $productcode = $_POST['productcode']; 
             $supplier = $_POST['supplier']; 
             $desc = $_POST['description'];
             $qty = $_POST['quantity'];
             $oh = $_POST['onhand'];
             $pr = $_POST['price']; 
             $dats = $_POST['datestock']; 
        
              switch($_GET['action']){
                case 'add':  
                    $query = "INSERT INTO product
                              (PRODUCT_ID, CATEGORY_ID, NAME, PRODUCT_CODE, SUPPLIER_ID, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, DATE_STOCK_IN)
                              VALUES (Null,'{$category}','{$productitem}','{$productcode}','{$supplier}','{$desc}','{$qty}','{$oh}','{$pr}','{$dats}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);                   
                break;
              }
            ?>
              <script type="text/javascript">alert("Successfully Added.");window.location = "product.php";</script>	
          </div>

<?php
include'../includes/footer.php';
?>