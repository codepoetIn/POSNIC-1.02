<?php session_start();
 if(isset($_POST['host']) and isset($_POST['username'])  and $_POST['host']!="" and $_POST['username']!="")
        {
         $host=  trim($_POST['host']);
            $user= trim($_POST['username']);
            $pass= trim($_POST['password']); 
            $name;
            if(isset($_POST['name'])){
                $name=$_POST['name'];
            }
            if(isset($_POST['select_box'])){
                $name=$_POST['select_box'];
            }
            $_SESSION['host']=$host;
            $_SESSION['user']=$user;
            $_SESSION['pass']=$pass;
            $_SESSION['db_name']=$name;
                    $link = mysql_connect("$host","$user","$pass");
if (!$link) {
    $data="Database Configration is Not vaild";
      header("location:instal.php?msg=$data");
      exit;
}

$con=mysqli_connect("$host","$user","$pass");
// Check connection
 if(isset($_POST['name'])){
$sql="CREATE DATABASE $name";
if (!mysqli_query($con,$sql)){
    $data="This Database Name Is Already In the DataBase";
      header("location:database_instal.php?msg=$data");
      exit;
}
 }
        
        $con=mysqli_connect("$host","$user","$pass","$name");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $dummy=0;
if(isset($_POST['dummy'])){
    $dummy=1;
}
// Create table
$sql="CREATE TABLE IF NOT EXISTS `category_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(120) NOT NULL,
  `category_description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20";

// Execute query
mysqli_query($con,$sql);
if($dummy===1){
$sql="INSERT INTO `category_details` (`id`, `category_name`, `category_description`) VALUES
(20, 'pen', 'Boll Pen'),
(21, 'Clock', 'CricleClock'),
(22, 'Book', 'Note Book'),
(23, 'Pencil', 'HB Pencil'),
(24, 'BOX', 'Instrument Box'),
(25, 'BOLL', 'Rubber Ball'),
(26, 'Key Chain', 'Key chain'),
(27, 'Pen drive', 'Sandisk Pendrive'),
(28, 'Nokia 6300', 'Nokia 6300'),
(29, 'Bat', 'cricket Bat'),
(30, 'Lap Top', 'computer'),
(31, 'Tab', 'Samsung Tab'),
(32, 'Fan', 'Ceiling Fan'),
(33, 'Bag', 'School bag'),
(34, 'Sweet Corn', 'Vegitable'),
(35, 'Bananas', 'Vegitable'),
(36, 'Bulk Rolls', 'Vegitable')";

// Execute query
mysqli_query($con,$sql);
}

$sql="CREATE TABLE IF NOT EXISTS `customer_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `customer_contact1` varchar(100) NOT NULL,
  `customer_contact2` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ";

// Execute query
mysqli_query($con,$sql);

if($dummy===1){
$sql="INSERT INTO `customer_details` (`id`, `customer_name`, `customer_address`, `customer_contact1`, `customer_contact2`, `balance`) VALUES
(8, 'Chandru', 'hsr layout', '7787876786', '989898988', 0),
(9, 'dhanush', 'hsr layout', '7787876786', '989898988', 0),
(10, 'bala', 'hsr layout', '7787876786', '989898988', 0),
(11, 'suraya', 'hsr layout', '7787876786', '989898988', 0),
(12, 'sridhar', 'hsr layout', '7787876786', '989898988', 0),
(13, 'jacob', 'hsr layout', '7787876786', '989898988', 80),
(14, 'sam', 'hsr layout', '7787876786', '989898988', 6240),
(15, 'nifin', 'hsr layout', '7787876786', '989898988', 0),
(16, 'jerin', 'hsr layout', '7787876786', '989898988', 1810),
(17, 'amal', 'hsr layout', '7787876786', '989898988', 0)";

// Execute query
mysqli_query($con,$sql);
}

$sql="CREATE TABLE IF NOT EXISTS `stock_avail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ";

// Execute query
mysqli_query($con,$sql);

if($dummy===1){
$sql="INSERT INTO `stock_avail` (`id`, `name`, `quantity`) VALUES
(22, 'Cello griper', 290),
(23, 'techo tip', 900),
(24, 'cello', 0),
(25, 'ceParker Urban Fashion ', 0),
(26, 'Satzuma Diamante Pen', 0),
(27, 'Lamy Mod 17 Safari Matt ...', 0)";

// Execute query
mysqli_query($con,$sql);
}

$sql="CREATE TABLE IF NOT EXISTS `stock_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(120) NOT NULL,
  `stock_name` varchar(120) NOT NULL,
  `stock_quatity` int(11) NOT NULL,
  `supplier_id` varchar(250) NOT NULL,
  `company_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `category` varchar(120) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire_date` datetime NOT NULL,
  `uom` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34  ";

// Execute query
mysqli_query($con,$sql);


if($dummy===1){
$sql="INSERT INTO `stock_details` (`id`, `stock_id`, `stock_name`, `stock_quatity`, `supplier_id`, `company_price`, `selling_price`, `category`, `date`, `expire_date`, `uom`) VALUES
(34, 'SD1', 'Cello griper', 0, 'arjun', '9.00', '10.00', 'pen', '2013-08-15 08:31:01', '0000-00-00 00:00:00', ''),
(35, 'SD35', 'techo tip', 0, 'sadham', '8.00', '10.00', 'pen', '2013-08-15 08:31:50', '0000-00-00 00:00:00', ''),
(36, 'SD36', 'cello', 0, 'sadham', '7.00', '10.00', 'pen', '2013-08-15 08:32:08', '0000-00-00 00:00:00', ''),
(37, 'SD37', 'ceParker Urban Fashion ', 0, 'sadham', '1000.00', '1100.00', 'pen', '2013-08-15 08:33:30', '0000-00-00 00:00:00', ''),
(38, 'SD38', 'Satzuma Diamante Pen', 0, 'sadham', '500.00', '550.00', 'pen', '2013-08-15 08:33:52', '0000-00-00 00:00:00', ''),
(39, 'SD39', 'Lamy Mod 17 Safari Matt ...', 0, 'sadham', '1980.00', '2000.00', 'pen', '2013-08-15 08:34:17', '0000-00-00 00:00:00', '')";

// Execute query
mysqli_query($con,$sql);
}
$sql="CREATE TABLE IF NOT EXISTS `stock_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(120) NOT NULL,
  `stock_name` varchar(260) NOT NULL,
  `stock_supplier_name` varchar(200) NOT NULL,
  `category` varchar(120) NOT NULL,
  `quantity` int(11) NOT NULL,
  `company_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `opening_stock` int(11) NOT NULL,
  `closing_stock` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(120) NOT NULL,
  `type` varchar(50) NOT NULL,
  `salesid` varchar(120) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `mode` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `due` datetime NOT NULL,
  `subtotal` int(11) NOT NULL,
  `count1` int(11) NOT NULL,
  `billnumber` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=253";

// Execute query
mysqli_query($con,$sql);


if($dummy===1){
$sql="INSERT INTO `stock_entries` (`id`, `stock_id`, `stock_name`, `stock_supplier_name`, `category`, `quantity`, `company_price`, `selling_price`, `opening_stock`, `closing_stock`, `date`, `username`, `type`, `salesid`, `total`, `payment`, `balance`, `mode`, `description`, `due`, `subtotal`, `count1`, `billnumber`) VALUES
(261, 'PR3', 'Cello griper', 'arjun', '', 1000, '9.00', '10.00', 0, 1000, '2013-08-15 00:00:00', 'admin', 'entry', '', '9000.00', '9000.00', '0.00', 'cheque', 'uouo', '0000-00-00 00:00:00', 9000, 1, 'BILL-126'),
(262, 'PR264', 'techo tip', 'Monish', '', 1000, '8.00', '10.00', 0, 1000, '2013-08-15 00:00:00', 'admin', 'entry', '', '8000.00', '8000.00', '0.00', 'cheque', '768768', '0000-00-00 00:00:00', 8000, 1, 'BILL-126'),
(263, 'SD263', 'Cello griper', '', '', 10, '0.00', '10.00', 1000, 990, '2013-08-15 00:00:00', 'admin', 'sales', 'SD263', '100.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'BILL-126'),
(264, 'SD264', 'Cello griper', '', '', 100, '0.00', '10.00', 990, 890, '2013-08-15 00:00:00', 'admin', 'sales', 'SD264', '1000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'BILL-127'),
(265, 'SD265', 'Cello griper', '', '', 100, '0.00', '10.00', 890, 790, '2013-08-15 00:00:00', 'admin', 'sales', 'SD265', '1000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'BILL-127'),
(266, 'SD266', 'Cello griper', '', '', 100, '0.00', '10.00', 790, 690, '2013-08-15 00:00:00', 'admin', 'sales', 'SD266', '1000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'BILL-127'),
(267, 'SD267', 'Cello griper', '', '', 100, '0.00', '10.00', 690, 590, '2013-08-15 00:00:00', 'admin', 'sales', 'SD267', '1000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'BILL-127'),
(268, 'SD268', 'Cello griper', '', '', 100, '0.00', '10.00', 590, 490, '2013-08-15 00:00:00', 'admin', 'sales', 'SD268', '1000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'BILL-127'),
(269, 'SD269', 'Cello griper', '', '', 100, '0.00', '10.00', 490, 390, '2013-08-15 00:00:00', 'admin', 'sales', 'SD269', '1000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'BILL-127'),
(270, 'SD270', 'Cello griper', '', '', 100, '0.00', '10.00', 390, 290, '2013-08-15 00:00:00', 'admin', 'sales', 'SD270', '1000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 1, 'BILL-127'),
(271, 'SD270', 'techo tip', '', '', 100, '0.00', '10.00', 1000, 900, '2013-08-15 00:00:00', 'admin', 'sales', 'SD270', '1000.00', '0.00', '0.00', '', '', '0000-00-00 00:00:00', 0, 2, 'BILL-127')";

// Execute query
mysqli_query($con,$sql);
}
$sql="CREATE TABLE IF NOT EXISTS `stock_sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `transactionid` varchar(250) NOT NULL,
  `stock_name` varchar(200) NOT NULL,
  `category` varchar(120) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(120) NOT NULL,
  `customer_id` varchar(120) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `tax` decimal(10,0) NOT NULL,
  `tax_dis` varchar(100) NOT NULL,
  `dis_amount` decimal(10,0) NOT NULL,
  `grand_total` decimal(10,0) NOT NULL,
  `due` date NOT NULL,
  `mode` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `count1` int(11) NOT NULL,
  `billnumber` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29";

// Execute query
mysqli_query($con,$sql);


if($dummy===1){
$sql="INSERT INTO `stock_sales` (`id`, `transactionid`, `stock_name`, `category`, `supplier_name`, `selling_price`, `quantity`, `amount`, `date`, `username`, `customer_id`, `subtotal`, `payment`, `balance`, `discount`, `tax`, `tax_dis`, `dis_amount`, `grand_total`, `due`, `mode`, `description`, `count1`, `billnumber`) VALUES
(20, 'SD263', 'Cello griper', '', '', '10.00', '10.00', '100.00', '2013-08-15', 'admin', 'jacob', '90.00', '10.00', '80.00', '10', '87879', 'bnmnbmn', '10', '100', '1970-01-01', 'cheque', 'uuuoiuo', 1, 'BILL-126'),
(21, 'SD264', 'Cello griper', '', '', '10.00', '100.00', '1000.00', '2013-08-15', 'admin', 'sam', '990.00', '100.00', '890.00', '0', '10', '8787', '10', '1000', '1970-01-01', 'cheque', 'iyiuy', 1, 'BILL-127'),
(22, 'SD265', 'Cello griper', '', '', '10.00', '100.00', '1000.00', '2013-08-15', 'admin', 'sam', '990.00', '100.00', '890.00', '0', '10', '8787', '10', '1000', '1970-01-01', 'cheque', 'iyiuy', 1, 'BILL-127'),
(23, 'SD266', 'Cello griper', '', '', '10.00', '100.00', '1000.00', '2013-08-15', 'admin', 'sam', '990.00', '100.00', '890.00', '0', '10', '8787', '10', '1000', '1970-01-01', 'cheque', 'iyiuy', 1, 'BILL-127'),
(24, 'SD267', 'Cello griper', '', '', '10.00', '100.00', '1000.00', '2013-08-15', 'admin', 'sam', '990.00', '100.00', '890.00', '0', '10', '8787', '10', '1000', '1970-01-01', 'cheque', 'iyiuy', 1, 'BILL-127'),
(25, 'SD268', 'Cello griper', '', '', '10.00', '100.00', '1000.00', '2013-08-15', 'admin', 'sam', '990.00', '100.00', '890.00', '0', '10', '8787', '10', '1000', '1970-01-01', 'cheque', 'iyiuy', 1, 'BILL-127'),
(26, 'SD269', 'Cello griper', '', '', '10.00', '100.00', '1000.00', '2013-08-15', 'admin', 'sam', '990.00', '100.00', '890.00', '0', '10', '8787', '10', '1000', '1970-01-01', 'cheque', 'iyiuy', 1, 'BILL-127'),
(27, 'SD270', 'Cello griper', '', '', '10.00', '100.00', '1000.00', '2013-08-15', 'admin', 'jerin', '1900.00', '190.00', '1810.00', '0', '78', 'hjhjkh', '100', '2000', '1970-01-01', 'cheque', 'khksg', 1, 'BILL-127'),
(28, 'SD270', 'techo tip', '', '', '10.00', '100.00', '1000.00', '2013-08-15', 'admin', 'jerin', '1900.00', '190.00', '1810.00', '0', '78', 'hjhjkh', '100', '2000', '1970-01-01', 'cheque', 'khksg', 2, 'BILL-127')";

// Execute query
mysqli_query($con,$sql);
}
$sql="CREATE TABLE IF NOT EXISTS `stock_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ";

// Execute query
mysqli_query($con,$sql);
$sql="INSERT INTO `stock_user` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', 'admin', 'admin'); ";

// Execute query
mysqli_query($con,$sql);

$sql="CREATE TABLE IF NOT EXISTS `supplier_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_address` varchar(500) NOT NULL,
  `supplier_contact1` varchar(100) NOT NULL,
  `supplier_contact2` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ";

// Execute query
mysqli_query($con,$sql);

if($dummy===1){
$sql="INSERT INTO `supplier_details` (`id`, `supplier_name`, `supplier_address`, `supplier_contact1`, `supplier_contact2`, `balance`) VALUES
(37, 'Rahul', '#123,2nd sector ,hsr layout,nbangalore', '7787876786', '89798', 0),
(38, 'Monish', '#124,2nd sector,hsr layout,bangalore', '7787876786', '9539126325', 0),
(39, 'kiran', '#126,2nd sector,hsr layout,bangalore', '7787876786', '9539126325', 0),
(40, 'arjun', '#126,2nd sector,hsr layout,bangalore', '7787876786', '9539126325', 0),
(41, 'libin', '#126,2nd sector,hsr layout,bangalore', '7787876786', '9539126325', 0),
(42, 'sadham', '#126,2nd sector,hsr layout bangalore', '7787876786', '9539126325', 0),
(43, 'alex', '#126,2nd sector,hsr layout bangalore', '7787876786', '9539126325', 0),
(44, 'arun', '#126,2nd sector,hsr layout bangalore', '7787876786', '9539126325', 0),
(45, 'sachu', '#126,2nd sector,hsr layout bangalore', '7787876786', '9539126325', 0),
(46, 'nijan', '#126,2nd sector,hsr layout bangalore', '7787876786', '9539126325', 0),
(47, 'karthik', '#126,2nd sector,hsr layout bangalore', '7787876786', '9539126325', 0),
(48, 'santhosh', '#126,2nd sector,hsr layout bangalore', '7787876786', '9539126325', 0)";

// Execute query
mysqli_query($con,$sql);
}

$sql="CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `customer` varchar(250) NOT NULL,
  `supplier` varchar(250) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `due` datetime NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rid` varchar(120) NOT NULL,
  `receiptid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16";

// Execute query
mysqli_query($con,$sql);


$sql="CREATE TABLE IF NOT EXISTS `uom_details` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `spec` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ";

// Execute query

mysqli_query($con,$sql);
$sql="INSERT INTO `uom_details` (`id`, `name`, `spec`) VALUES
(0000000006, 'UOM1', 'UOM1 Specification'),
(0000000007, 'UOM2', 'UOM2 Specification'),
(0000000008, 'UOM3', 'UOM3 Specification'),
(0000000009, 'UOM4', 'UOM4 Specification')";

// Execute query
mysqli_query($con,$sql);
          //
          $sql="CREATE TABLE IF NOT EXISTS `store_details` (
  `name` varchar(100) NOT NULL,
  `log` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `web` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

          // Execute query
          mysqli_query($con,$sql);
          $sql="INSERT INTO `store_details` (`name`, `log`, `type`, `address`, `place`, `city`, `phone`, `email`, `web`, `pin`) VALUES
('Posnic', 'posnic.png', 'png', '133', 'HSR Layout', 'Bangalore', '779539126325', 'info@posnic.com', 'posnic.com', '600020')";

          // Execute query
          mysqli_query($con,$sql);
 $ourFileName = "config.php";
$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
$data = '<?php $config["database"] = "'.$name.'"; $config["host"]= "'.$host.'";$config["username"]= "'.$user.'"; $config["password"]= "'.$pass.'";?>';
fwrite($ourFileHandle, $data);
fclose($ourFileHandle);
 header("location:user_details.php");


?>



<?php



        }else{
          header("location:instal.php");
        }
 //

?> 