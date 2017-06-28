<?php

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sale Perchase System</title>
	
	<!-- Stylesheets -->
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/cmxform.css">
	<link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
	
	<!-- Scripts -->
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
	
	<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	
	$(document).ready(function() {
		
		// validate signup form on keyup and submit
		$("#login-form").validate({
			rules: {
				host: {
					required: true,
					minlength: 3
				},
				username: {
					required: true,
					minlength: 3
				}
			},
			messages: {
				host: {
					required: "Please Enter The Host",
					minlength: "Your Host must consist of at least 3 characters"
				},
				username: {
					required: "Please Enter The User Name",
					minlength: "Your User Name must be at least 3 characters long"
				}
			}
		});
	
	});

	</script>

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>

<!--    Only Index Page for Analytics   -->
<?php include_once("analyticstracking.php") ?>
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width">
		
			<!--<a href="#" class="round button dark ic-left-arrow image-left ">See shortcuts</a>-->

		</div> <!-- end full-width -->	
	
	</div> 
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1>Installation </h1>
				
			
			</div> <!-- login-intro -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="#" id="company-branding" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	
		<form action="database_install.php" method="POST" id="login-form" class="cmxform" autocomplete="off">
		
			<fieldset>
				<p> <?php 
				
				if(isset($_REQUEST['msg'])) {
					
					$msg=$_REQUEST['msg'];
					echo "<p style=color:red>$msg</p>";						
				}
				?>
				
				</p>
				<p>
					<label for="login-host">DataBase Host Name</label>
                                        <input type="text" id="host" class="round full-width-input" placeholder="ENTER DATABASE HOST NAME" name="host" autofocus  />
				</p>

				<p>
					<label for="login-user">DataBase User Name</label>
                                        <input type="text" id="username" name="username" placeholder="ENTER DATABASE USERNAME" class="round full-width-input"  />
				</p>
				<p>
					<label for="login-password">DataBase User Password</label>
					<input type="password" id="password" name="password" placeholder="ENTER DATABASE PASSWORD" class="round full-width-input"  />
				</p>
				
			
				
				<!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
				<input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="INSTALL" />
			</fieldset>

		</form>
		
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">
		<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=286371564842269";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="fb-root"></div>
<div class="fb-like" data-href="https://www.facebook.com/posnic.point.of.sale" data-width="450" data-show-faces="true" data-send="true"></div>
<div class="g-plusone" data-href="https://plus.google.com/u/0/107268519615804538483"></div> 
<script type="text/javascript">
      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script><p> &copy;Copyright 2013</p>

	
	</div> <!-- end footer -->

</body>
</html>