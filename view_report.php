<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Report</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="js/date_pic/date_input.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
         <script src="js/date_pic/jquery.date_input.js"></script>  
	<script src="js/script.js"></script>  
		<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
	$('#from_sales_date').jdPicker();
	$('#to_sales_date').jdPicker();
	$('#from_purchase_date').jdPicker();
	$('#to_purchase_date').jdPicker();
	$('#from_sales_purchase_date').jdPicker();
	$('#to_sales_purchase_date').jdPicker();
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
    function change_balance(){
        if(parseFloat(document.getElementById('new_payment').value) > parseFloat(document.getElementById('balance').value)){
            document.getElementById('new_payment').value=parseFloat(document.getElementById('balance').value);
        }
    }
    
function sales_report_fn() 
{ 
 window.open("sales_report.php?from_sales_date="+$('#from_sales_date').val()+"&to_sales_date="+$('#to_sales_date').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
   
}
function purchase_report_fn() 
{ 
 window.open("purchase_report.php?from_purchase_date="+$('#from_purchase_date').val()+"&to_purchase_date="+$('#to_purchase_date').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
   
} 

function sales_purchase_report_fn() 
{ 
 window.open("all_report.php?from_sales_purchase_date="+$('#from_sales_purchase_date').val()+"&to_sales_purchase_date="+$('#to_sales_purchase_date').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
   
} 

function stock_sales_report_fn() 
{ 
 window.open("sales_stock_report.php?from_stock_sales_date="+$('#from_stock_sales_date').val()+"&to_stock_sales_date="+$('#to_stock_sales_date').val(),"myNewWinsr","width=620,height=800,toolbar=0,menubar=no,status=no,resizable=yes,location=no,directories=no,scrollbars=yes"); 
   
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
				<li><a href="view_product.php" class="stock-tab">Stocks / Products</a></li>
				<li><a href="view_payments.php" class=" payment-tab">Payments / Outstandings</a></li>
				<li><a href="view_report.php" class="active-tab report-tab">Reports</a></li>
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
				
				<h3>Report</h3>
				<ul>
                                	<ul>
                                            <li><a></a></li>
					                                      
				</ul>
                                    </ul>
                                    
                                                                
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Report</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				<form  action="">
                
                  <table class="form"  border="0" cellspacing="0" cellpadding="0">
  <form action="sales_report.php" method="post" name="form1"  id="form1" name="sales_report" id="sales_report" target="myNewWinsr">
    <tr>
  
      <td><strong>Sales Report </strong></td>
      <td>From</td>
      <td><input name="from_sales_date" type="text" id="from_sales_date" style="width:80px;"></td>
      <td>To</td>
      <td><input name="to_sales_date" type="text" id="to_sales_date" style="width:80px;"></td>
      <td><input name="submit" type="button" value="Show" onClick='sales_report_fn();'></td>
   
  </tr>
   </form>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
    <form action="purchase_report.php" method="post" name="purchase_report" target="_blank">
         <tr>
      <td><strong>Purchase Report </strong></td>
      <td>From</td>
      <td><input name="from_purchase_date" type="text" id="from_purchase_date" style="width:80px;"></td>
      <td>To</td>
      <td><input name="to_purchase_date" type="text" id="to_purchase_date" style="width:80px;"></td>
      <td><input name="submit" type="button" value="Show" onClick='purchase_report_fn();'></td>
    </tr> </form>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
    <form action="sales_purchase_report.php" method="post" name="sales_purchase_report" target="_blank">
    <tr>  <td><strong>Purchase Stocks </strong></td>
      <td>From</td>
      <td><input name="from_sales_purchase_date" type="text" id="from_sales_purchase_date" style="width:80px;"></td>
      <td>To</td>
      <td><input name="to_sales_purchase_date" type="text" id="to_sales_purchase_date" style="width:80px;"></td>
      <td><input name="submit" type="button" value="Show" onClick='sales_purchase_report_fn();'></td>
    </tr>  </form>

                  </table>
            
						
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
		<p>Any Queries email to <a href="mailto:sridharkalaibala@gmail.com?subject=Stock%20Management%20System">sridharkalaibala@gmail.com</a>.</p>
	
	</div> <!-- end footer -->

</body>
</html>