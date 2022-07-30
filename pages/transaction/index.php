<?php
include'../../includes/connection.php';
include'../../includes/sidebar.php';
$Aa = getUserType();
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           

            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction <a  href="one.php" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Transaction ID</th>
                     <th>Site</th>
                     <th>Status</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
 
      $rows =  getAllTransaction();
            foreach ($rows as $row) {
                                 
                echo '<tr>';
                echo '<td>'. $row[1].'</td>';
                echo '<td>'. $row[2].'</td>';
				echo '<td>'. getStatusName($row[3]).'</td>';
                
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="view.php?action=edit & id='.$row[0] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                
                                <li>
                                  <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;" 
								  href="delete.php?action=delete & id='.$row[0]. '">
                                    <i class="fas fa-fw fa-delete"></i> Delete
                                  </a>
                                </li>
                            </ul>
                            </div>
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