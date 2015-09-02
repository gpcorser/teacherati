<?php 
session_start();
//if (!$_SESSION['email']) header('Location: login.php');
?>
<!DOCTYPE html>
<!-- from : http://www.startutorial.com/articles/view/php-crud-tutorial-part-1 -->
<html lang="en">
<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacherati</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 
 
<body>
    <div class="container">
		<div class="row">
			<h3 style="margin-left:50px; ">Persons List</h3>
		</div>
		<div class="row">
			<table class="table table-striped table-bordered" style="margin-left:50px; max-width: 800px;">
				  <col style="width: 15%;">
				  <col style="width: 20%;">
				  <col style="width: 15%;">
				  <col style="width: 15%;">
				  <col style="width: 35%;">
			  <thead>
				<tr>
				  <th>Name</th>
				  <th>Email</th>
				  <th>Phone</th>
				  <th>Institution</th>
				  <th>Action</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php

				echo '<p>
					  <a href="per_create.php" class="btn btn-success" 
					  style="margin-left:50px;">Create New Person</a>
					  <a href="per_list.php" class="btn btn-info" 
					  style="margin-left:50px;">Persons List</a>
					  <a href="les_list.php" class="btn btn-info" 
					  style="margin-left:50px;">Lessons List</a>
					  <a href="rev_list.php" class="btn btn-info" 
					  style="margin-left:50px;">Reviews List</a>
					  <a href="logout.php" class="btn btn-danger" 
					  style="margin-left:50px;">Logout</a>
					  </p>';


			   include 'database.php';
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM persons2 ORDER BY per_name ASC';
			   foreach ($pdo->query($sql) as $row) {
						echo '<tr>';
						echo '<td>'. $row['per_name'] . '</td>';
						echo '<td>'. $row['per_email'] . '</td>';
						echo '<td>'. $row['per_phone'] . '</td>';
						echo '<td>'. $row['per_institution'] . '</td>';
			
						echo '<td><a class="btn" href="per_read.php?per_id='.$row['per_id'].'">Read</a>';
						if($_SESSION['per_id']==$row['per_id'] or $_SESSION['per_id']==1) { # per_id 1 is administrator
							echo ' ';
							echo '<a class="btn btn-success" href="per_update.php?per_id='.$row['per_id'].'">Update</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="per_delete.php?per_id='.$row['per_id'].'">Delete</a>';
						}
						echo '</td>';
						echo '</tr>';
			   }
			   Database::disconnect();
			  ?>
			  </tbody>
		</table>
		</div>
    </div> <!-- /container -->
	<p align="center">
	<a href="phpReader.php?file='<?php echo __FILE__; ?>'" >source code</a>
	</p>
  </body>
</html>