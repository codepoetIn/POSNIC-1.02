<?php
include_once("init.php"); // Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
if(isset($_GET['start_date']) && isset($_GET['end_date']) && $_GET['start_date']!='' && $_GET['end_date']!='' && isset($_GET['product_name']) && $_GET['product_name']!='' && isset($_GET['supplier_name']) && $_GET['supplier_name']!='' ||
isset($_GET['start_date']) && isset($_GET['end_date']) && $_GET['start_date']!='' && $_GET['end_date']!='' && isset($_GET['product_name']) && $_GET['product_name']!='' ||
isset($_GET['start_date']) && isset($_GET['end_date']) && $_GET['start_date']!='' && $_GET['end_date']!='' && isset($_GET['supplier_name']) && $_GET['supplier_name']!='' )
{

	error_reporting (E_ALL ^ E_NOTICE);
			$selected_date=$_GET['start_date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );
$fromdate=$mysqldate;
			$selected_date=$_GET['end_date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );
$todate=$mysqldate;
			$product_name=$_GET['product_name'];
			$supplier_name=$_GET['supplier_name'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Purchase Report</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style type="text/css" media="print">
.hide{display:none}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}
</script>
<body>
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
        <div align="right">
                      <?php $line4 = $db->queryUniqueObject("SELECT * FROM store_details ");
				 ?>
                  <strong><?php echo $line4->name; ?></strong><br />
                  <?php echo $line4->address; ?><br/>
                  
             Phone<strong>:<?php echo $line4->phone; ?></strong>
                  <br />
                  <?php ?>
              </div>
      <table width="595" border="0" cellspacing="0" cellpadding="0">
       
        <tr>
          <td height="30" align="center"><strong>Purchase Report</strong></td>
        </tr>
        
        <tr>
          <td align="right"><table width="500" border="0" cellspacing="0" cellpadding="0">
            <?php 
			/*WHEN SUPPLIER NAME NOT ENERED CODE STARTS*/
			 if ( $fromdate !='' && $todate !='' && $product_name != '' && $supplier_name == ''){  ?>
			<tr>
              <td width="150"><strong>Total Purchase</strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(subtotal) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_name='$product_name'  ");?></td>
            </tr>
            <tr>
              <td><strong>Paid Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_name='$product_name'  ");?></td>
            </tr>
            <tr>
              <td width="150"><strong>Pending Payment </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_name='$product_name'  ");?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><hr width="125%"></td>
        </tr>
        <tr>
          <td height="20"><table width="150%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
               	<td width="25%"><strong>Product Name</strong></td>
                <td width="25%">&nbsp;<?php echo $_GET['product_name']; ?></td>
                <td width="10%"><strong>From</strong></td>
                <td width="15%">&nbsp;<?php echo $_GET['start_date']; ?></td>
                <td width="10%"><strong>To</strong></td>
                <td width="15%">&nbsp;<?php echo $_GET['end_date']; ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td><hr width="125%"></td>
        </tr>
        <tr>
          <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><strong>Date</strong></td>
                <td><strong>Purchase ID </strong></td>
                <td><strong>Product</strong></td>
                <td><strong>Supplier</strong></td>
                <td><strong>Paid</strong></td>
                <td><strong>Balance</strong></td>
                <td><strong>Total</strong></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php 
			  $result = $db->query("SELECT * FROM stock_entries where  type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_name='$product_name'  ");
				}
			/*WHEN SUPPLIER NAME NOT ENTERED CODE END */	
			
			/* WHEN PRODUCT NAME NOT ENETERED CODE STARTS*/
			else if ( $fromdate !='' && $todate !='' && $product_name == '' && $supplier_name != ''){  ?>
			<tr>
              <td width="150"><strong>Total Purchase</strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(subtotal) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate'  AND stock_supplier_name='$supplier_name' ");?></td>
            </tr>
            <tr>
              <td><strong>Paid Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate'  AND stock_supplier_name='$supplier_name' ");?></td>
            </tr>
            <tr>
              <td width="150"><strong>Pending Payment </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_supplier_name='$supplier_name' ");?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td ><hr width="125%"></td>
        </tr>
        <tr>
          <td height="20"><table width="125%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
               	<td width="25%"><strong>Supplier Name</strong></td>
                <td width="25%">&nbsp;<?php echo $_GET['supplier_name']; ?></td>
                <td width="10%"><strong>From</strong></td>
                <td width="15%">&nbsp;<?php echo $_GET['start_date']; ?></td>
                <td width="10%"><strong>To</strong></td>
                <td width="15%">&nbsp;<?php echo $_GET['end_date']; ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><strong>Date</strong></td>
                <td><strong>Purchase ID </strong></td>
                <td><strong>Product</strong></td>
                <td><strong>Supplier</strong></td>
                <td><strong>Paid</strong></td>
                <td><strong>Balance</strong></td>
                <td><strong>Total</strong></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php 
			  $result = $db->query("SELECT * FROM stock_entries where  type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_supplier_name='$supplier_name' ");
						}
			/*WHEN SUPPLIER NAME NOT ENTERED CODE END*/			
			
			/* WHEN ALL VALUES ARE FILLLED*/
			else if ( $fromdate !='' && $todate !='' && $product_name != '' && $supplier_name != ''){  ?>
			<tr>
              <td width="150"><strong>Total Purchase</strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(subtotal) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_name='$product_name' AND stock_supplier_name='$supplier_name' ");?></td>
            </tr>
            <tr>
              <td><strong>Paid Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_name='$product_name' AND stock_supplier_name='$supplier_name' ");?></td>
            </tr>
            <tr>
              <td width="150"><strong>Pending Payment </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_entries where count1=1 AND type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_name='$product_name' AND stock_supplier_name='$supplier_name' ");?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
               	<td width="15%"><strong>Supplier Name</strong></td>
                <td width="15%">&nbsp;<?php echo $_GET['supplier_name']; ?></td>
                <td width="15%"><strong>Product Name</strong></td>
                <td width="15%">&nbsp;<?php echo $_GET['product_name']; ?></td>
                <td width="5%"><strong>From</strong></td>
                <td width="15%">&nbsp;<?php echo $_GET['start_date']; ?></td>
                <td width="5%"><strong>To</strong></td>
                <td width="15%">&nbsp;<?php echo $_GET['end_date']; ?></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table width="125%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><strong>Date</strong></td>
                <td><strong>Purchase ID </strong></td>
                <td><strong>Product</strong></td>
                
                <td><strong>Quantity</strong></td>
                <td><strong>Product Total</strong></td>
                
                <td><strong>Total Bill</strong></td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php 
			  $result = $db->query("SELECT * FROM stock_entries where  type='entry' AND date BETWEEN '$fromdate' AND '$todate' AND stock_name='$product_name' AND stock_supplier_name='$supplier_name' ");
				}?>
   <?php
while ($line = mysql_fetch_array($result)) {
?>
				<tr>
                <td><?php echo $line['date']; ?></td>
                <td><?php echo $line['stock_id']; ?></td>
                <td><?php echo $line['stock_name'] ?></td>
               
                 <td><?php echo $line['quantity'] ?></td>
                <td><?php echo $line['total'] ?></td>
               
                <td><?php echo $line['subtotal'] ?></td>
              </tr>
			  	

<?php
}
			  ?>
          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>

</body>
<footer>

<p align="center"> Software Developed By: <strong>PGSOFT</strong> </br>
www.pgsoft.com &nbsp; E-mail : support@pgsoft.com</p>
</footer>
</html>
<?php
}
else
echo "Please from and to date to process report";
}
?>