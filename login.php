<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//get data from the form
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo '<script>alert("Wrong username or password! \\n Please try again")</script>';
		}
		else
		{
			echo '<script>alert("Please enter valid data!")</script>';

		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
</head>
<body>

	<style type="text/css">


	input[type=submit] {
		font-family: monospace;
	}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
		box-shadow: 5px 5px 5px rgba(0,0,0,0.2);

	}

	#button{ 

		padding: 10px;
		width: 100px;
		text-align: center;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		transition-duration: 0.4s;
		cursor: pointer;
		background-color: white; 
		color: #6D83FB; 
		border: 2px solid #6D83FB;
		box-shadow: 5px 7px 7px rgba(0,0,0,0.2);
		border-radius: 15px;
	}

	#button:hover {
		background-color: #6D83FB;
		color: white;
	}

	#button:active {
		background-color: white;
		box-shadow: 0 5px #666;
		transform: translateY(4px);
	}

	#box{

		background-color: #7B809E;
		margin: auto;
		width: 300px;
		padding: 40px;
		text-align: center;
		border-radius: 25px;
		margin-top: 20px;
		box-shadow: 10px 10px 5px rgba(0,0,0,0.2);
	}

	#pstyle{
		font-size: 15px;
		margin: 10px;
		color: white; 
		text-align:left;
		font-family: monospace;
	}

	a{
		text-decoration: none;
	}

	</style>

	<div id="box">
		
		<form method="post"  >
			<div style="font-size: 25px;color: white; font-family:Fantasy;">Game Name</div><br>
			
			<p id="pstyle"><lable>Username:</lable></p>
			<input id="text" type="text" name="user_name"><br>

			<p id="pstyle"><lable>Password:</lable></p>
			<input id="text" type="password" name="password" ><br><br>

			<input id="button" type="submit" value="Log in"><br><br>

			<p style="font-size: 15px; margin: 10px; color: white; font-family: monospace; ">
			Don't have an account? 
			<a href="signup.php">Sign up</a></p>
		</form>
	</div>
</body>
</html>