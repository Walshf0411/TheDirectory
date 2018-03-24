<?php
	session_start();
?>

<html>
	<?php
		include("../html/bootstrapInclusion.html");
	?>
	<head>
		<title>
			The Directory
		</title>
		<link rel="stylesheet" href="css/addcontactcss.css">
		<style>
		header
		{
			background-color: black;
			color:white;
			height:25%;
		}
		.jumbotron
		{
			width:30%;
			height:45%;
			margin-left:45%;
		}	
		</style>
	</head>
	<header>
		<div class="container">
			<h4 class="display-2">The Directory.<h4>
			<h5 class="display-5">A safe and secure way to store your contacts.</h5>
		</div>
	</header>
	<div class="container" align="right">
		<form method="post">
			<input type="submit" class="btn btn-danger" name="signout" value="SIGN OUT"></input>
		</form>
	</div>
	<?php
		if(isset($_POST['signout']))
		{
			session_unset();
			session_destroy();
			header("Location:../html/sample.html");
		}
	?>
	<?php
		if(!isset($_SESSION["user"]))
		{
			header("location:actionsample.php");
		}
	?>

	<!--CODING STARTS HERE -->	
	
	<body>
		<?php
			include("navigationbar.php");
		?>
		<div class="container">
			<div class="jumbotron" align="center">
				<form method="post">
					<h5 class="Display-5">Add a new Contact</h5>
					<br>
					<input type="text" class="form-control" name="contact_name" placeholder="Enter contact to be stored" required></input>
					<br>
					<input type="text" class="form-control" name="contact_no" placeholder="Enter contact number" required></input>
					<br>
					<input type="submit" class="btn btn-info" name="add_contact" value="Add Contact!">
					<br>
				</form>
			</div>
		</div>
	</body>
	<?php
		include("../html/footer.html");
	?>

</html>

<!--PHP BEGINS HERE-->

<?php
if(isset($_POST['add_contact']))
{
	include("connection.php");
	$uname=$_POST['contact_name'];
	
	$cno=$_POST['contact_no'];
	
	$sql_query="Select * from ".$_SESSION["user"]." where contact_name=$uname ";//query fo contact existence
	
	$result=mysqli_query($con,$sql_query);

	//CHECK WHETHER CONTACT EXISTS
	if(mysqli_num_rows($result)>0)
	{
		echo '<script> alert("CONTACT ALREADY EXISTS")</script>';
	}
	//NEW CONTACT ADDED
	else
	{
		$query= "Insert into ".$_SESSION["user"]." values ('$uname','$cno');";	
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo '<script>alert("contact successfully saved...");</script>';
		}
		else
		{
			echo '<script>alert("contact not saved");</script>';
		}
	}
}
?>
