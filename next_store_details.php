<?php session_start();
	include("lib/db.class.php");
       
	       $host=$_SESSION['host'] ;
            $user=$_SESSION['user'];
            $pass=$_SESSION['pass'];
           $name=$_SESSION['db_name'];
	// Open the base (construct the object):
	$db = new DB($name, $host, $user, $pass);
	
	# Note that filters and validators are separate rule sets and method calls. There is a good reason for this. 

	require "lib/gump.class.php";
?>
  <?php $count = $db->countOfAll("store_details");
  if($count>1){
      
   header("location:index.php");
  }
  ?>
  <?php if(isset($_POST['submit']) and $_POST['submit']==='Upload'){
    
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 30000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    $upload= $_FILES["file"]["name"] ;
    $type=$_FILES["file"]["type"];



    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
        
        unlink("upload/$upload");
      }
  
       
        $name=$upload;
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $name);
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  //  $upload;
   $_SESSION['logo']=$name;
	
	# Note that filters and validators are separate rule sets and method calls. There is a good reason for this. 

            $upload= $_FILES["file"]["name"] ;
           $type;
           $db->query("UPDATE store_details  SET log='".$upload."',type='".$type."'");
       header("location:next_store_details.php");
      
    }
     // header("location:next_store_details.php");
    ?>
<script type="text/javascript">
    setTimeout("window.location.reload();",4000);
    </script>
        <?php
  }
else
  {
  echo "<p  style=color:red;margin-left:550px;font-size:20px >Invalid file</p>";
        }}
      
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
		
		// validate signup form on keyup and submit
		$("#login-form").validate({
			rules: {
				sname: {
					required: true,
					minlength: 3
				},
				address: {
					required: true,
					minlength: 3
				},
				place: {
					required: true,
					minlength: 3
				},
				website: {
					required: true,
					minlength: 3
				},
				email: {
					required: true,
					minlength: 3
				},
				phone: {
					required: true,
					minlength: 10,
                                        maxlength:12
				},
				city: {
					required: true,
					minlength: 3
				}
			},
			messages: {
				sname: {
					required: "Please Enter The Store Name",
					minlength: "Your Store Name must consist of at least 3 characters"
				},
				address: {
					required: "Please Enter The Address",
					minlength: "Your Address must be at least 3 characters long"
				},
				place: {
					required: "Please Enter The Place",
					minlength: "Your place must be at least 3 characters long"
				},
				website: {
					required: "Please Enter The Website",
					minlength: "Your Website must be at least 3 characters long"
				},
				email: {
					required: "Please Enter The email",
					minlength: "Your Email must be at least 3 characters long"
				},
				phone: {
					required: "Please Enter The Phone",
					minlength: "Your Phone must be at least 10 characters long",
					maxlength: "Your Phone must be at Less than 13 characters long"
				},
				city: {
					required: "Please Enter The city",
					minlength: "Your city must be at least 3 characters long"
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
			
				<h1>Store Setting </h1>
				
			
			</div> <!-- login-intro -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="#" id="company-branding" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Posnic" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	<?php
        
        if(isset($_POST['submit']) and isset($_POST['sname']) and isset($_POST['address']) and $_POST['submit']=='Down'){
            $host=$_SESSION['host'] ;
            $user=$_SESSION['user'];
            $pass=$_SESSION['pass'];
           $name=$_SESSION['db_name'];
            $con=mysqli_connect("$host","$user","$pass","$name");
        $name=$_POST['sname'];
    $address=$_POST['address'];
    $place=$_POST['place'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $web=$_POST['website'];
    $email=$_POST['email'];
    $pin=$_POST['pin'];
    

    $db->query("UPDATE store_details  SET pin='".$pin."',city='".$city."',name='".$name."',email='".$email."',web='".$web."',address='".$address."',place='".$place."',phone='".$phone."' ");
	
            // $sql="INSERT INTO `store_details` (`name`, `address`, `place`, `city`, `phone`, `email`, `web`, `pin`) VALUES
//('".$_POST['sname']."', '".$_POST['address']."', '".$_POST['place']."', '".$_POST['city']."', '".$_POST['phone']."', '".$_POST['email']."', '".$_POST['website']."', '".$_POST['pin']."')";

          // Execute query
        
           header("location:index.php");
      
        }
        ?>
	
	<!-- MAIN CONTENT -->
	<div id="content">
	
		<form action="" method="POST" id="login-form" class="cmxform" autocomplete="off">
		
		<table><tr><td>
				
				<p>
                                    <label>Store Name</label>
                                    <input type="text" name="sname" id="name" class="round full-width-input"  placeholder="Enter Store Name" autofocus  /> 
                                </p></td>
                                    <td>
				<p>
                                    <label>Address</label>
                                    <input type="text" name="address" id="address" class="round full-width-input"  placeholder="Enter Address" autofocus  /> 
                                </p></td>
                                </tr>
                                <tr><td>
				<p>
                                    <label>Place</label>
                                    <input type="text" name="place" id="place" class="round full-width-input" placeholder="Enter Place"  autofocus  /> 
                                </p>
                                    </td><td>
				<p>
                                    <label>City</label>
                                    <input type="text" name="city" id="city" class="round full-width-input" placeholder="Enter City"  autofocus  /> 
                                </p></td></tr><tr>
                                    <td>
				<p>
                                    <label>Pin</label>
                                    <input type="text" name="pin" id="pin" class="round full-width-input" placeholder="Enter Pin"  autofocus  /> 
                                </p>
				
                                    </td>
                                    <td>
				<p>
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="phone" class="round full-width-input" placeholder="Enter Phone"  autofocus  /> 
                                </p></td></tr><tr><td>
				<p>
                                    <label>Website</label>
                                    <input type="text" name="website" id="website" class="round full-width-input" placeholder="Enter Website"  autofocus  /> 
                                </p></td><td>
				<p>
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" class="round full-width-input" placeholder="Enter Email"  autofocus  /> 
                                </p>
				
                                    </td></tr><tr></tr>
                                <tr><td>
			
				
				<!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
				<input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="Down" />
                                    </td><td>&nbsp;</td></tr></table>

		</form>
		
	<!-- end content -->
	<div style="float: right;margin-top: -350px">	<form action="" method="POST" id="login-form" class="cmxform" enctype="multipart/form-data">
<label for="file">Upload Logo:</label><br>
<input type="file" name="file" id="file"><br><br><br>
<input type="submit" name="submit" value="Upload" class="button round blue image-right ic-right-arrow">
</form>
	
	</div> </div> 
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
    </script><p>Any Queries email to <a href="mailto:sridhar.posnic@gmail.com?subject=Stock%20Management%20System">sridhar.posnic@gmail.com</a>.</p>
		
	
	</div> <!-- end footer -->

</body>
</html>

