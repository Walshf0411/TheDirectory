<?php
	session_start();

	//signout action
	if(isset($_POST['signout']))
	{
		session_unset();
		session_destroy();
		header("Location:./html/sample.html");
	}
	//check whether user is logged in or no
	if(!isset($_SESSION["user"]))
	{
		header("location:actionsample.php");
	}


	//ESTABLISH CONNECTION
	include("connection.php");

	//DISPLAY ALL CONTACTS
	$sql_query= "Select * from ".$_SESSION["user"].";";
	
	//QUERY EXECUTION
	$result=mysqli_query($con,$sql_query);

	//CHECK WHETHER NON-ZERO CONTACTS ARE THERE
	if(mysqli_num_rows($result)>0)
	{
		echo "CONTACT NAME     ||    CONTACT NUMBER";
		
		while($row=mysqli_fetch_assoc($result))//Display all the contacts belonging to a particular user
		{
			echo '<html><br></html>'.$row["contact_name"] .'<html>||</html>'. $row["contact_no"];
		}

	}
	else
	{
		echo '<script>alert("NO CONTACTS CREATED FOR.FIRST CREATE CONTACTS")</script>';
	}

?>