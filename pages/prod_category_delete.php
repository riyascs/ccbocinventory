<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
            ?>
          <center>
            <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
                <div class="card-header py-3">
                    <h4 class="m-2 font-weight-bold text-primary">Delete category</h4>
                </div>
                     <a href="prod_category_add.php?action=add" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back</a>
                <div class="card-body">
                    <?php 
                        $id = $_GET['id'];
                        $query = 'SELECT * FROM product_category_table WHERE prod_ctgry_id ='.$_GET['id'];
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while($row = mysqli_fetch_array($result))
                        {   
                            $prod_ctgry_id= $row['prod_ctgry_id'];
                            $prod_ctgry_name= $row['prod_ctgry_name'];
                        
                        
                    ?>

                    <div class="col-sm-3 text-primary">
                            <h5>
                            Product category<br>
                            </h5>
                        </div>
                            <div class="col-sm-9">
                                <h5>
                                <form role="form" method="post" action="prod_category_delete_action.php?deleteid=<?php echo $prod_ctgry_id; ?>">
                                    <div class="form-group">
                                        <input type="hidden"   class="form-control" value="<?php echo $prod_ctgry_id; ?>" name="prod_ctgry_id" >
                                    </div>
                                    <div class="form-group">
                                        <input readonly type="text"    class="form-control" value="<?php echo $prod_ctgry_name; ?>" name="prod_ctgry_name" required>
                                    </div>
                                    <button type="submit" class="btn btn-danger bg-gradient-danger btn-block"> 
                                    <i class="fas fa-flip-horizontal fa fa-trash"></i> Are you sure to delete this Category ?</button>
                                </form>
                                </h5>
                            <?php } ?>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
          </center>

<?php
include'../includes/footer.php';
?>