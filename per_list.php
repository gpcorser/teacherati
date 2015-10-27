<?php 
    session_start();
    if (!$_SESSION['user_id']) header('Location: index.php');
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
        <section class="bg-primary" id="about" style="background-image: url(img/Banner-Teach.jpg); -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-position: 50% 50%; background-repeat: no-repeat; background-attachment: fixed;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Account List</h2>
                        <hr class="light">
                        <p>Here is a list of your peers that help make course work just like you! This is a great way to get in contact with someone and ask them about their course work if you wish!</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="container" style="padding-top: 15px; ">
            <div class="row">
                <div class="col-sm-10">
                    <table class="table table-striped table-bordered display ruleToRemove" id="table_id" >
                        <col style="width: 15%;">
                        <col style="width: 20%;">
                        <col style="width: 10%;">
                        <col style="width: 5%;">
                        <col style="width: 15%;">
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
                                include 'database.php';
                                $pdo = Database::connect();
                                $sql = 'SELECT * FROM persons2 ORDER BY per_name ASC';
                                foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['per_name'] . '</td>';
                                echo '<td>'. $row['per_email'] . '</td>';
                                echo '<td>'. $row['per_phone'] . '</td>';
                                echo '<td >'. $row['per_institution'] . '</td>';
                                echo '<td><a class="btn btn-warning" href="per_read.php?per_id='.$row['per_id'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>';
                                if($_SESSION['per_id']==$row['per_id'] or $_SESSION['per_id']==1) { # per_id 1 is administrator
                                	echo ' ';
                                	echo '<a class="btn btn-success" href="per_update.php?per_id='.$row['per_id'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                                	echo ' ';
                                	echo '<a class="btn btn-primary" href="per_delete.php?per_id='.$row['per_id'].'"><span class="glyphicon glyphicon-remove" aria-hidden="true" on-click="RemoveRule();"></span></a>';
                                }
                                echo '</td>';
                                echo '</tr>';
                                }
                                Database::disconnect();
                                ?>
                        </tbody>
                    </table>
                    <br /><br />
                </div>
                <div class="col-sm-2">
                    <h2>Options</h2>
                    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success">New Account</a>
                    <a href="les_list.php" class="btn btn-warning" style="margin-top: 10px;">Lesson List</a>
                    <a href="rev_list.php" class="btn btn-warning" style="margin-top: 10px;">Review List</a>
                    <a href="logout.php" class="btn btn-primary" style="margin-top: 10px;">Logout</a>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="margin-top: 30%; max-width: 50%; left: 25%;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Register</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="per_create.php" method="post">
                            <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                                <div class="controls">
                                    <input name="name" type="text" class="form-control"  size="30" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                                    <?php if (!empty($nameError)): ?>
                                    <span class="help-inline"><?php echo $nameError;?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                                <div class="controls">
                                    <input name="email" type="text" class="form-control" style="margin-top: 5px;" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                                    <?php if (!empty($emailError)): ?>
                                    <span class="help-inline"><?php echo $emailError;?></span>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
                                <div class="controls">
                                    <input name="phone" type="text" class="form-control" style="margin-top: 5px;" placeholder="Phone: (555)555-5555" value="<?php echo !empty($phone)?$phone:'';?>">
                                    <?php if (!empty($phoneError)): ?>
                                    <span class="help-inline"><?php echo $phoneError;?></span>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="control-group <?php echo !empty($institutionError)?'error':'';?>">
                                <div class="controls">
                                    <input name="institution" type="text" class="form-control" style="margin-top: 5px;" placeholder="Institution: SVSU" value="<?php echo !empty($institution)?$institution:'';?>">
                                    <?php if (!empty($institutionError)): ?>
                                    <span class="help-inline"><?php echo $institutionError;?></span>
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="form-actions">
                                <br />
                                <button type="submit" style="width: 100%;" on-click="RemoveRule ();" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
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
            $(document).ready( function () {
            	$('#table_id').DataTable();
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
</html>