<?php session_start();

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Login to Control Panel</title>
	
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
		document.getElementById('create').checked=true;
		document.getElementById('select_box').disabled=true;
                
		// validate signup form on keyup and submit
		$("#login-form").validate({
			rules: {
				name: {
					required: true,
					minlength: 3
				}
				
			},
			messages: {
				name: {
					required: "Please Enter The Database Name",
					minlength: "Your Database must consist of at least 3 characters"
				}
			}
		});
	
	});
function create_data(){
document.getElementById("select_box").disabled=true;
document.getElementById("name").disabled=false;
             
}
function select_data(){
document.getElementById("select_box").disabled=false;
document.getElementById("name").disabled=true;
               
}
	</script>
        <style type="text/css">
            
            </style>
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
			
				<h1>DataBase </h1>
				
			
			</div> <!-- login-intro -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="#" id="company-branding" class="fr"><img src="upload/posnic.png" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	<?php
         if((isset($_POST['host']) and isset($_POST['username']) and $_POST['host']!="" and $_POST['username']!="") or (isset($_SESSION['host']) and isset($_SESSION['user'])))
        {
          
            if(isset($_SESSION['host'])){
            $host= $_SESSION['host'];
            $user=$_SESSION['user'];
            $pass=$_SESSION['pass'];
            }
               if(isset($_POST['host'])){
            $host=  trim($_POST['host']);
            $user= trim($_POST['username']);
            $pass= trim($_POST['password']); 
             }
                        $link = mysql_connect("$host","$user","$pass");
if (!$link) {
    $data="Database Configration is Not vaild";
      header("location:install.php?msg=$data");
      exit;
}

        ?>
		<form action="setup_page.php" method="POST" id="login-form" class="cmxform" autocomplete="off">
		
                    <fieldset  >
				<p> <?php 
				
				if(isset($_REQUEST['msg'])) {
					
					$msg=$_REQUEST['msg'];
					echo "<p style=color:red>$msg</p>";						
				}
				?>
				
				</p>
				<p>
                                    <?php 
                                    $con=mysqli_connect("$host","$user","$pass");
                            // Check connection
                                 $sql="CREATE DATABASE MY_posnic_1234";
                                  if (mysqli_query($con,$sql)){
                                       $sql="DROP DATABASE MY_posnic_1234";
                                 mysqli_query($con,$sql);
  
                                    ?>
                                    <input type="radio" value="1" name="select[]"  id="create" onClick="create_data()" >Create New DataBase
                                        <input type="text" id="name" class="round full-width-input" name="name" autofocus  />
				<?php 
                                  }else{
                                      ?>
                                          
                                        <input type="radio"  disabled="disabled"  >Create New DataBase
                                         <input type="text" disabled="disabled" class="round full-width-input" placeholder="No Permission To Create New Database" name="name" autofocus  /> 
                                          <?php
                                  }
                                  ?>
                                
                                
                                </p>
				<p>					
                                    <input type="radio" name="select[]" id="select" onClick="select_data()" >Select Created DataBase<br>
                                    <select name="select_box" class="round full-width-input" id="select_box" style="padding: 5px 10px 5px 10px; border: 1px solid #D9DBDD;">
                                    <?php 


$dbh = new PDO( "mysql:host=$host", $user, $pass );
$dbs = $dbh->query( 'SHOW DATABASES' );

while( ( $db = $dbs->fetchColumn( 0 ) ) !== false )
{
    echo "<option value=".$db." style=margin:10px 10px 10px 10px;><p >$db</p></option>";
}
                                       ?>
                                      </select> 
                                   
				</p>
                                <input type="hidden" name="host" value="<?php echo $host ?>">
				
                                <input type="hidden" name="username" value="<?php echo $user ?>">
                                <input type="hidden" name="password" value="<?php echo $pass ?>">
				
                                <br>
                                <input type="checkbox" name="dummy" value="1" >Add Demo Data
                              <br>
                              <br>
			
				
				<!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
				<input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="INSTALL" />
			</fieldset>

		</form>
		
	</div> <!-- end content -->
	  <?php } ?>
	
	
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
