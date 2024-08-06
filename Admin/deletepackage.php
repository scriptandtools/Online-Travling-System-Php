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




<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="delete from package  where packid='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Delete');</script>";
    }
?>



<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div class="col-sm-9">




<form method="post" enctype="multipart/form-data">
<table border="0" width="400px" height="150px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Delete Package</td></tr>
<tr><td class="lefttxt">Select Package</td><td><select name="t1" required/><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from package";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
		
			echo "<option value=$data[0]>$data[1]</option>";
		
	
}
mysqli_close($cn);
?>
</select>
</td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="Delete" name="sbmt" /></td></tr>

</table>
</form>

</div>


</div>
<?php include('bottom.php'); ?>

</body>
</html>


             