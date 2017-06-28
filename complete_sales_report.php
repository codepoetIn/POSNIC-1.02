<?php
include_once("init.php");// Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
 if( isset($_GET['start_date']) && isset($_GET['end_date']) && $_GET['start_date']!='' && $_GET['end_date']!=''&& isset($_GET['product_name']) && $_GET['product_name']!='' && isset($_GET['customer_name'])  && $_GET['customer_name']!='' 	||
  isset($_GET['start_date']) && isset($_GET['end_date']) && $_GET['start_date']!='' && $_GET['end_date']!=''  ||
  isset($_GET['product_name']) && $_GET['product_name']!='' ||
  isset($_GET['customer_name'])  && $_GET['customer_name']!='' ||
 isset($_GET['start_date']) && isset($_GET['end_date']) && $_GET['start_date']!='' && $_GET['end_date']!=''   
 && isset($_GET['product_name']) && $_GET['product_name']!='' 									||
  isset($_GET['start_date']) && isset($_GET['end_date']) && $_GET['start_date']!='' && $_GET['end_date']!='' && isset($_GET['customer_name'])  && $_GET['customer_name']!=''   )
{

	error_reporting (E_ALL ^ E_NOTICE);
		$selected_date=$_GET['start_date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );
$startdate=$mysqldate;
			$selected_date=$_GET['end_date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );

$enddate=$mysqldate;
			$product_name=$_GET['product_name'];
			$customer_name=$_GET['customer_name'];
		  	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sale Report</title>
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
          <td height="30" align="center"><strong>Sales Report </strong></td>
        </tr>
       
        <tr>
        <?php
			/* when customer name not entered code starts from heree*/
		 if( $customer_name == ''   && $product_name != '' && $startdate != '' && $enddate != '' ){
		?>
        <td align="right"><table width="300" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="150"><strong>Total Sales </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(subtotal) FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'   AND stock_name='$product_name'  ");?></td>
            </tr>
            <tr>
              <td><strong>Received Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'   AND stock_name='$product_name'  ");?></td>
            </tr>
            <tr>
              <td width="150"><strong>Total OutStanding </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'   AND stock_name='$product_name' ");?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td ><hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td  width="20%"><strong>Product Name</strong></td>
                <td width="20%"><?php echo $_GET['product_name']; ?></td>
               <td width="10%"><strong>TO</strong></td>
               <td width="20%"><?php echo $_GET['start_date']; ?></td>
               <td width="10%"><strong>From</strong> </td>
               <td width="20%"><?php echo $_GET['end_date']; ?></td>
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
                <td><strong>Sales ID </strong></td>
                <td><strong>Product Name </strong></td>
                <td><strong>Customer</strong></td>
                <td><strong>Quantity</strong></td>
                <td><strong>Paid</strong></td>
                
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
			  $result = $db->query("SELECT * FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'   AND stock_name='$product_name' ");
		/*  CODE END WHEN CUSTOMER NAME NOT ENTERED*/
		 }
		 
		 /*CODE STARTS WHEN PRODUCT NAME NOT ENTERED*/ 
		else if( $product_name == '' && $customer_name != ''  && $startdate != '' && $enddate != '' ){ 
		?>   
          <td align="right"><table width="300" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="150"><strong>Total Sales </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(subtotal) FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'  AND customer_id='$customer_name'   ");?></td>
            </tr>
            <tr>
              <td><strong>Received Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'  AND customer_id='$customer_name'   ");?></td>
            </tr>
            <tr>
              <td width="150"><strong>Total OutStanding </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'  AND customer_id='$customer_name' ");?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td ><hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td  width="20%"><strong>Customer Name</strong></td>
                <td width="20%"><?php echo $_GET['customer_name']; ?></td>
               <td width="10%"><strong>TO</strong></td>
               <td width="20%"><?php echo $_GET['start_date']; ?></td>
               <td width="10%"><strong>From</strong> </td>
               <td width="20%"><?php echo $_GET['end_date']; ?></td>
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
                <td><strong>Sales ID </strong></td>
                <td><strong>Product Name </strong></td>
                <td><strong>Customer</strong></td>
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
			  $result = $db->query("SELECT * FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'  AND customer_id='$customer_name'  ");
	   }
		/*	CODE END WHEN PRODUCT NAME NOT ENTERED*/
		
		/* CODE STARTS WHEN ALL FIELDS WERE FILLLLLED*/
	   
		  else if($customer_name != '' && $product_name != '' && $startdate != '' && $enddate != ''){ ?>   
          <td align="right"><table width="300" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="150"><strong>Total Sales </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(subtotal) FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'  AND customer_id='$customer_name' AND stock_name='$product_name'  ");?></td>
            </tr>
            <tr>
              <td><strong>Received Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'  AND customer_id='$customer_name' AND stock_name='$product_name'  ");?></td>
            </tr>
            <tr>
              <td width="150"><strong>Total OutStanding </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'  AND customer_id='$customer_name' AND stock_name='$product_name' ");?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td ><hr></td>
        </tr>
        <tr>
          <td height="20"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td  width="15%"><strong>Customer Name</strong></td>
                <td width="15%"><?php echo $_GET['customer_name']; ?></td>
                <td  width="15%"><strong>Product Name</strong></td>
                <td width="15%"><?php echo $_GET['product_name']; ?></td>
               <td width="0%"><strong>TO</strong></td>
               <td width="15%"><?php echo $_GET['start_date']; ?></td>
               <td width="10%"><strong>From</strong> </td>
               <td width="15%"><?php echo $_GET['end_date']; ?></td>
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
                <td><strong>Sales ID </strong></td>
                <td><strong>Product Name </strong></td>
                <td><strong>Customer</strong></td>
                <td><strong>Quantity</strong></td>
                <td><strong>Paid</strong></td>
                
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
			  $result = $db->query("SELECT * FROM stock_sales where count1=1 AND date BETWEEN '$startdate' AND '$enddate'  AND customer_id='$customer_name' AND stock_name='$product_name' ");
	   }
	   ?>
    
	<?php		  
while ($line = $db->fetchNextObject($result)) {
?>
			
				<tr>
                <td><?php  $mysqldate=$line->date;
 		$phpdate = strtotime( $mysqldate );
 		$phpdate = date("d/m/Y",$phpdate);
		echo $phpdate; ?></td>
                <td><?php echo $line->transactionid; ?></td>
                 <td><?php echo $line->stock_name; ?></td>
                <td><?php echo $line->customer_id; ?></td>
                <td><?php echo $line->quantity; ?></td>
                <td><?php echo $line->payment; ?></td>
                
                <td><?php echo $line->subtotal; ?></td>
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

<p align="center"> Software Developed By: <strong>Ahsan Riaz</strong> </br>
Email:ahsanriaz26@gmail.com</p>

</footer>
</html>
<?php

}

else
echo "Please from and to date to process report";
}
?>