<?php
	session_start();
?>
<?php
		include("../html/bootstrapInclusion.html");
?>
<html>
	<head>
		<link rel="stylesheet" href="css/searchcontactcss.css">
		<style>
			header
			{
				background-color: black;
				color:white;
				height:25%;
			}
		</style>
	</head>

	<header align="center">
		<h1 class="display-2">The Directory</h1>
		<h5 class="display-5">A safe and secure way to store your contacts.</h5>
		<br>
	</header>
	<br>
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

	<body>
		<br>
		<br>
		<div class="container">
			<div class="jumbotron" align="center">
				<h5 class="display-5">update a contact</h5>
				<form method="post">
					<input type="text"  class="form-control" value=<?php echo $_SESSION["updt_cont"];?> name="updatename"></input>
					<br>
					<input type="text"  class="form-control" value=<?php echo $_SESSION["updt_no"];?> name="updateno"></input>
					<br>
					<input type="submit" class="btn btn-info btn-lg" name="save" value="Save!"></input>
				</form>
			</div>
		</div>
	</body>
	<?php
		include("../html/footer.html");
	?>

</html>

<?php
	if(isset($_POST['save']))
	{
		$con=mysqli_connect("localhost","root","","users");
		$no=$_POST['updateno'];
		$name=$_POST['updatename'];
		$query="Insert into ".$_SESSION['user']." values('$name','$no');";

		$result=mysqli_query($con,$query);
		if($result)
		{
			echo '<script>alert("Contact updated Successfully...");</script>';
		}
		else
		{
				echo '<script>alert("Contact not updated ...");</script>';
		}
	}
?>