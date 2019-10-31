<?php
	session_start();
?>

<html>
	<head>
		<title>
			All Contacts
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
                float:right;
            }	
			td,th
			{
				width:25%;
				background-color:rgb(140, 181, 247);
				text-align:center;
				border-bottom:1px solid black;
			}
            .clearfix {
                clear:both;
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
    
    <?php 
        include('connection.php');
        $query = "SELECT * FROM ".$_SESSION['user'];
        $queryResult = mysqli_query($con, $query);
        if (mysqli_num_rows($queryResult) > 0) {
            echo "<div class='jumbotron'>
                <table class='table table-responsive'>
                    <thead>
                        <tr>
                            <th>Sr.no</th>
                            <th>Contact Name</th>
                            <th>Contact Number</th>
                        </tr>
                    </thead>";
            echo '<tbody>';
            $count = 1;
            while($row = mysqli_fetch_assoc($queryResult)) {
                $contactName = $row['contact_name'];
                $contactNumber = $row['contact_no'];
                echo "<tr>
                        <td>$count</td>
                        <td>$contactName</td>
                        <td>$contactNumber</td>
                    </tr>";
                $count++;
            }
            echo '</tbody></table></div>';
        } else {
            echo "<div class='container'>
                    <h1>No Contacts found.</h1>
                </div>";
        }
    ?>
	<br>
	<br>
	<br>
		<?php
        include("navigationbar.php");
          
	?>
    <div class="clearfix"></div>
        <?php include("../html/footer.html");
        ?>
</html>
<?php
	if(isset($_POST['signout']))
	{
		session_unset();
		session_destroy();
	}
?>