<?php
include_once("init.php");// Use session variable on this page. This function must put on the top of page.

			
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
          <div align="left">
                      <?php $line4 = $db->queryUniqueObject("SELECT * FROM store_details ");
				 ?>
                  <strong><?php echo $line4->name; ?></strong><br />
                  <?php echo $line4->address; ?>,<?php echo $line4->place; ?>, <br />
                  <?php echo $line4->city; ?>,<?php echo $line4->pin; ?><br/>
                  Website<strong>:<?php echo $line4->web; ?></strong><br>Email<strong>:<?php echo $line4->email; ?></strong><br />Phone
                      <strong>:<?php echo $line4->phone; ?></strong>
                  <br />
                  <?php ?>
               Bill Number:&nbsp;<?php echo $_GET['bill_no'];  ?>
                   <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
       
        <tr>
          <td height="10" align="center"><strong>Sales Invoice </strong></td>
        </tr>
        <tr>
          <td height="30" align="center">&nbsp;</td>
        </tr>
        
          </table>
          </div>
          </td>
        </tr>
        <tr>
          <td width="100"><hr></td>
        </tr>
       
        
        
          </table></td>
        </tr>
        
        <tr>
          <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
              
                <td><strong>Date </strong></td>
                <td><strong>Bill No.</strong></td>
                <td><strong>Customer Name</strong></td>
                <td><strong>Address</strong></td>
                <td><strong>Contact No.</strong></td>
                <td><strong>item</strong></td>
                <td><strong>Quantity</strong></td>
				<td><strong>Price</strong></td>
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
			 
			
				<tr>
               
               
                <?php 
				include_once("init.php");
				$query = "SELECT max(id) From stock_sales";
		  $rs = mysql_query($query);
		  $row = mysql_fetch_array($rs);
		echo  $id = $row['max(id)'] ;
				
				
				$stiock = $_GET['stockid'];
			  $result ("SELECT * FROM stock_sales where billnumber=$stiock ");
 {
?>
			
				<tr>
                <td><?php  $mysqldate=$line->date;
 		$phpdate = strtotime( $mysqldate );
 		$phpdate = date("d/m/Y",$phpdate);
		echo $phpdate; ?></td>
                <td><?php echo $line->transactionid; ?></td>
                <td><?php echo $line->customer_id; ?></td>
                 <td><?php echo $line->quantity; ?></td>
                <td><?php echo $line->payment; ?></td>
                <td><?php echo $line->balance; ?></td>
                <td><?php echo $line->subtotal; ?></td>
              </tr>
			  	

<?php
}
			  ?>
        
        
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
       <tr>
          <td width="100"><hr></td>
        </tr>
        
</table>
<tr>
         <table>
          <td align="left">
         
            <tr>
              <td width="150"><strong>Discount Amount</strong></td> 
               <td width="150"><?php echo   $_GET['dis_amount'];?></td>
            </tr>
            <tr>
              <td width="150"><strong>Grand Total</strong></td>
             
                <td><?php echo   $_GET['payment'];?></td>
                
              
            </tr>
            <tr>
             <td width="150"><strong>Payment</strong></td>
			 <td width="150"><?php echo   $_GET['payment'];?></td>
                          </tr>
          </td>
        </tr>
</table>
</body>
</html>

