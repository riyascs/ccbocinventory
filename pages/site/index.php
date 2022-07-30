<?php
include'../../includes/connection.php';
include'../../includes/sidebar.php';

                   


            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Site <a  href="one.php" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Code ID</th>
                     <th>Name</th>
                     
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
 
      $rows =  getAllSite();
            foreach ($rows as $row) {
                                 
                echo '<tr>';
                echo '<td>'. $row['code'].'</td>';
                echo '<td>'. $row['name'].'</td>';
				
                
                      echo '<td align="right"> <div class="btn-group">
                              
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                
                                <li>
                                  <a type="button" class="btn btn-danger bg-gradient-primary btn-block" style="border-radius: 10px;" 
								  href="one.php?action=edit & id='.$row['id']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
								<li>
                                  <a type="button" class="btn btn-danger bg-gradient-danger btn-block" style="border-radius: 10px;" 
								  href="delete.php?action=delete & id='.$row['id']. '">
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