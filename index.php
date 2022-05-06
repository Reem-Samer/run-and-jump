<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!DOCTYPE html>
<html >
  <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="styles.css" />
  </head>
  
  <body>
  <div id="order"></div>
  <div class="game">
    
    <canvas id="myScore" ></canvas>
    <div id="student"></div>
    <div id="fail"></div>
  </div>
  
  <p id="resultt" class="result" ></p>
  
  <div style="text-align: center; margin-top: 5px; font-family: monospace;">
  <p style="color:#6D83FB; font-size: 25px;"> Hello, <?php echo( $user_data['user_name'] ); ?> </p>
  </div>
  

  
  
  <form method="post" action="score.php" id="form" >
    <p > 
    <input   type="text"  id="score" name="score_" ><br><br>
    <input type="submit" value="Submit" id="submit"  >

  </form>
  
  </body>
  <script type="text/javascript" src="scripts2.js"></script>
</html>