<?php
if(!isset($_SESSION)){
    session_start();
}

?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php

            /* Collecting detils from form*/
              $prod_ctgry_id = $_POST['prod_ctgry_id'];
              $code = $_POST['code'];
              $name = $_POST['name'];
              $description = $_POST['description'];
              $user = $_POST['user'];
            
              include'../includes/connection.php';

              $query ="INSERT INTO product_item_table(prod_ctgry_id,product_code,product_name,description,product_createdby)
              VALUES('$prod_ctgry_id','$code','$name','$description','$user')";
              
              if (mysqli_query($db, $query)) {
                ?>
                 <script type="text/javascript">alert("Product Item is Successfully Added.");window.location = "product.php";</script>";
                <?php
              } else {
                echo "Error in updating product in Database: " . $query . "<br>" . mysqli_error($db);
              }
              
              mysqli_close($db);
              ?>
                
              }
            ?>
            
          </div>

