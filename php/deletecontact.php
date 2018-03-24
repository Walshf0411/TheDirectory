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
			.jumbotron
			{
				width:30%;
				height:45%;
				margin-left:35%;
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
			header("Location:sample.html");
		}
	?>
	<?php
		if(!isset($_SESSION["user"]))
		{
			header("location:actionsample.php");
		}
	?>

	<body>
		<?php
			include("navigationbar.php");
		?>
		<br>
		<br>
		<div class="container">
			<div class="jumbotron" align="center">
				<h5 class="display-5">Delete a contact</h5>
				<form method="post">
					<input type="text"  class="form-control" placeholder="Enter a name to get contact details" name="search"></input>
					<br>
					<input type="submit" class="btn btn-danger btn-lg" name="search_btn" value="Delete!"></input>
				</form>
			</div>
		</div>
	</body>
	<?php
		include("../html/footer.html");
	?>

</html>


<?php
	if(isset($_POST['search_btn']))
	{
		$uname=$_POST['search'];
		$con=mysqli_connect("localhost","root","","users");
		
		$sql_query="Select * from ".$_SESSION["user"]." where contact_name='$uname';";
		
		$result=mysqli_query($con,$sql_query);

		//CHECK WHETHER CONTACT EXISTS
		if(mysqli_num_rows($result)>0)
		{
			$query="Delete from ".$_SESSION["user"]." where contact_name='$uname';" ;
			$result1=mysqli_query($con,$query);
			echo '<script>alert("Contact deleted...")</script>';
		}
		else
		{
			echo '<script>alert("CONTACT DOES NoT EXIST.CREATE IT FIRST")</script>';
		}
	}
?>
