<?php

$baseURL ="http://localhost/ccboc-inventory/new/";
$basePath = __DIR__."/../";



 $db = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'ccbocprince' ) or die(mysqli_error($db));
		
require('session.php');	
include_once('function.php');

?>