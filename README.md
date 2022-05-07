# run-and-jump
![Screenshot](college.png)


 In this project, we built a jump and run browser game that built into Google Chrome web browser. Our players had to avoid the F failure by jumping above it to achieve the higher score, all players can challenge each other and win by achieving the highest score.

# Look & Feel:
In our game we wanted to do a related design to our life in college, so we set the character to be a student that wants to avoid obstacles which in this case is failing classes -getting an F in a class.

We wanted to add more fun and interactive things so the user can enjoy playing the game so we add hover and click functions so that if the user hovers or clicks over some objects it can change background color, shadow, and or font color.

# Dynamic Components:
We used javascript to interact with the game, the class was called script2.js.

Student and F (Fail) variables are defined and linked to classes more than one variable has been defined using a time element the document method getElementById() returns an element object representing the element whose identifier property matches the given string.
New Object has also been defined in the audio variable, which is the Audio Generator creates and returns a new HTMLAudioElement that can be used either to add audio components to a document for users to interact with or listen to or off-screen to manage and play audio files.
The function jump ()and play() was used so that the student can start the game. One of the tasks that this function performs is setTimeout() the global specifies a timer that executes a specific function or piece of code once the timer has expired.
Cleartext has been included the clearRect() method sets the pixels in a rectangular area to transparent black. The upper left corner of the rectangle is at ( myScore.width, myScore.height), and its volume is specified by width and height the parameter had the width and length of the score.
Finally, we used the file text, which is a fillText() is a method for a 2D drawing context. The fillText() method allows you to draw a text string in a format with the fill derived from the current fill pattern. Add to it the points earned by the student.
A function has been created in the name of setInterval().It had the status of the student , F and how to stop the game When the student fails to jump from the F, we add the if condition so that the game will stop so that it will show "game over".
The figure below shows the function.php file code:
const student = document.getElementById("student");
const fail = document.getElementById("fail");
let counter =0;
var jaudio = new Audio('human-jump.mp3');
var oaudio = new Audio('game-over.mp3');
var myScore = document.getElementById("myScore");
var text = myScore.getContext("2d");
var score = 0;

    alert(" Press ok to start!");
    
function jump() {
  jaudio.play();
    if (student.classList != "jump") {
      student.classList.add("jump");
      jaudio.play();
      setTimeout(function () {
        text.clearRect(0, 0, myScore.width, myScore.height);
   //Update score
        score++;
        text.fillText("Score: " +score, 8, 20 );
       
        student.classList.remove("jump");
      }, 300);
    } 
   
  }


  let isAlive = setInterval(function () {

    // get current dino Y position
    let studentTop = parseInt(window.getComputedStyle(student).getPropertyValue("top"));
  
    // get current cactus X position
    let failleft = parseInt(
      window.getComputedStyle(fail).getPropertyValue("left")
    );
   
    // detect collision
    if (failleft < 50 && failleft > 0 && studentTop >= 140) {
      // collision
      oaudio.play();
      
      alert("Game Over!"  );
        if(score==0){
            document.getElementById("fail").style.display = 'none';
            var scoreHtml=document.getElementById("score");
     
    scoreHtml.value="0";
    document.getElementById("submit").style.display.hidden;
      document.getElementById("submit").click();
      document.getElementById("fail").style.display = 'none';
        }
      else{ document.getElementById("fail").style.display = 'none';
      
      var scoreHtml=document.getElementById("score");
     
    scoreHtml.value=score;
    document.getElementById("submit").style.display.hidden;
      document.getElementById("submit").click();
      document.getElementById("fail").style.display = 'none';
      }
    
     

      
    }
   
  }, 10);
   
  document.addEventListener("keydown", function (event) {
    
    jump();
    
  });
  
  
# Business Logic:
Business logic is the programming that manages communication between an end-user interface and a database. Business logic describes the sequence of operations associated with data in a database to carry out the business rule. In our project, we will talk about the structure of the database and the authentication step.
# Database Structure:
The database contains one table for users, when the user signs up, the database stores his/her unique id, name, password, date of account creation, and score with a default value of zero. When the user plays and gets a new score, his/her score the database updates the score to the last score the player gains.
# Authentication Step:
The player must enter his name and password to create an account, using a form. The form content has an input type text to enter his name, an input type password to enter his password and an input type submit to sign up.
When the user presses sign up, the inserted data is processed in the signup.php file, see figers3 below, the username and password are taken from the form and stored in variables and the id is generated randomly, after that an insertion query is added to insert all these data to the database as a new row.

<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo '<script>alert("Please enter valid data!")</script>';
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
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
		
		<form method="post">
			<div style="font-size: 25px;color: white; font-family:Fantasy;">Game Name</div><br>

			<p id="pstyle"><lable>Username:</lable></p>
			<input id="text" type="text" name="user_name"><br>

			<p id="pstyle"><lable>Password:</lable></p>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Sign up"><br><br>

			<p style="font-size: 15px; margin: 10px; color: white; font-family: monospace; ">
			Have an account? 
			<a href="login.php">Sign in</a></p>
		</form>
	</div>
</body>
</html>

But if the user already had an account he has to login. The login form has an input type text to enter the username, and an input type password to enter the user password.

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

When the user presses log in, a query will be added that selects user data from the users' table based on the inserted username, then the inserted password with the stored password will be compared, if they are equal the user can log in otherwise the website will ask the user to try again.
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}



when the user done playing he/she can logout from the game:

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

header("Location: login.php");
die;
