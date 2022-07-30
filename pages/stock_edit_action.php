<?php
if(!isset($_SESSION)){
    session_start();
}

?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php

            /* Collecting detils from form*/
              $id = $_GET['id'];
              $product = $_POST['product'];
              $category = $_POST['category'];
              $supplier = $_POST['supplier'];
              $quantity = $_POST['quantity'];
              $price = $_POST['price'];
              $description_note = $_POST['description_note'];
              $datestocked = $_POST['datestocked'];
              $user = $_POST['user'];
            
              include'../includes/connection.php';

              $query ="UPDATE stock_table SET product_id='$product',prod_ctgry_id='$category',supplier_id='$supplier',quantity='$quantity'
              ,price='$price',description_note='$description_note',stocked_date='$datestocked',modified_by='$user' WHERE stock_id='$id'";
              
              if (mysqli_query($db, $query)) {
                ?>
                 <script type="text/javascript">alert("Stock is Successfully updated.");window.location = "stock.php";</script>";
                <?php
              } else {
                echo "Error in updating product in Database: " . $query . "<br>" . mysqli_error($db);
              }
              
              mysqli_close($db);
              ?>   
          </div>
