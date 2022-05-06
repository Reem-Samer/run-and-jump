<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);


	
	
	
	$db= $con;
	$tableName="users";
	$columns= ['user_name','score'];
	$fetchData = fetch_data($db, $tableName, $columns);
	
	function fetch_data($db, $tableName, $columns){
	 if(empty($db)){
	  $msg= "Database connection error";
	 }elseif (empty($columns) || !is_array($columns)) {
	  $msg="columns Name must be defined in an indexed array";
	 }elseif(empty($tableName)){
	   $msg= "Table Name is empty";
	}else{
	
	$columnName = implode(", ", $columns);
	$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY score DESC";
	$result = $db->query($query);
	
	if($result== true){ 
	 if ($result->num_rows > 0) {
		$row= mysqli_fetch_all($result, MYSQLI_ASSOC);
		$msg= $row;

	 } else {
		$msg= "No Data Found"; 
	 }
	}else{
	  $msg= mysqli_error($db);
	}
	}
	return $msg;
	}
	
	?>

<!DOCTYPE html>
<html>
<head>

</head>

<body>
<style type="text/css">

input[type=submit]{
	font-family: monospace;
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
	display: inline;
	
}

#box{
	margin: auto;
	padding: 40px;
	text-align: center;
	margin-top: 20px;
	font-family: monospace;
	width: 500px;
	
}

#pstyle{
	font-size: 15px;
	margin: 10px;
	color: black; 
}

th, td {
	border-bottom: 1px solid #7D808F;
	padding: 15px;
}

tr:hover {
	background-color: #7282DC ;
	color: white;
}

table.center {
  margin-left: auto;
  margin-right: auto;
  width: 80%;
}

</style>


<div id="box">
<p style="color:#6D83FB; font-size: 25px;">Your last score was: <?php echo( $user_data['score'] ); ?>
<p>
<br>

	<div>
		<div>
			<div>
				<?php echo $deleteMsg??''; ?>
				<div>
					<table class="center">
						
						<thead style="	background-color: #7282DC ; color: white;"><tr>
						<th>Rank</th>
						<th>Player</th>
						<th>Score</th>
						</thead>
						
						<tbody>
							
							<?php if(is_array($fetchData)){      
									$sn=1;

									foreach($fetchData as $data){
										?>
							
										<tr>
										<td>&#35 <?php echo $sn; ?></td>
										<td><?php echo $data['user_name']??''; ?></td>
										<td><?php echo $data['score']??''; ?></td>
										</tr>
							
										<?php
										$sn++;
									}

							}
							else{ ?>
								<tr>
								<td colspan="8">
								<?php echo $fetchData; ?>
								</td>
							
								<tr>
								<?php
							}?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<br>
	<br>

	<div style="display: flex; align-items: center; justify-content: center;">
		<form action="logout.php">
			<input id="button" type="submit" value="Log out" />
		</form>

		<form action="index.php">
			<input id="button" type="submit" value="Retry" />
		</form>
	</div>

</div>
		
</body>
</html>