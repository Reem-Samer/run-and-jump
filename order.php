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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<p >Your Score is: <?php echo( $user_data['score'] ); ?>
<p>
<a href="logout.php" id="logout">Logout</a>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>Order by Highest Score</th>
         <th>User Nmae</th>
         <th>Score</th>
         
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['user_name']??''; ?></td>
      <td><?php echo $data['score']??''; ?></td>
       
     </tr>
     <?php
      $sn++;}}else{ ?>
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
</body>
</html>