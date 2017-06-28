<?php
include("connection.php");
 
$q = strtolower($_GET["q"]);
if (!$q) return;
$db->query("SELECT Distinct (customer_name) FROM customer_details");
  while ($line = $db->fetchNextObject()) {
  
  	if (strpos(strtolower($line->stdreg_name), $q) !== false) {
		echo "$line->customer_name\n";
	
 }
 }

?>