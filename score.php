<?php 
session_start();

	include("connection.php");
	include("functions.php");
     
	 $user_data = check_login($con);
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//get from the form
		$score = $_POST['score_'];
		

			//save to database
			
			
			$query ="UPDATE users SET score = '$score' WHERE user_name = '$user_data[user_name]'";
			mysqli_query($con, $query);

			header("Location: order.php");
			die;
		
	}
?>
