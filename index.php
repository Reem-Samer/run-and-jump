<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/p5.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/p5@1.4.1/lib/addons/p5.sound.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bmoren/p5.collide2D/p5.collide2d.min.js"></script>
    <script src="https://unpkg.com/ml5@0.3.1/dist/ml5.min.js"></script>
    <meta charset="utf-8" />
    <style>
    html, body {
        margin: 0;
        padding: 0;
      }
      canvas {
        display: block;
      }
      
      </style>
</head>
<body>
<script src="unicorn.js"></script>
    <script src="train.js"></script>
    <script src="sketch.js" ></script>
	<a href="logout.php">Logout</a>
	

	
	Hello, <?php echo $user_data['user_name']; ?>
</body>
</html>
