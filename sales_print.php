<?php
include_once("init.php"); // Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{


	error_reporting (E_ALL ^ E_NOTICE);

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
<?php   
				  $max = $db->maxOfAll("id", "stock_sales");
					 $result1 = $db->query("SELECT * FROM stock_sales where  id = '$max' ");
while ($line1 = mysql_fetch_array($result1)) 
{
	 $transaction_id =  $line1['transactionid'];
	}
					//  $max=$max+1;
					 // $autoid="SD".$max."";
		   ?>
         
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="">
        <div align="left">
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
          <td height="30" align="center"><strong>Sale Report</strong></td>
        </tr>
       
          </table></td>
       
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td height="20" align="left">
          			  <?php 
			  $result = $db->query("SELECT * FROM stock_sales where  transactionid = '$transaction_id' ");
 $line = mysql_fetch_array($result) ;
   $line['date'];
?>
<table >
<td align="left"> Date <?php echo $line['date'];?></td>     <td>&nbsp;</td> <td align="center">Customer:<?php echo $line['customer_id'] ?></td> 
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>SaleID:<?php echo $line['transactionid']; ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right">BillNumber<?php echo $line['billnumber'] ?></td> 
    </table>      
          <!--<table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="45"><strong>From</strong></td>
                <td width="393">&nbsp;<?php  //echo $_GET['from_purchase_date']; ?></td>
                <td width="41"><strong>To</strong></td>
                <td width="116">&nbsp;<?php // echo $_GET['to_purchase_date']; ?></td>
              </tr>
          </table>--></td>
        </tr>
        <tr>
          <td width="45"><hr></td>
        </tr>
        <tr>
          <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                
              	<td><strong>SrNo </strong></td>
               
                <td><strong>Product</strong></td>
                <td><strong>Quantity</strong></td>
                <td><strong>Unit Price</strong></td>
                <td><strong>Sub Total</strong></td>
               
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
			  $result = $db->query("SELECT * FROM stock_sales where  transactionid = '$transaction_id' ");
			  	 $s =1;
while ($line = mysql_fetch_array($result)) {

?>
			
				<tr>
                
               
               <td><?php echo $s ?></td>
                
                <td><?php echo $line['stock_name'] ?></td>
                <td><?php echo $line['quantity'] ?></td>
                <td><?php echo $line['selling_price'] ?></td>
                <td><?php echo $line['amount'] ?></td>
                
               
              </tr>
			  
                
                
                
                

<?php
$s=$s+1;
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
<table>
<tr>
              <td width="150"><strong>Total</strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(grand_total) FROM stock_sales where count1=1 AND transactionid = '$transaction_id' ");?></td>
            </tr>
             <tr>
              <td width="150"><strong>Discount </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(dis_amount) FROM stock_sales where count1=1 AND transactionid = '$transaction_id' ");?></td>
            </tr>
            <tr>
              <td><strong>Paid Amount</strong></td>
              <td>&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(payment) FROM stock_sales where count1=1  AND transactionid = '$transaction_id' ");?></td>
            </tr>
           
            <tr>
              <td width="150"><strong>Pending Payment </strong></td>
              <td width="150">&nbsp;<?php echo  $age = $db->queryUniqueValue("SELECT sum(balance) FROM stock_sales where count1=1 AND transactionid = '$transaction_id' ");?></td>
            </tr>
          </table></td>
        </tr>
        <tr>
        
          <td width="45"><hr></td>
        </tr>
</table>
<footer>

<p align="center"> Software Developed By: <strong>Ahsan Riaz</strong> </br>
Email:ahsanriaz26@gmail.com</p>
</footer>
</body>
</html>
<?php
}
?>