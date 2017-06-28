<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Update Supplier</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script>  
		<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
	
		// validate signup form on keyup and submit
		$("#form1").validate({
			rules: {
				name: {
					required: true,
					minlength: 3,
					maxlength: 200
				},
				
				cost: {
                                        required: true
					
				},
				sell: {
                                        required: true
					
				}
			},
			messages: {
				name: {
					required: "Please enter a Stock Name",
					minlength: "Stock must consist of at least 3 characters"
				},
				cost: {
					required: "Please enter a cost Price"
				},
				sell: {
					required: "Please enter a Sell Price"
				}
			}
		});
	
	});
function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=38 && unicode!=39 && unicode!=40){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
    }
    }
	</script>

</head>
<body>

	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
                                <li><a href="dashboard.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="view_sales.php" class="sales-tab">Sales</a></li>
				<li><a href="view_customers.php" class=" customers-tab">Customers</a></li>
				<li><a href="view_purchase.php" class="purchase-tab">Purchase</a></li>
				<li><a href="view_supplier.php" class=" supplier-tab">Supplier</a></li>
				<li><a href="view_product.php" class="active-tab stock-tab">Stocks / Products</a></li>
				<li><a href="view_payments.php" class="payment-tab">Payments / Outstandings</a></li>
				<li><a href="view_report.php" class="report-tab">Reports</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Stock Management</h3>
				<ul>
					<li><a href="add_stock.php">Add Stock/Product</a></li>
					<li><a href="view_product.php">View Stock/Product</a></li>
					<li><a href="add_category.php">Add Stock Category</a></li>
					<li><a href="view_category.php">view Stock Category</a></li>
                                        <li><a href="view_stock_availability.php">view Stock Available</a></li>                                       
				</ul>
				                            
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Update Supplier</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				<form name="form1" method="post" id="form1" action="">
                  <p><strong>Add Supplier Details </strong> - Add New ( Control + U)</p>
                  <table class="form"  border="0" cellspacing="0" cellpadding="0">
				  <?php
				if(isset($_POST['id']))

            {
			
			$id=mysql_real_escape_string($_POST['id']);
			$name=  trim(mysql_real_escape_string($_POST['name']));
			$sell=trim(mysql_real_escape_string($_POST['sell']));
			$cost=trim(mysql_real_escape_string($_POST['cost']));
			$Category=trim(mysql_real_escape_string($_POST['Category']));
			$date=trim(mysql_real_escape_string($_POST['date']));
			$supplier=trim(mysql_real_escape_string($_POST['supplier']));
			
			
				
			if($db->query("UPDATE stock_details  SET stock_name ='$name',supplier_id='$supplier',company_price='$cost',selling_price='$sell',category='$Category',date='$date'  where id=$id"))
			{ 
                        $data=" $name   Supplier Details Updated" ;
				                                            $msg='<p style=color:#153450;font-family:gfont-family:Georgia, Times New Roman, Times, serif>'.$data.'</p>';//
                                            ?>
                                                    
 <script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<script src="dist/js/jquery.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
                                                  
                                            <script type="text/javascript">
	
					jAlert('<?php echo  $msg; ?>', 'POSNIC');
			
</script>
                                                        <?php
                        
                        }
			else
			echo "<br><font color=red size=+1 >Problem in Updation !</font>" ;
			
			
			}
				
				?>	
				<?php 
				if(isset($_GET['sid']))
				$id=$_GET['sid'];
			
				$line = $db->queryUniqueObject("SELECT * FROM stock_details WHERE id=$id");
				?>
		<form name="form1" method="post" id="form1" action="">
                    
                   <input name="id" type="hidden" value="<?php echo $_GET['sid']; ?>">  
                   <tr><td>&nbsp;</td>
                       <td>Stock ID</td>
                       <td><input name="stock_id" type="text" readonly="readonly" id="name" maxlength="200"  class="round default-width-input" value="<?php echo $line->stock_id ; ?> "/>
                      </td>
                   <td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td>
					<td>Name</td>
                      <td><input name="name" type="text" id="name" maxlength="200"  class="round default-width-input" value="<?php echo $line->stock_name ; ?> "/></td>
                   <td>Category </td>
                      <td><input name="Category"  type="text" id="category" maxlength="20"   class="round default-width-input" 
					  value="<?php echo $line->category ; ?>" /></td>
                    </tr>
                    
                    <tr><td>&nbsp;</td>
                             <td>Cost  </td>
                      <td><input name="cost"  type="text" id="cost" maxlength="20"  class="round default-width-input" 
                                 value="<?php echo $line->company_price; ?>"onkeypress="return numbersonly(event)" /></td>
                    <td>Selling Price </td>
                      <td><input name="sell"  type="text" id="selling" maxlength="20"  class="round default-width-input" 
                                 value="<?php echo $line->selling_price ; ?>"onkeypress="return numbersonly(event)" /></td>
                    </tr>
                    <tr>
                        <td></td>
                             <td>Supplier Name  </td>
                      <td><input name="supplier"  type="text" id="supplier" maxlength="20"  class="round default-width-input" 
					  value="<?php echo $line->supplier_id; ?>" /></td>
                    <td>Expiry Date  </td>
                      <td><input name="date"  type="text" id="date" maxlength="20"  class="round default-width-input" 
					  value="<?php echo $line->date  ; ?>" /></td>
                    </tr>
                   
                      
                    </tr>
                   
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>
                        <input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Save">
						(Control + S)</td>
                        <td align="right"><input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"> 
                        </td>
			<td>&nbsp;</td>		
                    </tr>
                  </table>
                </form>
						
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
		<p> &copy;Copyright 2013</p>
	
	</div> <!-- end footer -->

</body>
</html>