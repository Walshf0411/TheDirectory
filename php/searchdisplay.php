<?php
	session_start();
?>

<html>
	<head>
		<title>
			My contacts.
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<style>
			header
			{
				background-color: black;
				color:white;
			}
			.jumbotron
			{
				text-align:center;
				width:45%;
				height:45%;
				margin-left:27%;

			}
			td,th
			{
				width:25%;
				background-color:rgb(140, 181, 247);
				text-align:center;
				border-bottom:1px solid black;
			}
		</style>
	</head>
	<?php
		if(!isset($_SESSION["user"]))//session check
		{
			header("Location:actionsample.php");
		}
	?>
	

	<header>
		<div class="container-fluid" align="center" alt="Profile Picture">
			<h1 class="Display-3">Welcome,<?php echo $_SESSION["user"]?> </h1>
		</div>
		<div class="container" align="right">
		<form method="post" action="actionsample.php">
			<input type="submit" class="btn btn-danger" name="signout" value="SIGN OUT"></input>
		</form>
	</div>
	</header>
	<br>
	<br>
	<br>
		<?php
		include("navigationbar.php");
	?>

</html>

<?php
	include("connection.php");
	$uname=$_POST['search'];
	$query="Select * from ".$_SESSION["user"]." where contact_name='$uname';";
	$result=mysqli_query($con,$query);

	if(mysqli_num_rows($result)>0)//contacts exist
	{
		echo '<div class="jumbotron">';
		echo "<table>";
		echo "<tr><th><br>Contact Name</th><th><br>Contact Number</th></tr>";
		while($row=mysqli_fetch_assoc($result))
		{
			echo '<tr><td><br>'.$row['contact_name'].'</td><td><br>'.$row['contact_no'].'</td></tr>';
		}
		echo "</table>" ;
		echo '</div>';
	}
	else
	{
		echo '<script>alert("contact does not exist");</script>';
		header("Location:searchcontact.php");
	}
	include("../html/footer.html");
?>
<?php
	if(isset($_POST['signout']))
	{
		session_unset();
		session_destroy();
	}
?>