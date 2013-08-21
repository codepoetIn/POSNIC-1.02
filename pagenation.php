<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	 
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>


	
	<script src="js/script.js"></script>  
		
		<?php 



$SQL = "SELECT * FROM  customer_details";
if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
{

$SQL = "SELECT * FROM  customer_details WHERE customer_name LIKE '%".$_POST['searchtxt']."%' OR customer_address LIKE '%".$_POST['searchtxt']."%' OR customer_contact1 LIKE '%".$_POST['searchtxt']."%' OR customer_contact2 LIKE '%".$_POST['searchtxt']."%'";


}

	$tbl_name="customer_details";		//your table name

	// How many adjacent pages should be shown on each side?

	$adjacents = 3;

	

	/* 

	   First get total number of rows in data table. 

	   If you have a WHERE clause in your query, make sure you mirror it here.

	*/

	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
{

$query = "SELECT COUNT(*) as num FROM  customer_details WHERE customer_name LIKE '%".$_POST['searchtxt']."%' OR customer_address LIKE '%".$_POST['searchtxt']."%' OR customer_contact1 LIKE '%".$_POST['searchtxt']."%' OR customer_contact2 LIKE '%".$_POST['searchtxt']."%'";


}


	$total_pages = mysql_fetch_array(mysql_query($query));

	$total_pages = $total_pages[num];

	

	/* Setup vars for query. */

	$targetpage = "view_supplier_details.php"; 	//your file name  (the name of this file)

	$limit = 10; 								//how many items to show per page
if(isset($_GET['limit']))
	$limit=$_GET['limit'];
	

	$page = $_GET['page'];

	if($page) 

		$start = ($page - 1) * $limit; 			//first item to display on this page

	else

		$start = 0;								//if no page var is given, set start to 0

	

	/* Get data. */

	$sql = "SELECT * FROM customer_details LIMIT $start, $limit ";
	if(isset($_POST['Search']) AND trim($_POST['searchtxt'])!="")
{

	$sql= "SELECT * FROM  customer_details WHERE customer_name LIKE '%".$_POST['searchtxt']."%' OR customer_address LIKE '%".$_POST['searchtxt']."%' OR customer_contact1 LIKE '%".$_POST['searchtxt']."%' OR customer_contact2 LIKE '%".$_POST['searchtxt']."%'  LIMIT $start, $limit";


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

		$pagination .= "<div class=\"pagination\">";

		//previous button

		if ($page > 1) 

			$pagination.= "<a href=\"$targetpage?page=$prev&limit=$limit\">« previous</a>";

		else

			$pagination.= "<span class=\"disabled\">« previous</span>";	

		

		//pages	

		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up

		{	

			for ($counter = 1; $counter <= $lastpage; $counter++)

			{

				if ($counter == $page)

					$pagination.= "<span class=\"current\">$counter</span>";

				else

					$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

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

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";		

			}

			//in middle; hide some front and some back

			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

			{

				$pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";

				$pagination.= "...";

				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

				}

				$pagination.= "...";

				$pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";

				$pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";		

			}

			//close to end; only hide early pages

			else

			{

				$pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";

				$pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";

				$pagination.= "...";

				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

				{

					if ($counter == $page)

						$pagination.= "<span class=\"current\">$counter</span>";

					else

						$pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";					

				}

			}

		}

		

		//next button

		if ($page < $counter - 1) 

			$pagination.= "<a href=\"$targetpage?page=$next&limit=$limit\">next »</a>";

		else

			$pagination.= "<span class=\"disabled\">next »</span>";

		$pagination.= "</div>\n";		

	}

?>

</head>
<body>
	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<div id="header-with-tabs">
		<div class="page-full-width cf">
			<ul id="tabs" class="fl">
				<li><a href="dashboard.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="page-full-width.php" class="sales-tab">Sales</a></li>
				<li><a href="page-full-width.php" class="active-tab customers-tab">Customers</a></li>
				<li><a href="page-other.php" class="purchase-tab">Purchase</a></li>
				<li><a href="page-other.php" class="supplier-tab">Supplier</a></li>
				<li><a href="page-other.php" class="stock-tab">Stocks / Products</a></li>
				<li><a href="page-other.php" class="payment-tab">Payments / Outstandings</a></li>
				<li><a href="page-other.php" class="report-tab">Reports</a></li>
			</ul> 
			<a href="#" id="company-branding-small" class="fr"><img src="images/posnic.png" alt="Point of Sale" /></a>
			
		</div> 

	</div> 
	<div id="content">
		<div class="page-full-width cf">
			<div class="side-menu fl">	
				<h3>Customers Management</h3>
				<ul>
					<li><a href="add_customer.php">Add Customer</a></li>
					<li><a href="view_customers.php">View Customers</a></li>
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Add Customer</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>

		<form action="" method="get" name="page">
Page per Record<input name="limit" type="text"  style="margin-left:5px;" value="<?php if(isset($_GET['limit'])) echo $_GET['limit']; else echo "10"; ?>" size="3" maxlength="3">
<input name="go" type="submit" value="Go">
</form>
					
					
					<form name="deletefiles" action="delete.php" method="post">
					<table>
		
		<?php	
		$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("stock", $con);

$sql="SELECT * FROM customer_details" ;

$result = mysql_query($sql); 
?>
							<tr>
								<th>id</th>
								<th >customer_name</th>
								<th>customer_contact1</th>
								<th>customer_contact2</th>
								<th>balance</th>
								<th>edit /delete</th>
								<th>Select</th>
							</tr>
						

						
<?php	while($row = mysql_fetch_array($result)) 
{
 ?> 
	<tr>
   <td> <?php echo $row['id']; ?></td>

   <td><?php echo $row['customer_name']; ?></td>
   <td> <?php echo $row['customer_contact1']; ?></td>
   <td><?php echo $row['customer_contact2']; ?></td>
   <td> <?php echo $row['balance'];?></td>;
    <td>	<a href="update_customer_details.php?sid=<?php echo $row['id'];?>&table=customer_details&return=view_customers.php"	class="table-actions-button ic-table-edit">
	</a>
	<a onclick="return confirmSubmit()" href="delete.php?id=<?php echo $row['id'];?>&table=customer_details&return=view_customers.php" class="table-actions-button ic-table-delete"></a>
	</td>
	<td><input type="checkbox" value="<?php echo $row['id']; ?>" name="checklist[]" /></td>

</tr>
<?php } ?>
</table>
</form>
				<?php mysql_close($con); ?>
				
		</div> 
	</div> 
		<div id="footer">
		<p>Any Queries email to <a href="mailto:sridharkalaibala@gmail.com?subject=Stock%20Management%20System">sridharkalaibala@gmail.com</a>.</p>
	
	</div> <!-- end footer -->

</body>
</html>