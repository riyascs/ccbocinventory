<?php
function getStatusName($id){
	
	if($id ==1){ return 'Received';}
	else{ return 'Pending';}
}

function getDivisions(){
	global $db;
	$query = 'SELECT id,code
            FROM division 
            WHERE inactive=0 ';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  $row = mysqli_fetch_all($result);
  return $row;
  
}
function getSiteName($sid){
	if($sid){
	global $db;
	$query = "SELECT  code
            FROM site 
			WHERE id = $sid
            ";
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  $row = mysqli_fetch_array($result);
  return $row[0];
	}
}
function getSites(){
	global $db;
	$query = 'SELECT id,code, name
            FROM site 
            ';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  $row = mysqli_fetch_all($result);
  return $row;
  
}

function getProducts(){
	global $db;
	$query = 'SELECT P.product_id  ,P.product_code, P.product_name
            FROM product_item_table P ';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  $row = mysqli_fetch_all($result);
  return $row;
  
}
function getProductsAndCat(){
	global $db;
	$query = 'SELECT P.product_id  ,P.product_code, P.product_name, C.prod_ctgry_name
            FROM product_item_table P 
            JOIN product_category_table C ON P.prod_ctgry_id = C.prod_ctgry_id  ';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
  return $row;
  
}
function getPrductCodeName($pid){
  global $db;
	$query = "SELECT P.product_id  ,P.product_code, P.product_name
            FROM product_item_table P 
            WHERE P.product_id = $pid";
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  $row = mysqli_fetch_array($result);
  return $row[1]."-".$row[2];
  
}

function getUserType(){
	global $db;
	  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE u.EMPLOYEE_ID  = '.$_SESSION['MEMBER_ID'].'';
	///echo $query;		
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
	  $Aa = $row['TYPE'];
  }
  return $Aa;
}	


function getAllTransaction(){
	global $db;
	$query = 'SELECT T.id, T.transactionID, D.code, T.status
              FROM transaction T
              JOIN site D ON T.site=D.`id`
              ORDER BY T.id ASC';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
      $row = mysqli_fetch_all($result);
	  return $row;
}
function getTransaction($id){
	global $db;
	$query = "SELECT T.* , D.code
              FROM transaction T
              JOIN site D ON T.site=D.`id`
			  WHERE T.id = $id
              ORDER BY T.id ASC";
		
//echo $query;		
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
      $row = mysqli_fetch_array($result);
	  return $row;
}

function getTransactionProduct($tid){
	global $db;
	$query = "SELECT T.*, P.product_name, P.product_code
              FROM transactionproduct T
              JOIN product_item_table P ON T.productID=P.product_id 
			  WHERE T.trasID =$tid
              ORDER BY T.id ASC";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
      $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
	  return $row;
}


function getAllSiteTransaction(){
	global $db;
	$query = 'SELECT T.id, T.transactionID, D.code, T.status
              FROM transaction T
              JOIN site D ON T.site=D.`id`
              ORDER BY T.id ASC';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
      $row = mysqli_fetch_all($result);
	  return $row;
}

function getAllSite(){
	global $db;
	$query = "SELECT *
              FROM site 
              ORDER BY code ASC";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
      $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
	  return $row;
}

function geSiteID($code){
	global $db;
	$query = "SELECT *
              FROM site
WHERE code = '$code'			  
              ORDER BY code ASC";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
      $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
	  return $row;
}

function getStockByProduct($pid){
  global $db;
	$query = "SELECT stock_id ,stocked_date,stock_id ,quantity
              FROM stock_table 
              WHERE product_id = $pid" ;
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
      $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
	  return $row;
}
function getTransactionByProduct($pid){
  global $db;
	$query = "SELECT T.*, D.transactionID
              FROM transactionproduct T 
              JOIN transaction D ON T.trasID=D.`id`
              WHERE T.productID = $pid" ;
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
      $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
	  return $row;
}
function getTotalProductStock($pid){
  global $db;
	$query = "SELECT SUM(quantity) AS total 
        FROM stock_table
         WHERE product_id= $pid" ;
   $result = mysqli_query($db, $query) or die (mysqli_error($db));
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  return $row['total'];    
}
function getTotalProductTransaction($pid){
  global $db;
	$query = "SELECT SUM(qty) AS total 
        FROM transactionproduct
         WHERE productID= $pid" ;
   $result = mysqli_query($db, $query) or die (mysqli_error($db));
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  return $row['total'];    
}

function getPrductQuantity($pid){
//  $totalStock =
}

?>
