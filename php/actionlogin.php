<?php
	session_start();
?>
<html>

<!--ALL LINKS NEEDED START HERE-->
	<head>
		<title>
			Profile
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"></link>
		<link rel="stylesheet" href="../css/actionlogincss.css">
		<style>
 			header
			{
				background-color: black;
				color:white;
				height:25%;
			}
 		</style>
	</head>
<!--ALL LINKS NEEDED END HERE-->

<!--ALL HTML DESIGNING CODES-->
		<header>
		<div class="container">
			<h4 class="display-2">The Directory.<h4>
			<h5 class="display-5">A safe and secure way to store your contacts.</h5>
		</div>
	</header>
	<?php
		if(!isset($_SESSION["user"]))
		{
			header("location:actionsample.php");
		}
	?>
	<br>
	<div class="container" align="left">
		<a href="Profile.php"><button class="btn btn-info">Profile</button></a>
	</div>
	<div class="container" align="right">
		<form method="post">
			<input type="submit" class="btn btn-danger" name="signout" value="SIGN OUT"></input>
		</form>
	</div>
	<br>
	<body>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-3 jumbotron" id="btn_add">
					<a href="addcontact.php 	" style="text-decoration:none;color:black">
						<br>
						<h5>Add a new Contact</h5>
						Adds a new entry in your contact book.
						<br>
					</a>
				</div>

				<div class="col-md-3 jumbotron" id="btn_update">
					<a href="updatecontact.php" style="text-decoration:none;color:black">
						<br>
						<h5 >Update existing Contact</h5>
						Updates your desired Contact.
						<br>
					</a>
				</div>

				<div class="col-md-3 jumbotron" id="btn_delete">
					<a href="deletecontact.php" style="text-decoration:none;color:black">
						<br>
						<h5>Delete a Contact</h5>
						Removes your selected entry from the contact book.
					</a>
				</div>

				<div class="col-md-3 jumbotron" id="btn_search">
					<a href="searchcontact.php" style="text-decoration:none;color:black">
						<br>
						<h5>Search for a contact</h5>
						Fetches details of your desired Contact.
						<br>
					</a>
				</div>
			</div>
		</div>

	</body>
	<?php
		include("../html/footer.html");
	?>

<!--ALL HTML DESIGNING CODES END HERE-->

</html>
<?php
	if(isset($_POST['signout']))
	{
		session_unset();	
		session_destroy();
		header("Location:../html/sample.html");
	}
?>