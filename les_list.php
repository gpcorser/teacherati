<?php 
<<<<<<< HEAD
    session_start();
    if (!$_SESSION['user_id']) header('Location: index.php');
    ?>
<!DOCTYPE html>
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
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="page-top" style="background-image: url(img/background.png);">
        <section class="bg-primary" id="about" style="background-image: url(img/laptop-on-work-desk.jpg); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat; background-attachment: fixed;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Lesson List</h2>
                        <hr class="light">
                        <p>Here is a list of lessons written by your peers! Take a look around see what lesson interests you!</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="container" style="padding-top: 15px; ">
            <div class="row">
                <div class="col-sm-10">
                    <table class="table table-striped table-bordered display ruleToRemove" id="table_id" >
                        <col style="width: 5%;">
                        <col style="width: 1%;">
                        <col style="width: 2%;">
                        <thead>
                            <tr>
                                <th>Lesson</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
			  <?php

				
=======
session_start();
if (!$_SESSION['email']) header('Location: login.php');
?>
<!DOCTYPE html>
<!-- from : http://www.startutorial.com/articles/view/php-crud-tutorial-part-1 -->
<html lang="en">
<head> 
    <meta charset="utf-8"> 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"> 
    <style> .glyphicon{ color: #f6d200; } </style> 
</head> 
 
<body>
    <div class="container">
		<div class="row">
			<h3 style="margin-left:50px; ">Lessons List</h3>
		</div>

		<div class="row">
			<table class="table table-striped table-bordered" style="margin-left:50px; max-width: 800px;">
				  <col style="width: 40%;">
				  <col style="width: 25%;">
				  <col style="width: 35%;">
			  <thead>
				<tr>
				  <th>Lesson Name</th>
				  <th>Status</th>
				  <th>Action</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php

				echo '<p>
					  <a href="les_create.php" class="btn btn-success" 
					  style="margin-left:50px;">Create New Lesson</a>
					  <a href="per_list.php" class="btn btn-info" 
					  style="margin-left:50px;">Persons List</a>
					  <a href="les_list.php" class="btn btn-info" 
					  style="margin-left:50px;">Lessons List</a>
					  <a href="rev_list.php" class="btn btn-info" 
					  style="margin-left:50px;">Reviews List</a>
					  <a href="logout.php" class="btn btn-danger" 
					  style="margin-left:50px;">Logout</a>
					  </p>';

>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa
			   include 'database.php';
			   $pdo = Database::connect();
			   $sql = 'SELECT * FROM lessons2 ORDER BY les_name ASC';
			   foreach ($pdo->query($sql) as $row) {
						echo '<tr>';
						echo '<td>'. $row['les_name'] . '</td>';
						echo '<td>'. $row['les_status'] . '</td>';
			
<<<<<<< HEAD
						echo '<td><a class="btn btn-primary" href="les_read.php?les_id='.$row['les_id'].'"><span class="glyphicon glyphicon-book" aria-hidden="true" on-click="RemoveRule();"></span></a>';

						if($_SESSION['user_id']==$row['les_per_id'] or $_SESSION['user_id']==1) {
							echo ' ';
							echo '<a class="btn btn-success" href="les_update.php?les_id='.$row['les_id'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" on-click="RemoveRule();"></span></a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="les_delete.php?les_id='.$row['les_id'].'"><span class="glyphicon glyphicon-remove" aria-hidden="true" on-click="RemoveRule();"></span></a>';
=======
						echo '<td><a class="btn" href="les_read.php?les_id='.$row['les_id'].'">Read</a>';

						if($_SESSION['per_id']==$row['les_per_id'] or $_SESSION['per_id']==1) { # per_id 1 is administrator
							echo ' ';
							echo '<a class="btn btn-success" href="les_update.php?les_id='.$row['les_id'].'">Update</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="les_delete.php?les_id='.$row['les_id'].'">Delete</a>';
>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa
						}
						echo '</td>';
						echo '</tr>';
			   }
			   Database::disconnect();
			  ?>
			  </tbody>
<<<<<<< HEAD
                    </table>
                    <br /><br />
                </div>
                <div class="col-sm-2">
                    <h2>Options</h2>
                    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success">New Lesson</a>
                    <a href="per_list.php" class="btn btn-warning" style="margin-top: 10px;">Account List</a>
                    <?php
                      if($_SESSION['user_id']==1) {
                        echo '<a href="rev_list.php" class="btn btn-warning" style="margin-top: 10px;">Review List</a>';
                      }
                    ?>
                    <a href="logout.php" class="btn btn-primary" style="margin-top: 10px;">Logout</a>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="margin-top: 15%; max-width: 80%; left: 10%;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create</h4>
                    </div>
                    <div class="modal-body">
						<center>
							<form class="form-horizontal" action="les_create.php" method="post">
							  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
								<div class="controls">
									<input name="name" class="form-control" type="text"  placeholder="Lesson Name" value="<?php echo !empty($name)?$name:'';?>">
									<?php if (!empty($nameError)): ?>
										<span class="help-inline"><?php echo $nameError;?></span>
									<?php endif; ?>
								</div>
							  </div>
							  
							  <div class="control-group">
								<div class="controls"><br />
									<?php
									$pdo = Database::connect();
									$sql = 'SELECT * FROM persons2 ORDER BY per_name ASC';
									echo "<select class='form-control' name='les_per_id' id='person_id' >";
									foreach ($pdo->query($sql) as $row) {
                    if($_SESSION['user_id']==$row['per_id']){
										echo "<option value='" . $row['per_id'] . " ' selected='" . $row['per_id'] . " '> " . $row['per_name'] . "</option>";}
                    
									}
									echo "</select>";
									Database::disconnect();
									?>
								</div>	<!-- end controls -->
							  </div> <!-- end control group -->
							  
							  <div class="control-group <?php echo !empty($statusError)?'error':'';?>">
								<div class="controls">
								<br />
									<input name="status" type="text" class="form-control" placeholder="Status (EX: Pending)" value="<?php echo !empty($status)?$status:'';?>">
									<?php if (!empty($statusError)): ?>
										<span class="help-inline"><?php echo $statusError;?></span>
									<?php endif;?>
								</div>
							  </div>
							  
							  <div class="control-group <?php echo !empty($videoError)?'error':'';?>">
								<div class="controls">
								<br />
									<input name="video" type="text" class="form-control" placeholder="Video URL" value="<?php echo !empty($video)?$video:'';?>">
									<?php if (!empty($videoError)): ?>
										<span class="help-inline"><?php echo $videoError;?></span>
									<?php endif;?>
								</div>
							  </div>
							  
							  <div class="control-group <?php echo !empty($labnotesError)?'error':'';?>">
								<div class="controls">
								<br />
									<input name="labnotes" type="text" class="form-control" placeholder="Lab Notes URL" value="<?php echo !empty($labnotes)?$labnotes:'';?>">
									<?php if (!empty($labnotesError)): ?>
										<span class="help-inline"><?php echo $labnotesError;?></span>
									<?php endif;?>
								</div>
							  </div>
							  
							  <div class="control-group <?php echo !empty($quizError)?'error':'';?>">
								<div class="controls">
								<br />
									<input name="quiz" type="text" class="form-control" placeholder="Quiz URL" value="<?php echo !empty($quiz)?$quiz:'';?>">
									<?php if (!empty($quizError)): ?>
										<span class="help-inline"><?php echo $quizError;?></span>
									<?php endif;?>
								</div>
							  </div>
							  
							  <div class="control-group <?php echo !empty($answersError)?'error':'';?>">
								<div class="controls">
								<br />
									<input name="answers" type="text" class="form-control" placeholder="Answers URL" value="<?php echo !empty($answers)?$answers:'';?>">
									<?php if (!empty($answersError)): ?>
										<span class="help-inline"><?php echo $answersError;?></span>
									<?php endif;?>
								</div>
							  </div>
							  
							  <div class="form-actions">
								  <br />
								  <button type="submit" style="width: 100%;" on-click="RemoveRule ();" class="btn btn-primary">Create</button>
								</div>
							</form>
						</center>
                    </div>
                </div>
            </div>
        </div>
		
        </div>
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Plugin JavaScript -->
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/jquery.fittext.js"></script>
        <script src="js/wow.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="js/creative.js"></script>
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table_id').DataTable( {
					initComplete: function () {
						this.api().columns().every( function () {
							var column = this;
							var select = $('<select><option value=""></option></select>')
								.appendTo( $(column.footer()).empty() )
								.on( 'change', function () {
									var val = $.fn.dataTable.util.escapeRegex(
										$(this).val()
									);
			 
									column
										.search( val ? '^'+val+'$' : '', true, false )
										.draw();
								} );
			 
							column.data().unique().sort().each( function ( d, j ) {
								select.append( '<option value="'+d+'">'+d+'</option>' )
							} );
						} );
					}
				} );
			} );
        </script>
        <script type="text/javascript">
            function RemoveRule () {
                    // removes the ruleToRemove style rule that affects the table
                var style = document.styleSheets[0];
                style.removeRule (0);
            
                    // refreshes the table 
                var table = document.getElementById ("myTable");
                table.refresh ();
            }
        </script>
    </body>
=======
		</table>

		</div>
    </div> <!-- /container -->
	<p align="center">
	<a href="phpReader.php?file='<?php echo __FILE__; ?>'" >source code</a>
	</p>
  </body>
>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa
</html>