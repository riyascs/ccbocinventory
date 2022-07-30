<?php

include'../inc/site-sidebar.php';
       

            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Products</h4></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Category</th>
                     <th>Product Code </th>
                     <th>Name</th>
                     <th>Quantity</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

      $rows =  getProductsAndCat();
            foreach ($rows as $row) {
                                 
                echo '<tr>';
                echo '<td>'. $row['prod_ctgry_name'].'</td>';
                echo '<td>'. $row['product_code'].'</td>';
                echo '<td>'. $row['product_name'].'</td>';
				        echo '<td></td>';
                
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="productistry.php?action=view & id='.$row['product_id'] . '">
                              <i class="fas fa-fw fa-list-alt"></i> Details</a>
                                                      
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
						
                        </div>
                    </div>
                  </div>

<?php
include'../../includes/footer.php';
?>