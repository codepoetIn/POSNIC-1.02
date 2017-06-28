<?php
 include("tpl/db.class.php");
$db = new DB("task", "localhost", "root", "vertrigo");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
    <link rel="stylesheet" href="tpl/css/jquery.autocomplete.css">
  <!-- jQuery & JS files  important -->
	<?php include_once("tpl/common_js.php"); ?>
	
</head>
<body>
			
	<form name="form1" method="post" id="form1" action="">
Supplier:
			<input name="supplier" placeholder="ENTER SUPPLIER" type="text" id="supplier"  />
          </form>
						
				
	
</body>
</html>