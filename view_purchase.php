<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Perchase Stock</title>
	
	<!-- Stylesheets -->
	<!--<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>-->
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script> 
<script  src="dist/js/jquery.ui.draggable.js"></script>
<script src="dist/js/jquery.alerts.js"></script>
<link rel="stylesheet"  href="dist/js/jquery.alerts.css" >
        
        <script LANGUAGE="JavaScript">
<!--
// Nannette Thacker http://www.shiningstar.net
console.log();
function confirmSubmit(id,table,dreturn)
{ 	     jConfirm('You Want Delete This Purchase ', 'Confirmation Dialog', function (r) {
           if(r){ 
               console.log();
                $.ajax({
  			url: "delete.php",
  			data: { id: id, table:table,return:dreturn},
  			success: function(data) {
    			window.location ='view_purchase.php';
    			
                        jAlert('Product Is Delete', 'POSNIC');
  			}
		});
            }
            return r;
        });
}

function confirmDeleteSubmit()
{
   var flag=0;
  var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++){
    if(field[i].checked ==true){
        flag=flag+1;
        
    }
	
}
if (flag <1) {
  jAlert('You must check one and only one checkbox', 'POSNIC');
return false;
}else{
 jConfirm('You Want Delete Purchase', 'Confirmation Dialog', function (r) {
           if(r){ 
	
document.deletefiles.submit();}
else {
	return false ;
   
}
});
   
}
}
function confirmLimitSubmit()
{
    if(document.getElementById('search_limit').value!=""){

document.limit_go.submit();

    }else{
        return false;
    }
}


function checkAll()
{

	var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++)
	field[i].checked = true ;
}

function uncheckAll()
{
	var field=document.forms.deletefiles;
for (i = 0; i < field.length; i++)
	field[i].checked = false ;
}
// -->
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
				<li><a href="view_purchase.php" class="active-tab purchase-tab">Purchase</a></li>
				<li><a href="view_supplier.php" class=" supplier-tab">Supplier</a></li>
				<li><a href="view_product.php" class=" stock-tab">Stocks / Products</a></li>
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
				
				<h3>Stock Purchase</h3>
				<ul>
					<li><a href="add_purchase.php">Add Purchase</a></li>
					<li><a href="view_purchase.php">View Purchase </a></li>
					
				</ul>
                                    
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Purchase</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				
		
					<table>
<form action="" method="post" name="search" >
    <input name="searchtxt" type="text" class="round my_text_box" placeholder="Search" > 
&nbsp;&nbsp;<input name="Search" type="submit" class="my_button round blue   text-upper" value="Search">
</form>
 <form action="" method="get" name="limit_go">
    Page per Record<input name="limit" type="text" class="round my_text_box" id="search_limit" style="margin-left:5px;" value="<?php if(isset($_GET['limit'])) echo $_GET['limit']; else echo "10"; ?>" size="3" maxlength="3">
    <input name="go"  type="button" value="Go" class=" round blue my_button  text-upper" onclick="return confirmLimitSubmit()">
</form>
                                            
<form name="deletefiles" action="delete.php" method="post">

<input type="hidden" name="table" value="stock_entries">
<input type="hidden" name="return" value="view_purchase.php">
<input type="button" name="selectall" value="SelectAll" class="my_button round blue   text-upper" onClick="checkAll()"  style="margin-left:5px;"/>
<input type="button" name="unselectall" value="DeSelectAll" class="my_button round blue   text-upper" onClick="uncheckAll()" style="margin-left:5px;" />
<input name="dsubmit" type="button" value="Delete Selected" class="my_button round blue   text-upper" style="margin-left:5px;" onclick="return confirmDeleteSubmit()"/>
					
					
					
					<table>
				<?php 



$SQL = "SELECT DISTINCT(stock_id) FROM  stock_entries where type='entry'";

if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
{

$SQL = "SELECT DISTINCT(stock_id) FROM  stock_entries WHERE type='entry'";


}

	$tbl_name="stock_entries";		//your table name

	// How many adjacent pages should be shown on each side?

	$adjacents = 3;

	

	/* 

	   First get total number of rows in data table. 

	   If you have a WHERE clause in your query, make sure you mirror it here.

	*/

	$query = "SELECT COUNT(DISTINCT stock_id) as num FROM $tbl_name where type='entry'";
if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
{

$query = "SELECT COUNT(DISTINCT stock_id) as num FROM stock_entries WHERE  type='entry'";




}
	$total_pages = mysql_fetch_array(mysql_query($query));

	$total_pages = $total_pages[num];

	

	/* Setup vars for query. */

	$targetpage = "view_stock_entries.php"; 	//your file name  (the name of this file)

	$limit = 10; 								//how many items to show per page
	if(isset($_GET['limit']))
	$limit=$_GET['limit'];
	
	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 			//first item to display on this page

	else

		$start = 0;								//if no page var is given, set start to 0

	

	/* Get data. */

	$sql = "SELECT stock_id FROM stock_entries where type='entry'  ";
	
	if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
{

$sql = "SELECT stock_id FROM stock_entries WHERE type='entry'";




}

	$result = mysql_query($sql);

	

	/* Setup page vars for display. */

	if ($page == 0) $page = 1;					//if no page var is given, default to 1.

	$prev = $page - 1;							//previous page is page - 1

	$next = $page + 1;							//next page is page + 1

	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.

	$lpm1 = $lastpage - 1;						//last page minus 1

	

	/* 

		Now we apply our rules and draw the pagination object. 

		We're actually saving the code to a variable in case we want to draw it more than once.

	*/

	$pagination = "";

	if($lastpage > 1)

	{	

		$pagination .= "<div >";

		//previous button

		if ($page > 1) 

			$pagination.= "<a href=\"view_purchase.php?page=$prev&limit=$limit\" class=my_pagination >Previous</a>";

		else

			$pagination.= "<span class=my_pagination>Previous</span>";	

		

		//pages	

		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up

		{	

			for ($counter = 1; $counter <= $lastpage; $counter++)

			{

				if ($counter == $page)

					$pagination.= "<span class=my_pagination>$counter</span>";

				else

					$pagination.= "<a href=\"view_purchase.php?page=$counter&limit=$limit\" class=my_pagination>$counter</a>";					

			}

		}

		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some

		{

			//close to beginning; only hide later pages

			if($page < 1 + ($adjacents * 2))		

			{

				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=my_pagination>$counter</span>";

					else

						$pagination.= "<a href=\"view_purchase.php?page=$counter&limit=$limit\" class=my_pagination>$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"view_purchase.php?page=$lpm1&limit=$limit\" class=my_pagination>$lpm1</a>";

				$pagination.= "<a href=\"view_purchase.php?page=$lastpage&limit=$limit\" class=my_pagination>$lastpage</a>";		

			}

			//in middle; hide some front and some back

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

			{

				$pagination.= "<a href=\"view_purchase.php?page=1&limit=$limit\" class=my_pagination>1</a>";

				$pagination.= "<a href=\"view_purchase.php?page=2&limit=$limit\" class=my_pagination>2</a>";

				$pagination.= "...";

				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span  class=my_pagination>$counter</span>";

					else

						$pagination.= "<a href=\"view_purchase.php?page=$counter&limit=$limit\" class=my_pagination>$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"view_purchase.php?page=$lpm1&limit=$limit\" class=my_pagination>$lpm1</a>";

				$pagination.= "<a href=\"view_purchase.php?page=$lastpage&limit=$limit\" class=my_pagination>$lastpage</a>";		

			}

			//close to end; only hide early pages

			else

			{

				$pagination.= "<a href=\"$view_purchase.php?page=1&limit=$limit\" class=my_pagination>1</a>";

				$pagination.= "<a href=\"$view_purchase.php?page=2&limit=$limit\" class=my_pagination>2</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=my_pagination >$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\" class=my_pagination>$counter</a>";					

				}

			}

		}

		

		//next button

		if ($page < $counter - 1) 

			$pagination.= "<a href=\"view_purchase.php?page=$next&limit=$limit\" class=my_pagination>Next</a>";

		else

			$pagination.= "<span class= my_pagination >Next</span>";

		$pagination.= "</div>\n";		

	}

?>	
							<tr>
								<th>No</th>								
								<th>Stock Id</th>
                                                                <th>Stock Name</th>
								<th>Date</th>							
								<th>Supplier</th>
								<th>Quantity</th>
                                <th>Amount</th>
								<th>Edit /Delete</th>
                                                                <th>Select</th>
                                                                 <th>Print</th>
                                                                <td></td>
							</tr>
										
<?php $i=1; $no=$page-1; $no=$no*$limit;	

while($row = mysql_fetch_array($result))

		{

			$entryid=$row['stock_id'];
			
			
			$line = $db->queryUniqueObject("SELECT * FROM stock_entries WHERE  stock_id='$entryid'");
			
			$mysqldate=$line->date;

 		$phpdate = strtotime( $mysqldate );

 		$phpdate = date("d/m/Y",$phpdate);
								 ?>
                                 
  			
                                 
 									<tr>
                                              <td><?php echo $no+$i; ?></td>

       	<td width="100"><?php echo $line->stock_id; ?></td>
       	<td width="100"><?php echo $line->stock_name; ?></td>


        <td width="100"><?php echo $phpdate; ?></td>

        <td width="100"><?php echo $line->stock_supplier_name 	; ?></td>
         <td width="100"><?php echo $line->quantity; ?></td>
        <td width="100"><?php echo $line->total; ?></td>
  

    <td>	<a href="update_purchase.php?sid=<?php echo $entryid;?>&table=stock_entries&return=view_purchase.php"	class="table-actions-button ic-table-edit">
	</a>


<a  href="javascript:confirmSubmit(<?php echo $line->id;?>,'stock_entries','view_purchase.php')" class="table-actions-button ic-table-delete"></a>		
    </td>
	<td><input type="checkbox" value="<?php echo $line->id; ?>" name="checklist[]" id="check_box" /></td>
    <td><a href=purchase_invoice.php?purchaseid=<?php echo $row['stock_id'];?> target="_blank"> Print</a>
    </td>
      
</tr>
<?php $i++;  } ?>
 <tr>

       <td align="center"><div style="margin-left:20px;"><?php echo $pagination; ?></div></td>

      </tr>
</table>
</form>
				
				
		</div> 
	</div> 
		<div id="footer">
		<p> &copy;Copyright 2013</p>	
	</div> <!-- end footer -->

</body>
</html>