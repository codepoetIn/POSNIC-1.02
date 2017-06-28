	<script src="tp1l/jquery.min.js" type="text/javascript"></script>
	<script src="tpl1/jquery.autocomplete.js "></script>  
	 <script type="text/javascript">
$(function() {
       	$("#customer").autocomplete("customer_name.php",
		 {
		width: 160,
		autoFill: true,
		selectFirst: true
		}
		);
    	});
		$(function() {
       	$("#supplier2").autocomplete("author.php",
		 {
		width: 160,
		autoFill: true,
		selectFirst: true
		}
		);
    	});
</script>
