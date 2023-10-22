<?php
$username=$_REQUEST["un"];
$password=$_REQUEST["pwd"];
include ("connection.php");
if(!$con)
{
	die("connetion");
}
if($_REQUEST["un"]=="") 
{
	//header("Location:index.php");
}
else if($_REQUEST["pwd"]=="")
{
	//header("Location:index.php");
}
$res="Please Enter Valid Username";
mysqli_select_db($con,"registration");
$sql=mysqli_query($con,"select * from user_reg where uname='$username'");
while($row=mysqli_fetch_assoc($sql))
{
	
	$db_un=$row["uname"];
	$db_pwd=$row["pwd"];
	if($username==$db_un && $password==$db_pwd)
	{
		session_start();
		$_SESSION["user"]=$username;
		header("Location:selectpaper.php");
	}
	else{
		$res="Invalid Username or password";
	}
	echo mysqli_error($con);
}

?>
<html>
<head><meta name="viewport" content="width=device-width,initial-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="common.css">
	<link rel="stylesheet" type="text/css" href="valid.css">
</head>
	<body>
	<div class="title"><i>Online Exam Portal</i></div>
		<div class="div1">
			<p class="p1">Error</p>
		<p class="res"><?php echo $res; ?></p>
		<button class="btn" onclick="login()">Login</button>
		</div>
	<script lang="js">
		function login()
		{
			window.open("index.php","_self");
		}
	</script>
	</body>
</html>