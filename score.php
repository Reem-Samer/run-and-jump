<?php 
session_start();

	include("connection.php");
	include("functions.php");
     //include("login.php");
	 $user_data = check_login($con);
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$score = $_POST['score_'];
		//$name=($user_data['user_name']);
		//$user_name = $_POST['user_name'];
		

			//save to database
			
			//$query = "insert into users (score) values ('$score') where user_name = '$user_name'";
			//$query = "update users set (score) values ('$score') ";
			$query ="UPDATE users SET score = '$score' WHERE user_name = '$user_data[user_name]'";
			mysqli_query($con, $query);

			header("Location: order.php");
			die;
		
	}
?>
