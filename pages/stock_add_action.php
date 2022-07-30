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
              $supplier = $_POST['supplier'];
              $quantity = $_POST['quantity'];
              $price = $_POST['price'];
              $datestocked = $_POST['datestocked'];
              $user = $_POST['user'];
            
              include'../includes/connection.php';

              $query ="INSERT INTO stock_table(product_id,supplier_id,quantity,price,stocked_date,modified_by)
              VALUES('$product_id','$supplier','$quantity','$price','$datestocked','$user')";
              
              if (mysqli_query($db, $query)) {
                ?>
                 <script type="text/javascript">alert("Product Item is Successfully Added.");window.location = "stock.php";</script>";
                <?php
              } else {
                echo "Error in updating product in Database: " . $query . "<br>" . mysqli_error($db);
              }
              
              mysqli_close($db);
              ?>
                
              }
            ?>
            
          </div>

