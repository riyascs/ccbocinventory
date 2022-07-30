<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $catg_name = $_POST['prod_cat_name'];

              switch($_GET['action']){
                case 'add':                 
                    $query = "INSERT INTO product_category_table (prod_ctgry_name) VALUES ('$catg_name')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);                   
                
              }
            ?>
             <script type="text/javascript">alert("Category Successfully Added.");window.location = "prod_category_add.php";</script>	
          </div>





