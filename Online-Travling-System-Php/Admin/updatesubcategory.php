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
	
	$target_dir = "subcatimages/";
	$target_file = $target_dir.basename($_FILES["t3"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	
	if(move_uploaded_file($_FILES["t3"]["tmp_name"], $target_file)){
			
	}else{
			echo "sorry there was an error uploading your file.";
		}
		}
?>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();

if (empty($_FILES['t3']['name'])) {
	
	$s="update subcategory set Subcatname='" . $_POST["t1"] ."',Catid='" . $_POST["t2"] . "',Pic='" . $_POST["h1"] . "',Detail='" . $_POST["t4"] . "' where Subcatid='" . $_POST["s1"] . "'";
	
}
else
{
	
		 $s="update subcategory set Subcatname='" . $_POST["t1"] ."',Catid='" . $_POST["t2"] . "',Pic='" .  basename($_FILES["t3"]["name"]) . "',Detail='" . $_POST["t4"] . "' where Subcatid='" . $_POST["s1"] . "'";}
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Update');</script>";
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
<table border="0" width="450px" height="500px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Update Subcategory</td></tr>
<tr><td class="lefttxt">Select Subcategory</td><td><select name="s1" required/><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from subcategory";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["show"])&& $data[0]==$_POST["s1"])
	{
		echo"<option value=$data[0] selected>$data[1]</option>";
	}
	else
	{
		echo "<option value=$data[0]>$data[1]</option>";
	}
}
mysqli_close($cn);



?>

</select>
<input type="submit" value="Show" name="show" formnovalidate/>
<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from subcategory where subcatid='" .$_POST["s1"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

$data=mysqli_fetch_array($result);
$Subcatid=$data[0];
$Subcatname=$data[1];
$Catid=$data[2];
$Pic=$data[3];
$Detail=$data[4];

mysqli_close($cn);

}

?>

</td></tr>

<tr><td class="lefttxt">Subcategory Name</td><td><input type="text" value="<?php if(isset($_POST["show"])){ echo $Subcatname ;} ?> " name="t1" required pattern="[a-zA-z1 _]{1,50}" title="Please Enter Only Characters and numbers between 1 to 50 for Subcategory Name" /></td></tr>
<tr><td class="lefttxt">Select Category</td><td><select name="t2"  value="<?php if(isset($_POST["show"])){ echo $Catid ;} ?> " required="required" pattern="[a-zA-z1 _]{1,50}" title"Please Enter Only Characters and numbers between 1 to 50 for Company name"/><option value="Select">Select</option>

<?php
$cn=makeconnection();
$s="select * from category";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["show"]) && $data[0]==$Catid)
	{
		echo "<option value=$data[0] selected>$data[1]</option>";
	}
	else
	{
		echo "<option value=$data[0]>$data[1]</option>";
	}
	
}
mysqli_close($cn);
?>
</select>

<tr><td class="lefttxt">Old Pic</td><td><img src="subcatimages/<?php echo @$Pic; ?>" width="150px" height="100px" / >
<input type="hidden" name="h1" value="<?php if(isset($_POST["show"])) {echo $Pic;} ?>" />
</td></tr>

<tr><td class="lefttxt">Upload Pic</td><td><input type="file" name="t3" /></td></tr>
<tr><td class="lefttxt">Details</td><td><textarea name="t4" /><?php if(isset($_POST["show"])){ echo $Detail ;} ?></textarea></td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="Update" name="sbmt" /></td></tr>

</table>
</form>

</div>


</div>
<?php include('bottom.php'); ?>

</body>
</html>


             