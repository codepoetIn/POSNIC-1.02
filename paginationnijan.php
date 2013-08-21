<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Add Customer</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>

<style type="text/css">

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}

*{
padding: 0px;
margin: 0px;
}
#vertmenu {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 100%;
width: 160px;
padding: 0px;
margin: 0px;
}

#vertmenu h1 {
display: block;
background-color:#FF9900;
font-size: 90%;
padding: 3px 0 5px 3px;
border: 1px solid #000000;
color: #333333;
margin: 0px;
width:159px;
}

#vertmenu ul {
list-style: none;
margin: 0px;
padding: 0px;
border: none;
}
#vertmenu ul li {
margin: 0px;
padding: 0px;
}
#vertmenu ul li a {
font-size: 80%;
display: block;
border-bottom: 1px dashed #C39C4E;
padding: 5px 0px 2px 4px;
text-decoration: none;
color: #666666;
width:160px;
}

#vertmenu ul li a:hover, #vertmenu ul li a:focus {
color: #000000;
background-color: #eeeeee;
}
.style1 {color: #000000}
div.pagination {

	padding: 3px;

	margin: 3px;

}



div.pagination a {

	padding: 2px 5px 2px 5px;

	margin: 2px;

	border: 1px solid #AAAADD;

	

	text-decoration: none; /* no underline */

	color: #000099;

}

div.pagination a:hover, div.pagination a:active {

	border: 1px solid #000099;



	color: #000;

}

div.pagination span.current {

	padding: 2px 5px 2px 5px;

	margin: 2px;

		border: 1px solid #000099;

		

		font-weight: bold;

		background-color: #000099;

		color: #FFF;

	}

	div.pagination span.disabled {

		padding: 2px 5px 2px 5px;

		margin: 2px;

		border: 1px solid #EEE;

	

		color: #DDD;

	}
 
</style>
	<script LANGUAGE="JavaScript">


// Nannette Thacker http://www.shiningstar.net
function confirmSubmit()
{
var agree=confirm("Are you sure you wish to Delete this Entry?");
if (agree)
	return true ;
else
	return false ;
}

function confirmDeleteSubmit()
{
var agree=confirm("Are you sure you wish to Delete Seletec Record?");
if (agree)
	
document.deletefiles.submit();
else
	return false ;
}


function checkAll()
{
var field=document.forms.deletefiles;
for ( var i = 0; i < field.length; i++)
	field[i].checked = true ;
}

function uncheckAll()
{
	var field=document.forms.deletefiles;
for (var i = 0; i < field.length; i++)
	field[i].checked = false ;
}
// -->
</script>
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
				address: {
					minlength: 3,
					maxlength: 500
				},
				contact1: {
					minlength: 3,
					maxlength: 20
				},
				contact2: {
					minlength: 3,
					maxlength: 20
				}
			},
			messages: {
				name: {
					required: "Please enter a Customer Name",
					minlength: "Customer must consist of at least 3 characters"
				},
				address: {
					minlength: "Customer Address must be at least 3 characters long",
					maxlength: "Customer Address must be at least 3 characters long"
				}
			}
		});
	
	});

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
				<li><a href="page-full-width.php" class="sales-tab">Sales</a></li>
				<li><a href="page-full-width.php" class="active-tab customers-tab">Customers</a></li>
				<li><a href="page-other.php" class="purchase-tab">Purchase</a></li>
				<li><a href="page-other.php" class="supplier-tab">Supplier</a></li>
				<li><a href="page-other.php" class="stock-tab">Stocks / Products</a></li>
				<li><a href="page-other.php" class="payment-tab">Payments / Outstandings</a></li>
				<li><a href="page-other.php" class="report-tab">Reports</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/posnic.png" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	<!-- MAIN CONTENT -->
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
    <td><form action="" method="post" name="search" >
<input name="searchtxt" type="text"> 
&nbsp;&nbsp;<input name="Search" type="submit" value="Search">
</form></td>
		<form action="" method="get" name="page">
Page per Record<input name="limit" type="text"  style="margin-left:5px;" value="<?php if(isset($_GET['limit'])) echo $_GET['limit']; else echo "10"; ?>" size="3" maxlength="3">
<input name="go" type="submit" value="Go">
<input type="button" name="selectall" value="SelectAll" onClick="checkAll()"  style="margin-left:5px;"/>
<input type="button" name="unselectall" value="DeSelectAll" onClick="uncheckAll()" style="margin-left:5px;" />
<input name="dsubmit" type="button" value="Delete Selected" style="margin-left:5px;" onclick="return confirmDeleteSubmit()"/></form>
					
					
					<form name="deletefiles" action="delete.php" method="post">
					<table><?php 
		$con = mysql_connect('localhost', 'root', '');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("stock", $con);




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
echo"$total_pages";
	

	/* Setup vars for query. */

	$targetpage = "paginationnijan.php"; 	//your file name  (the name of this file)

	$limit = 10; 								//how many items to show per page
if(isset($_GET['limit']))
	$limit=$_GET['limit'];
	

	$page = $_GET['page'];
	echo"page";

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
		
	 
							<tr>
								<th>id</th>
								<th >customer_name</th>
								<th>customer_contact1</th>
								<th>customer_contact2</th>
								<th>balance</th>
								<th>Select</th>
							</tr>
						

						
</div></td>
<?php	while($row = mysql_fetch_array($result)) 
{
 ?> 
	<tr>
   <td> <?php echo $row['id']; ?></td>

   <td><?php echo $row['customer_name']; ?></td>
   <td> <?php echo $row['customer_contact1']; ?></td>
   <td><?php echo $row['customer_contact2']; ?></td>
   <td> <?php echo $row['balance'];?></td>;
	<td><input type="checkbox" value="<?php echo $row['id']; ?>" name="checklist[]" /></td>

</tr>


      </tr>
<?php } ?>
</table>
  <tr>

        <td align="center"><div style="margin-left:20px;"><div class="pagination"><a href="paginationnijan.php?page=4&limit=1">« previous</a><a href="paginationnijan.php?page=1&limit=1">1</a><a href="paginationnijan.php?page=2&limit=1">2</a><a href="paginationnijan.php?page=3&limit=1">3</a><a href="paginationnijan.php?page=4&limit=1">4</a>5<a href="paginationnijan.php?page=6&limit=1">6</a><a href="paginationnijan.php?page=7&limit=1">7</a><a href="paginationnijan.php?page=8&limit=1">8</a><a href="paginationnijan.php?page=6&limit=1">next »</a></div>
</div></td>

      </tr>

      <tr>
</form>
				<?php mysql_close($con); ?>

				
		</div> 
	</div> 
		<div id="footer">
		<p>Any Queries email to <a href="mailto:sridharkalaibala@gmail.com?subject=Stock%20Management%20System">sridharkalaibala@gmail.com</a>.</p>
	
	</div> <!-- end footer -->

</body>
</html>