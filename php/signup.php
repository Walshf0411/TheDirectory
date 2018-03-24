<?php
	include("../html/bootstrapInclusion.html");
 ?>

 <html>
 	<head>
 		<link rel="stylesheet" href="css/signupcss.css">
 		<style>
 			header
			{
				background-color: black;
				color:white;
				height:25%;
			}
 		</style>
 	</head>
	<header>
		<div class="container">
			<h4 class="display-2">The Directory.<h4>
			<h5 class="display-5">A safe and secure way to store your contacts.</h5>
		</div>
	</header>
	<body>
	 	<div class="container" align="center">
			<div class="jumbotron">
				<h5 class="display-5" align="center">SIGNUP</h5>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">

						<label><h6>Username:</h6></label>
						<input type="text" class="form-control" name="usr" placeholder="Enter a suitable username" required>
						<br>
						<label><h6>Password:</h6></label>
						<input type="Password" class="form-control" name="pwd" placeholder="Password should be minimum 8characters and maximum 14 characters" required>
					</div>

						<br>

							<label><h6>Gender:</h6></label>
							<div class="Radio">
								<input type="Radio" name="option" value="male" checked>Male</input><br>
								<input type="Radio" name="option" value="female">Female</input><br>
								<input type="Radio" name="option" value="others">Others</input><br>
							</div>

						<br>

						
							<label><h6>Upload a profile Picture</h6></label><br>
							<input type="file" name="img" required></input>
						

						<div align="center">
							<button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
						</div>
					</form>
				</div>
		</div>
	</body>
	<?php
		include("../html/footer.html");
	?>

 </html>
 <?php
 if(isset($_POST['submit']))
 {
 	include("connection.php");
	$us=$_POST["usr"];
	$pwd=md5($_POST["pwd"]);
	$gender=$_POST["option"];
	$img=$_FILES['img']['name'];
	
	$imgpath='../uploads/'.$img;

	$query1="SELECT username FROM information WHERE username='".$us."'";
	$result1=mysqli_query($con,$query1);

	if(mysqli_num_rows($result1)==1)
	{
		echo '<script>alert("Username already exists...")</script>';
		header("Location:signup.php");
	}

	$query2="INSERT INTO information VALUES('".$us."','".$pwd."','".$gender."','".$imgpath."')";
	$result2=mysqli_query($con,$query2);

	$result3=move_uploaded_file($_FILES['img']['tmp_name'], $imgpath);

	if($result2 && $result3)
	{
		$create_table="create table if not EXISTS $us
						(
    						contact_name varchar(30) primary key,
  							contact_no varchar(10)
						);";
		$result4=mysqli_query($con,$create_table);
		echo '<script>alert("Signed in successfully...")</script>';
		header("location:actionsample.php");
	}
	else
	{
		echo '<script>alert("Sign in unsuccessful...")</script>';
		header("location:actionsample.php");
	}
 }
	
?>