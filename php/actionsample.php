<?php
	session_start();
?>
<html>
	<style>
		header
		{
			background-color: black;
			color:white;
			height:25%;
		}
		.history
		{
			width:30%;
			height:100%;
			overflow:auto;
			border:2px solid black;
			border-radius:0px;
			text-align: justify;
		}
		.Display-3
		{
			float:left;
		}
		#usr-pwd
		{
			width:35%;
			height:100%;
			position:absolute;
			left:65%;
			top:25%;
			border:2px solid black;
		}
		.services
		{
			margin-left:30%;
			height:100%;
			width:35%;
			overflow:auto;
			position:absolute;
			top:25%;
			border:2px solid black;
		}
	</style>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"></link>
	</head>
	<header>
		<div class="container">
			<h4 class="display-2">The Directory.<h4>
			<h5 class="display-5">A safe and secure way to store your contacts.</h5>
		</div>
	</header>
	
	<div class="jumbotron history">
		<h1 class="Display-5">History</h1>
		<br>
		<img src="../pictures/tele.jpeg">
		<p>
			<br>
			 A telephone directory, also known as a telephone book, telephone address book, phone book, or the white/yellow pages, is a listing of telephone subscribers in a geographical area or subscribers to services provided by the organization that publishes the directory. Its purpose is to allow the telephone number of a subscriber identified by name and address to be found.
		</p>
		<a href="https://en.wikipedia.org/wiki/Telephone_directory">Read More</a>
	</div>

	<div class="jumbotron services">
		<h1 class="display-5">Services</h1>
			<ol>
				<li><h6 class="display-6">Add a contact.</h6>
					<p>Add contacts that are securely stored in our database.<br>
					</p>
				</li>
				<li><h6 clas="Display-6">Update existing contacts.</h6>
					<p>Dynamically update contacts with ease.</p>
				</li>
				<li><h6 class="Display-6">Delete contacts.</h6>
					<p>Delete all the contacts which you don't need with just a click!</p>
				</li>
				<li><h6 class="Display-6">Search contacts.</h6>
					<p>Search for contacts with easy to use UI</p>
				</li>
			</ol>
	</div>
		<div class="jumbotron" id="usr-pwd" align="center">
			<form method="post">
				<label><h5 class="Display-5">Username:</label>
				<input type="Text" class="form-control" name="usr" placeholder="Enter your username" required></input>
				<br>
				<label><h5 class="Display-5">Password:</label>
				<input type="Password" class="form-control" name="pwd" placeholder="enter your password" required></input>
				<br>
				<input type="submit" class="btn btn-info btn-lg" name="login" value="LOG IN!"></input>
					<br>
					<br>
				<a href="signup.php">Not a member yet? Register now</a>
			</form>
		</div>
		<?php
		include("../html/footer.html");
	?>

</html>

<?php
	include("connection.php");
	if(isset($_POST['login']))//listens for login button
	{
		$us=$_POST['usr'];
		$pass=md5($_POST['pwd']);

		$query1="Select password from information where username='$us' ;";
		$result1=mysqli_query($con,$query1);
		
		if(mysqli_num_rows($result1)>0)//username exists
		{
			$query2="select * from information where username='$us' and password='$pass' ;";
			$result2=mysqli_query($con,$query2);

			if(mysqli_num_rows($result2)>0)//username and password match
			{
				//create session for user as user is successfully m_validateidentifier(conn, tf)
				$_SESSION["user"]=$us;
				echo $_SESSION["user"];
				echo '<script>alert("Login Successful...")</script>' ;
				header("location:actionlogin.php");
			}
			else
			{
				echo '<script>alert("Username or password incorrect")</script>';
			}
		}
		else
		{
			echo '<script>alert("Username or password incorrect")</script>';
		}
	}
?>