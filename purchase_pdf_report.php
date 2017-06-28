<?php
include_once("init.php");// Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username']) || $_SESSION['usertype'] !='admin'){ // if session variable "username" does not exist.
header("location:index.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}
else
{
if($_GET['supplier']!='' && $_GET['bill_no']!= ''  )
{

			error_reporting (E_ALL ^ E_NOTICE);
			
			$stockid=$_GET['stockid'];
			$selected_date=$date=$_GET['date'];	
			$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );
			$date=$mysqldate;		
			$bill_no=$_GET['bill_no'];
			$supplier=$_GET['supplier'];
			$address=$_GET['address'];
			$contact=$_GET['contact'];
			$item=$_GET['stock_name[]'];
			$quty=$_GET['quty[]'];
			$cost=$_GET['cost[]'];
			$sell=$_GET['sell[]'];
			$total=$_GET['jibi[]'];
			$payment=$_GET['payment'];
			$grand_total=$_GET['grand_total'];
			$duedate=$_GET['duedate'];
			$description=$_GET['description'];
			
			
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Purchase Invoice</title>
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
                  <?php echo $line4->address; ?>,<?php echo $line4->place; ?>, <br />
                  <?php echo $line4->city; ?>,<?php echo $line4->pin; ?><br/>
                  Website<strong>:<?php echo $line4->web; ?></strong><br>Email<strong>:<?php echo $line4->email; ?></strong><br />Phone
                      <strong>:<?php echo $line4->phone; ?></strong>
                  <br />
                  <?php ?>
                   <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
       
        <tr>
          <td height="10" align="center"><strong>Purchase Invoice </strong></td>
        </tr>
        <tr>
          <td height="30" align="center">&nbsp;</td>
        </tr>
        
          </table>
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
                <td><strong>Stock ID</strong></td>
                <td><strong>Date </strong></td>
                <td><strong>Bill No.</strong></td>
                <td><strong>Customer Name</strong></td>
                <td><strong>Address</strong></td>
                <td><strong>Contact No.</strong></td>
                <td><strong>item</strong></td>
                <td><strong>Quantity</strong></td>
				<td><strong>Cost Price</strong></td>
                <td><strong>Selling Price</strong></td>
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
                <td><?php echo $_GET['stockid']; ?></td>
                <td><?php echo$_GET['date'] ?></td>
                <td><?php echo $_GET['bill_no'];  ?></td>
                <td><?php echo $_GET['supplier']; ?></td>
                <td><?php echo  $_GET['address']; ?></td>
                <td><?php echo  $_GET['contact']; ?></td>
                <td><?php echo  $_GET['stock_name[]']; ?></td>
                <td><?php echo  $_GET['quty[]']; ?></td>
                <td><?php echo  $_GET['stock_name[]']; ?></td>
                <td><?php echo  $_GET['cost[]']; ?></td>
                <td><?php echo  $_GET['sell[]']; ?></td>
                <td><?php echo  $_GET['jibi[]']; ?></td>
              </tr>
         
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
              <td width="150"><strong>Grand Total</strong></td>
             
                <td><?php echo $_GET['grand_total'];?></td>
            </tr>
            <tr>
             <td width="150"><strong>Payment</strong></td>
			 <td width="150"><?php echo   $_GET['payment'];?></td>
                          </tr>
          </td>
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
else
echo "Please Enter Bill no. and Customer Name to process Invoice ......";
}
?>
