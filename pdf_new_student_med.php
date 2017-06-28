<?php
	include_once("init.php");


	
	$query = "SELECT max(id) From stock_sales";
		  $rs = mysql_query($query);
		  $row = mysql_fetch_array($rs);
		echo  $id = $row['max(id)'] ;
		
		$sql1 = "SELECT * FROM stock_sales where transactionid=$id";
		$rs1 = mysql_query($sql1) or die(mysql_error());
		while($row1 = mysql_fetch_array($rs1))
		{
   			$name 		 = $row1['emp_name'];
		echo	$designation = $row1['emp_designation'];
			$campus 	 = $row1['emp_campus'];
			
			$sql = "SELECT * FROM alpp_generate_salary where salary_emp_id= '$cnic' AND salary_month = '$month' 
					AND salary_year = '$year' ";
			$rs = mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($rs)>0)
			{
				while($row = mysql_fetch_array($rs))
				{
				$date	 		 = $row['salary_generation_date'];	
				$basic 			 = $row['salary_basic'];
				$incentive 		 = $row['salary_incentive'];
				$new_bsic 		 = $row['salary_new_basic'];
				$working 		 = $row['salary_working_days'];
				$allowed 		 = $row['salary_allowed_leaves'];
				$consumed 		 = $row['salary_leaves'];
				$leave_deduction = $row['salary_deduction'];
				$other_deduction = $row['salary_other'];
				$bonus 		 	 = $row['salary_bonus'];
				$current 		 = $row['salary_current'];
				$detail 		 = $row['salary_detail'];
				}
	
			}
		}
	 


?>


<?php
$html = "
<table width=600px>
	<tr>
		<td align=center colspan=4> <b>Salary Slip
		</td>
	</tr>
	<tr>
		<td width=20%>Name</td> 
		<td width=40%>$name </td>
		<td width=20%>Cnic#</td>
		<td width=20%>$cnic </td>
	</tr>
	<tr>
		<td width=20%>Designation</td> 
		<td width=40%>".$designation."</td>
		<td width=20%>Campus</td>
		<td width=20%>".$campus."</td>
	</tr>
	<tr>
		<td width=20%>Salary Month</td> 
		<td width=40%>$month</td>
		<td width=20%>Salary year</td>
		<td width=20%>$year</td>
	</tr>
</table>
<table width=500  border=0 cellspacing=2 cellpadding=2>


<tr>
	<td width=250>&nbsp;</td>
	<td width=50>&nbsp;</td>
	<td width=200>&nbsp;</td>
</tr>
		 <tr>
		 	<td><b>Salary Generation Date</td>
			<td>:</td></b>
			<td>".$date."</td>
		 </tr>
			
		 <tr>
		 	<td><b>Basic Salary</td>
			<td>:</td></b>
			<td>".$basic."</td>
		 </tr>
		 <tr>
		 	<td><b>Working Days</td>
			<td>:</td></b>
			<td>".$working."</td>
		 </tr>
		 <tr>
		 	<td><b>Allowed Leaves</td>
			<td>:</td></b>
			<td>".$allowed."</td>
		 </tr>
		 <tr>
		 	<td><b>Leave Consumed</td>
			<td>:</td></b>
			<td>".$consumed."</td>
		 </tr>
		 <tr>
		 	<td><b>Leaves Deduction</td>
			<td>:</td></b>
			<td>".$leave_deduction."</td>
		 </tr>
		 <tr>
		 	<td><b>Other Deduction</td>
			<td>:</td></b>
			<td>".$other_deduction."</td>
		 </tr>
		 <tr>
		 	<td><b>Bonus</td>
			<td>:</td></b>
			<td>".$bonus."</td>
		 </tr>
		 <tr>
		 	<td><b>Incentive</td>
			<td>:</td></b>
			<td>".$incentive."</td>
		 </tr>
		 <tr>
		 	<td><b>New Basic Salary</td>
			<td>:</td></b>
			<td>".$new_bsic."</td>
		 </tr>
		 <tr>
		 	<td><b>Current Salary</td>
			<td>:</td></b>
			<td>".$current."</td>
		 </tr>
		

 </table>";


//==============================================================
//==============================================================
//==============================================================

include("mpdf/mpdf.php");

$mpdf=new mPDF(); 

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//==============================================================
//==============================================================
//==============================================================


?>