<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Business Torch- Update Supplier</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autocomplete.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
        <script src="js/date_pic/jquery.date_input.js"></script>  
        <script src="lib/auto/js/jquery.autocomplete.js "></script> 
	<script src="js/script.js"></script>  
		<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	$(document).ready(function() {
	
		// validate signup form on keyup and submit
		$("#form1").validate({
			rules: {
				bill_no: {
					required: true,
					minlength: 3
					
				},
				stockid: {
					required: true					
				},				
				grand_total: {
					required: true					
				},				
				supplier: {
					required: true,					
				}
			},
			messages: {
				supplier: {
					required: "Please Enter Supplier"					
				},
				stockid: {
					required: "Please Enter Stock ID"
				},
				grand_total: {
					required: "Add Stock Items"
				},
				bill_no: {
					required: "Please Enter Bill Number",
                                        minlength: "Bill Number must consist of at least 3 characters"
				}
			}
		});
	
	});
 $(function() {
        $("#supplier").autocomplete("supplier1.php", {
		width: 160,
		autoFill: true,
		selectFirst: true
	});
    	$("#item").autocomplete("stock_purchse.php", {
		width: 160,
		autoFill: true,
		mustMatch: true,
		selectFirst: true
	});
        $("#item").blur(function()
			{
                          document.getElementById('total').value=document.getElementById('cost').value * document.getElementById('quty').value 
                        });
        $("#item").blur(function()
			{
			 
							
			 $.post('check_item_details.php', {stock_name1: $(this).val() },
				function(data){
					$("#cost").val(data.cost);
								$("#sell").val(data.sell);
								$("#stock").val(data.stock);
								$('#guid').val(data.guid);
								if(data.cost!=undefined)
								$("#0").focus();
								
								
							}, 'json');
											
					

			
			});
        $("#supplier").blur(function()
			{
			 
							
			 $.post('check_supplier_details.php', {stock_name1: $(this).val() },
				function(data){
				
								$("#address").val(data.address);
								$("#contact1").val(data.contact1);
								
								if(data.address!=undefined)
								$("#0").focus();
								
							}, 'json');
											
					

			
			});
 $('#test1').jdPicker();
 $('#test2').jdPicker();
		


		var hauteur=0;
		$('.code').each(function(){
			if($(this).height()>hauteur) hauteur = $(this).height();
		});

		$('.code').each(function(){ $(this).height(hauteur); });
	});

function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=38 && unicode!=39 && unicode!=40){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57)
        return false
    }
    }
       function edit_stock_details(id) {
           document.getElementById('display').style.display="block";
         
     document.getElementById('item').value=document.getElementById(id+'st').value;
     document.getElementById('quty').value=document.getElementById(id+'q').value;
    document.getElementById('cost').value=document.getElementById(id+'c').value;
    document.getElementById('sell').value=document.getElementById(id+'s').value;
    document.getElementById('stock').value=document.getElementById(id+'p').value;
    document.getElementById('total').value=document.getElementById(id+'to').value;
    document.getElementById('posnic_total').value=document.getElementById(id+'to').value;

    document.getElementById('guid').value=id;
    document.getElementById('edit_guid').value=id;
     
   }
       function clear_data() {
           document.getElementById('display').style.display="none";
         
     document.getElementById('item').value="";
     document.getElementById('quty').value="";
    document.getElementById('cost').value="";
    document.getElementById('sell').value="";
    document.getElementById('stock').value="";
    document.getElementById('total').value="";
    document.getElementById('posnic_total').value="";

    document.getElementById('guid').value="";
    document.getElementById('edit_guid').value="";
     
   }
      function add_values(){
         if(unique_check()){
    
         if(document.getElementById('edit_guid').value==""){
     if(document.getElementById('item').value!="" && document.getElementById('quty').value!="" && document.getElementById('cost').value!="" && document.getElementById('total').value!=""){
     code=document.getElementById('item').value;
  
    quty=document.getElementById('quty').value;
    cost=document.getElementById('cost').value;
    sell=document.getElementById('sell').value;
    disc=document.getElementById('stock').value;
    total=document.getElementById('total').value;
    item=document.getElementById('guid').value;
    main_total=document.getElementById('posnic_total').value;
 
    $('<tr id='+item+'><td><input type=hidden value='+item+' id='+item+'id ><input type=text name="stock_name[]"  id='+item+'st style="width: 150px" class="round  my_with" ></td><td><input type=text name=quty[] readonly="readonly" value='+quty+' id='+item+'q class="round  my_with" style="text-align:right;" ></td><td><input type=text name=cost[] readonly="readonly" value='+cost+' id='+item+'c class="round  my_with" style="text-align:right;"></td><td><input type=text name=sell[] readonly="readonly" value='+sell+' id='+item+'s class="round  my_with" style="text-align:right;"  ></td><td><input type=text name=stock[] readonly="readonly" value='+disc+' id='+item+'p class="round  my_with" style="text-align:right;" ></td><td><input type=text name=jibi[] readonly="readonly" value='+total+' id='+item+'to class="round  my_with" style="width: 120px;margin-left:20px;text-align:right;" ><input type=hidden name=total[] id='+item+'my_tot value='+main_total+'> </td><td><input type=button value="" id='+item+' style="width:30px;border:none;height:30px;background:url(images/edit_new.png)" class="round" onclick="edit_stock_details(this.id)"  ></td><td><input type=button value="" id='+item+' style="width:30px;border:none;height:30px;background:url(images/close_new.png)" class="round" onclick= $(this).closest("tr").remove() ></td></tr>').fadeIn("slow").appendTo('#item_copy_final');
    document.getElementById('quty').value="";
    document.getElementById('cost').value="";
    document.getElementById('sell').value="";
    document.getElementById('stock').value="";
    document.getElementById('total').value="";
    document.getElementById('item').value="";
    document.getElementById('guid').value="";
    if(document.getElementById('grand_total').value==""){
        document.getElementById('grand_total').value=main_total;
    }else{
    document.getElementById('grand_total').value=parseFloat(document.getElementById('grand_total').value)+parseFloat(main_total);
    }
     document.getElementById('main_grand_total').value='$ ' + parseFloat(document.getElementById('grand_total').value).toFixed(2);
    document.getElementById(item+'st').value=code;
    document.getElementById(item+'to').value=total;

}else{
     alert('Please Select An Item');
    }
    }else{
    id=document.getElementById('edit_guid').value;
    document.getElementById(id+'st').value=document.getElementById('item').value;  
    document.getElementById(id+'q').value=document.getElementById('quty').value;
    document.getElementById(id+'c').value=document.getElementById('cost').value;
    document.getElementById(id+'s').value=document.getElementById('sell').value;
    document.getElementById(id+'p').value=document.getElementById('stock').value;
    data1=parseFloat(document.getElementById('grand_total').value)+parseFloat(document.getElementById('posnic_total').value)-parseFloat(document.getElementById(id+'my_tot').value);
    document.getElementById('main_grand_total').value=data1;
    document.getElementById('grand_total').value=data1;
    document.getElementById(id+'to').value=document.getElementById('total').value;
   // document.getElementById('grand_total').value=parseFloat(document.getElementById('grand_total').value)+parseFloat(document.getElementById('total').value);
//alert(data1);
//alert(parseFloat(document.getElementById(id+'my_tot').value));
//alert(parseFloat(document.getElementById('posnic_total').value));
balance_amount();

    document.getElementById(id+'my_tot').value=document.getElementById('posnic_total').value
    document.getElementById('quty').value="";
    document.getElementById('cost').value="";
    document.getElementById('sell').value="";
    document.getElementById('stock').value="";
    document.getElementById('total').value="";
    document.getElementById('item').value="";
    document.getElementById('guid').value="";
    document.getElementById('edit_guid').value="";
    }
               document.getElementById('display').style.display="none";
          
    }
    }
    function unique_check(){
        if(!document.getElementById(document.getElementById('guid').value) || document.getElementById('edit_guid').value==document.getElementById('guid').value){
            return true;
           
        }else{
           
            alert("This Item is already added In This Purchase");
            document.getElementById('item').focus();
                   id=document.getElementById('edit_guid').value;
      
            document.getElementById('item').focus();
            document.getElementById('item').value=document.getElementById(id+'st').value;
            document.getElementById('quty').value=document.getElementById(id+'q').value;
            document.getElementById('cost').value=document.getElementById(id+'c').value;
            document.getElementById('sell').value=document.getElementById(id+'s').value;
            document.getElementById('stock').value=document.getElementById(id+'p').value;
            document.getElementById('total').value=document.getElementById(id+'to').value;   
            document.getElementById('guid').value=id;
            document.getElementById('edit_guid').value=id;
                        return false;
            
        
   }
   }
       function total_amount(){
  
               
        document.getElementById('total').value=document.getElementById('cost').value * document.getElementById('quty').value
    document.getElementById('posnic_total').value=document.getElementById('total').value;
       // document.getElementById('total').value = '$ ' + parseFloat(document.getElementById('total').value).toFixed(2);
   balance_amount();
    }
    function balance_amount(){
    if(document.getElementById('grand_total').value!="" && document.getElementById('payment').value!=""){
    data=parseFloat(document.getElementById('grand_total').value);
    document.getElementById('balance').value=data-parseFloat(document.getElementById('payment').value);
    console.log();
     if(parseFloat(document.getElementById('grand_total').value) >= parseFloat(document.getElementById('payment').value)){
        
         document.getElementById('balance').value=parseFloat(document.getElementById('grand_total').value)-parseFloat(document.getElementById('payment').value);
    }else{
        if(document.getElementById('grand_total').value!=""){
         document.getElementById('balance').value='000.00';
         document.getElementById('payment').value=parseFloat(document.getElementById('grand_total').value);
        }else{
            document.getElementById('balance').value='000.00';
         document.getElementById('payment').value="";
        }
    }
    }else{
        document.getElementById('balance').value="";
    }
   
    
}
function quantity_chnage(e){
         var unicode=e.charCode? e.charCode : e.keyCode
                if (unicode!=13 && unicode!=9){
        }
       else{
             add_values();
           document.getElementById("item").focus();
           
        }
         if (unicode!=27){
        }
       else{
             
             document.getElementById("item").focus();
        }
   }
   
   function numbersonly(e){
        var unicode=e.charCode? e.charCode : e.keyCode
        if (unicode!=8 && unicode!=46 && unicode!=37 && unicode!=27 && unicode!=38 && unicode!=39 && unicode!=40 && unicode!=9){ //if the key isn't the backspace key (which we should allow)
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
				<li><a href="view_purchase.php" class="active-tab purchase-tab">Purchase</a></li>
				<li><a href="view_supplier.php" class=" supplier-tab">Supplier</a></li>
				<li><a href="view_product.php" class="stock-tab">Stocks / Products</a></li>
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
				
				<h3>Purchase Management</h3>
				<ul>
					<li><a href="add_purchase.php">Add Purchase</a></li>
					<li><a href="view_purchase.php">View Purchase </a></li>
				</ul>
				                
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Update Purchase</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
		
				<?php
				if(isset($_POST['supplier']) and isset($_POST['stock_name']))

            {
			$billnumber=mysql_real_escape_string($_POST['bill_no']);
			$autoid=mysql_real_escape_string($_POST['id']);
			
			$supplier=mysql_real_escape_string($_POST['supplier']);

			$payment=mysql_real_escape_string($_POST['payment']);
			$balance=mysql_real_escape_string($_POST['balance']);
                        $address=mysql_real_escape_string($_POST['address']);
			$contact=mysql_real_escape_string($_POST['contact']);
                         $count = $db->countOf("supplier_details", "supplier_name='$supplier'");
							if($count==0)
							{
                                                         $db->query("insert into supplier_details(supplier_name,supplier_address,supplier_contact1) values('$supplier','$address','$contact')");   
                                                        }
				$temp_balance = $db->queryUniqueValue("SELECT balance FROM supplier_details WHERE supplier_name='$supplier'");
				$temp_balance = (int) $temp_balance + (int) $balance;
				$db->execute("UPDATE supplier_details SET balance=$temp_balance WHERE supplier_name='$supplier'");
			$selected_date=$_POST['due'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );
			$due=$mysqldate;
			$mode=mysql_real_escape_string($_POST['mode']);
			$description=mysql_real_escape_string($_POST['description']);
			
			$namet=$_POST['stock_name'];
			$quantityt=$_POST['quanitity'];
			$bratet=$_POST['cost'];
			$sratet=$_POST['sell'];
			$totalt=$_POST['total'];
			
			$subtotal=mysql_real_escape_string($_POST['subtotal']);
			
			$username=$_SESSION['username'];
			
			$i=0;
			$j=1;
			
					
		$selected_date=$_POST['date'];
		  	$selected_date=strtotime( $selected_date );
			$mysqldate = date( 'Y-m-d H:i:s', $selected_date );
			
			  foreach($namet as $name1)
			   {
			   
			$quantity=$_POST['quantity'][$i];
			$brate=$_POST['cost'][$i];
			$srate=$_POST['sell'][$i];
			$total=$_POST['total'][$i];
			$sysid=$_POST['gu_id'][$i];
			
			
			$count = $db->countOf("stock_avail", "name='$name1'");
			
				$amount = $db->queryUniqueValue("SELECT quantity FROM stock_avail WHERE name='$name1'");
				$oldquantity = $db->queryUniqueValue("SELECT quantity FROM stock_entries WHERE id=$sysid ");
				$amount1 = ($amount + $quantity) - $oldquantity;
			
				
				$db->execute("UPDATE stock_avail SET quantity=$amount1 WHERE name='$name1'");
                                 $db->query("UPDATE stock_entries SET stock_name='$name1', stock_supplier_name='$supplier', quantity=$quantity, company_price=$brate, selling_price=$srate, opening_stock=$amount, closing_stock=$amount1, date='$mysqldate', username='$username', type='entry', total=$total, payment=$payment, balance=$balance, mode='$mode', description='$description', due='$due', subtotal=$subtotal,billnumber='$billnumber' WHERE id=$sysid"); 
			//INSERT INTO `stock`.`stock_entries` (`id`, `stock_id`, `stock_name`, `stock_supplier_name`, `category`, `quantity`, `company_price`, `selling_price`, `opening_stock`, `closing_stock`, `date`, `username`, `type`, `salesid`, `total`, `payment`, `balance`, `mode`, `description`, `due`, `subtotal`, `count1`) 
			//VALUES (NULL, '$autoid1', '$name1', '$supplier', '', '$quantity', '$brate', '$srate', '$amount', '$amount1', '$mysqldate', 'sdd', 'entry', 'Sa45', '432.90', '2342.90', '24.34', 'cash', 'sdflj', '2010-03-25 12:32:02', '45645', '1');
			
			
				
					
			
				
			
			
			
			
			
			$i++;
			$j++;
			}
				$data="Parchase order Updated successfully Ref: [ $autoid] " ;
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
				?>	
				<?php 
				if(isset($_GET['sid']))
				$id=$_GET['sid'];
                                $line = $db->queryUniqueObject("SELECT * FROM stock_entries WHERE stock_id='$id'");	
				?>
				<form name="form1" method="post" id="form1" action="">
                                      <div class="mytable_row ">
                      <input type="hidden" id="posnic_total" >
                      <input type="hidden" name="id" value="<?php echo $id ?>" >
                 
                  <table class="form"  border="0" cellspacing="0" cellpadding="0">

                    <tr>
                               <?php
					  $max = $db->maxOfAll("id","stock_sales");
					  $max=$max+1;
					  $autoid="PR".$max."";
					  ?>
                      <td>Stock ID:</td>
                      <td><input name="stockid" type="text" id="stockid" readonly="readonly" maxlength="200"  class="round default-width-input" style="width:130px "  value="<?php echo $line->stock_id  ; ?>" /></td>
                       
                      <td>Date:</td>
                      <td><input  name="date" id="test1" placeholder="" value="<?php echo $line->date ; ?> " type="text" id="name" maxlength="200"  class="round default-width-input"  /></td>
                      <td><span class="man">*</span>Bill No:</td>
                      <td><input name="bill_no" placeholder="ENTER BILL NO" type="text" id="bill_no" maxlength="200" value="<?php echo $line->billnumber ; ?> " class="round default-width-input" style="width:120px " /></td>
                       
                    </tr>
                    <tr>
                      <td><span class="man">*</span>Supplier:</td>
                      <td><input name="supplier" placeholder="ENTER SUPPLIER" type="text" id="supplier" value="<?php echo $line->stock_supplier_name 	 ; ?> "  maxlength="200"  class="round default-width-input"  style="width:130px " /></td>
                       
                      <td>Address:</td>
                      <td><input name="address" placeholder="ENTER ADDRESS" type="text" value="<?php $quantity = $db->queryUniqueValue("SELECT supplier_address FROM supplier_details WHERE supplier_name='".$line->stock_supplier_name."'"); echo $quantity; ?>" id="address" maxlength="200"  class="round default-width-input"  /></td>
                       
                      <td>contact:</td>
                      <td><input name="contact" placeholder="ENTER CONTACT" type="text" value="<?php $quantity = $db->queryUniqueValue("SELECT supplier_contact1 FROM supplier_details WHERE supplier_name='".$line->stock_supplier_name."'"); echo $quantity; ?>" id="contact1" maxlength="200"  class="round default-width-input" onkeypress="return numbersonly(event)" style="width:120px " /></td>
                       
                    </tr>
                  </table>
                                      </div><br>
                  <input type="hidden" id="guid">
                  <input type="hidden" id="edit_guid">
                   <table id="hideen_display">
                         <tr >
                          <td>Item:</td>
                           <td>&nbsp; </td>
                           <td>&nbsp; </td>
                           <td>&nbsp; </td>
                          <td>Quantity:</td>
                          <td>Cost:</td>
                          <td>Selling:</td>
                          <td>Available Stock:</td>
                          <td>Total</td>
                           <td>&nbsp; </td>
                           <td>&nbsp; </td>
                           <td>&nbsp; </td>
                      </tr>
                  </table>
                  <table class="form" id="display" style="display:none">
                       <tr >
                 
                      <td><input name=""  type="text" id="item"  maxlength="200"  class="round my_with " style="width: 150px" value="<?php echo $supplier; ?>" /></td>
                       
                      <td><input name=""  type="text" id="quty"  maxlength="200"   class="round  my_with" onKeyPress="quantity_chnage(event);return numbersonly(event)" onkeyup="total_amount();unique_check()" value="<?php echo $category; ?>"   /></td>
                     
                      <td><input name=""  type="text" id="cost" readonly="readonly" maxlength="200"  class="round my_with"  value="<?php echo $category; ?>" /></td>
                       
                      
                      <td><input name=""  type="text" id="sell" readonly="readonly" maxlength="200"  class="round  my_with"  value="<?php echo $category; ?>" /></td>
                            
                                        
                      <td><input name=""  type="text" id="stock" readonly="readonly" maxlength="200"  class="round  my_with"  value="<?php echo $category; ?>" /></td>
                      <td><input name=""  type="text" id="total" maxlength="200"  class="round default-width-input " style="width:120px;  margin-left: 20px" value="<?php echo $category; ?>" /></td>
                      <td><input type="button" onclick="add_values()" onkeyup=" balance_amount();" id="add_new_code"  style="margin-left:20px; width:30px;height:30px;border:none;background:url(images/save.png)" class="round">
                         </td><td> <input type="button" value="" id="cancel" onclick="clear_data()" style="width:30px;float: right; border:none;height:30px;background:url(images/close_new.png)">
                      </td>
                     
                    </tr>
                  </table> 
                  <input type="hidden" id="guid">
                  <input type="hidden" id="edit_guid">
                  
                 
                         <div style="overflow:auto ;max-height:300px;  ">
                           <table class="form" id="item_copy_final">
                       
                               <?php 
                               $sid=$line->stock_id;
					$max = $db->maxOf("count1", "stock_entries", "stock_id='$sid'");
					
					for($i=1; $i<=$max; $i++)
					{
                                              $line1 = $db->queryUniqueObject("SELECT * FROM stock_entries WHERE stock_id='$sid' and count1=$i");	
					
                                          $item= $db->queryUniqueValue("SELECT stock_id FROM stock_details WHERE stock_name='".$line1->stock_name."'");  
                                            ?>
                                        
                     <tr>
                           
                         <td><input name="stock_name[]"  type="text" id="<?php echo $item."st"?>" maxlength="100" style="width: 150px" readonly="readonly"  class="round "
                                 value="<?php echo $line1->stock_name ; ?>" /></td>
                  
                      <td><input name="quantity[]"  type="text" id="<?php echo $item."q"?>" maxlength="20"  class="round my_with" 
                                 value="<?php echo $line1->quantity ; ?>" readonly="readonly" onkeypress="return numbersonly(event)" /></td>
                
                  
                      <td><input name="cost[]"  type="text" id="<?php echo $item."c"?>" maxlength="20"  class="round my_with" 
                                 value="<?php echo $line1->company_price ; ?>" readonly="readonly" onkeypress="return numbersonly(event)" /></td>
                   
                        
                            
                      <td><input name="sell[]"  type="text" id="<?php echo $item."s"?>" maxlength="20" readonly="readonly" class="round my_with" 
					  value="<?php echo $line1->selling_price; ?>" onkeypress="return numbersonly(event)"  /></td>
                      <td><input name="stock[]"  type="text" id="<?php echo $item."p"?>" readonly="readonly" maxlength="200"   class="round  my_with"  value="<?php $quantity = $db->queryUniqueValue("SELECT quantity FROM stock_avail WHERE name='".$line1->stock_name."'"); echo $quantity; ?>" /></td>
                   
                      <td><input name="total[]"  type="text" id="<?php echo $item."to"?>" readonly="readonly" maxlength="20" style="margin-left:20px;width: 120px"  class="round " 
					  value="<?php echo $line1->total  ; ?>" /></td>
                      <td><input type="hidden" id="<?php echo $item."my_tot"?>" maxlength="20" style="margin-left:20px;width: 120px"  class="round " 
					  value="<?php echo $line1->total  ; ?>" /></td>
                      <td><input type="hidden" id="<?php echo $item;?>"><input type="hidden" name="gu_id[]" value="<?php echo $line1->id  ?>"></td>
                      <td><input type=button value="" id="<?php echo $item;?>" style="width:30px;border:none;height:30px;background:url(images/edit_new.png)" class="round" onclick="edit_stock_details(this.id)"  ></td>
                    </tr>
                                        <?php }?>
                    </table>
                   </div>
                     
                  <div class="mytable_row "> 
                    
                  <table class="form">
                    <tr> <td>&nbsp; </td>
                        <td>Payment:<input type="text"  class="round" value="<?php  echo $line->payment ; ?>" onkeyup=" balance_amount(); return numbersonly(event);"  name="payment" id="payment" >
                      </td>
                      <td>&nbsp; </td>
                    <td>Balance:<input type="text"  class="round" value="<?php echo $line->balance ; ?>" id="balance" name="balance" >               
                      </td>
                      <td>&nbsp; </td>
                   
                      <td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td><td>&nbsp; </td>
                       <td>Grand Total:<input type="hidden" readonly="readonly" id="grand_total" value="<?php echo $line->subtotal ; ?>" name="subtotal" > 
                        <input type="text" id="main_grand_total" class="round default-width-input" value="<?php echo $line->subtotal ; ?>" style="text-align:right;width: 120px" >
                    </td>
                  </tr> </table> 
                  <table>
                  <tr> <td>Mode &nbsp;</td><td>
                      <select name="mode">
                          <option value="cash">Cash</option>
                      <option value="cheque">Cheque</option>
                      
                      <option value="other">Other</option>
                      </select>
                      </td>
                      <td>
                       Due Date:<input type="text" name="due" id="test2" value="<?php echo date('d-m-Y');?>" class="round">
                  </td>
                    <td>&nbsp; </td><td>&nbsp; </td>              
             
                  <td>Description</td>
                  <td><textarea name="description"><?php  echo $line->description ;  ?></textarea></td>
                  <td>&nbsp; </td>
                  <td>&nbsp; </td>
                  <td>&nbsp; </td>
                  </tr>
                  </table>
                                 <table class="form">
                    <tr>
                     <td>
                        <input  class="button round blue image-right ic-add text-upper" type="submit" name="Submit" value="Add">
                     </td><td>			(Control + S)
                     <input class="button round red   text-upper"  type="reset" name="Reset" value="Reset"> </td>
                     <td>&nbsp; </td> <td>&nbsp; </td>
                    </tr>
                </table></div>
                </form>
						
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
				
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
		<p>Any Queries email to <a href="#">support@biztorch.com</a>.</p>
	</div> <!-- end footer -->

</body>
</html>