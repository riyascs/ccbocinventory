<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $prod_item_name = $_POST['prod_item_name'];
              $prod_ctgry_id = $_POST['category_namme'];
              $product_item_code = $_POST['product_item_code'];
             

              switch($_GET['action']){
                case 'add':                 
                    $query = "INSERT INTO prod_items (prod_item_name,prod_ctgry_id,product_item_code) VALUES ('$prod_item_name','$prod_ctgry_id','$product_item_code')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);                   
                
              }
            ?>
             <script type="text/javascript">alert("Product Item is Successfully Added.");window.location = "pro_add_item";</script>	
          </div>
