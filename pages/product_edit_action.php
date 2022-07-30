<?php
if(!isset($_SESSION)){
    session_start();
}

?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php

            /* Collecting detils from form*/
              $product_id = $_POST['product_id'];
              $category = $_POST['category'];
              $code = $_POST['code'];
              $name = $_POST['name'];
              $description = $_POST['description'];
              $user = $_POST['user'];
            
              include'../includes/connection.php';

              $query ="UPDATE product_item_table SET prod_ctgry_id='$category',product_code='$code',product_name='$name',description='$description',product_createdby='$user' WHERE product_id='$product_id'";
              
              if (mysqli_query($db, $query)) {
                ?>
                 <script type="text/javascript">alert("Product Item is Successfully updated.");window.location = "product.php";</script>";
                <?php
              } else {
                echo "Error in updating product in Database: " . $query . "<br>" . mysqli_error($db);
              }
              
              mysqli_close($db);
              ?>   
          </div>