<?php if(!isset($_SESSION)) { session_start(); } ?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>My-tour bootstrap Design website | Home :: w3layouts</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" />

<link href="../css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">




<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>

<!--/js-->
<!--animated-css-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->
</head>
<body>
<!--header-->
<!--sticky-->
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>


<?php include('function.php'); ?>



<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div class="col-sm-9">




<form method="post">
<table border="0" width="90%" height="300px" align="center" class="tableshadow">
<tr><td class="toptd">View Enquiry</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="0" align="center" width="95%">
<tr><td style="font-size:15px; padding:5px; font-weight:bold;" >Package Name</td>
<td style="font-size:15px; padding:5px; font-weight:bold; ">Package Id</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Name</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Gender</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Mobile No.</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Email</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">No. of Days</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">No. of Children</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">no. of Adults</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Status Field</td></tr>


<?php

$s="select * from enquiry,package where enquiry.Packageid=package.Packid";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{

	
		echo "<td style=' padding:5px;'>$data[12]</td>
		<td style=' padding:5px;'>$data[1]</td>
		<td style=' padding:5px;'>$data[2]</td>
		<td style=' padding:5px;'>$data[3]</td>
		<td style=' padding:5px;'>$data[4]</td>
		<td style=' padding:5px;'>$data[5]</td>
		<td style=' padding:5px;'>$data[6]</td>
		<td style=' padding:5px;'>$data[7]</td>
		<td style=' padding:5px;'>$data[8]</td>
		<td style=' padding:5px;'><a href='chstatus.php?eid=$data[0]'>$data[10]</a></td>
		</tr>";

}




?>

</table>
</td></tr></table>

</form>



</div>


</div>
<?php include('bottom.php'); ?>
</body>
</html>