<?php
	session_start();
?>
<html>
	<head>
		<title>
			Profile
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<style>
			header
			{
				background-color: black;
				color:white;
			}
			#profile-pic
			{
				height:20%;
				width:15%;
			}
			#usr-details
			{
				margin-left:45%;
				width:30%;
				height:50%;
			}
		</style>
	</head>
	
	<header>
		<div class="container-fluid" align="center" alt="Profile Picture">
			<h1 class="Display-3">Welcome,<?php echo $_SESSION["user"]?> </h1>
		</div>
	</header>
	<?php
		if(!isset($_SESSION["user"]))//session check
		{
			header("location:actionsample.php");
		}
	?>
	<!-- Sign out button, to be added to all pages where user is logged in-->
	<div class="container" align="right" style="margin-left:10%">
		<form method="post">
			<input type="submit" class="btn btn-danger" name="signout" value="SIGN OUT"></input>
		</form>
	<!--Sign out ends here-->
		<form method="post" action="displaycontacts.php">
			<input type="submit" class="btn btn-info" name="display" value="Display"></input>
		</form>
	</div>
	<body>
		<?php
			include("navigationbar.php");
		?>
		
		<div class="container" id="usr-details" align="center"><!--Container with all the user details-->
			<div class="jumbotron" align="center">
				<br>

				<?php //imagepath recovery for display as profile picture
					include("connection.php");
					$query="Select imagepath from information where username='".$_SESSION["user"]."';";
					//echo $query;
					$result=mysqli_query($con,$query);
					while($row=mysqli_fetch_assoc($result))
					{
						$_SESSION["imagepath"]=$row["imagepath"];
					}
				?>

					<img src="<?php echo $_SESSION["imagepath"]; ?>" width=100 height=100>
					<p align="left">
						<br>
						<b>Username:</b>
						<?php echo $_SESSION["user"] ;?>
						<br>
						<b>Gender:</b>

						<?php //to recover the gender of the current session user
						include("connection.php");
						$sql="Select gender from information where username='".$_SESSION["user"]."';" ;
						$result=mysqli_query($con,$sql);
						while($row=mysqli_fetch_assoc($result))
						{
							echo $row["gender"];
						}
						?>
					</p>
			</div> 	
		</div>
	</body>
	<?php
		include("../html/footer.html");
	?>
</html>

<?php
	if(isset($_POST['signout']))//signout action
	{
		session_unset();	
		session_destroy();
		header("Location:../html/sample.html");
	}
?>
