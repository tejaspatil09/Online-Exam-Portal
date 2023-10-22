<?php
include("connection.php");
$db=mysqli_select_db($con,"registration");
if(!$db)
{
	die("not connect");
}
$email=$_REQUEST["email"];
$name=$_REQUEST["nm"];
$req_pwd=$_REQUEST["pwd"];
if($name=="" && $req_pwd=="")
{
	header("Location:index.php");
}
else{
	$val=mysqli_query($con,"select count(*) as ct from user_reg where uname='$name'");
	while($row_row=mysqli_fetch_assoc($val))
	{
		$res=$row_row["ct"];
	}
	if($res==0)
	{
		$sql1=mysqli_query($con,"insert into user_reg (uname,pwd,email,reg_date) values ('$name','$req_pwd','$email',CURRENT_TIMESTAMP)");
		$msg="Congratulations"." ".$name." "."You Are Successfully Registered.";
	}
	else{
		$msg="Sorry Username Alrady Exist.Try Another One.";
	}
}
?>
<html>
<head><meta name="viewport" content="width=device-width,initial-scale=1.0" >
	<link rel="stylesheet" type="text/css" href="register.css">
	 <link rel="stylesheet" type="text/css" href="common.css">
	 <title>Registration Success</title>
 </head>  
	<body>
	 <div class="title"><i>Online Examination Portal</i></div>
	<div class="div1">
		<p class="p1"><?php echo $msg; ?></p>
		<button class="btn" onclick="login()">Login</button>
	</div>
	</body>
	<script lang="js">
		function login()
		{
			window.open("index.php","_self");
		}
	</script>
</html>