<?php

session_start();
<<<<<<< HEAD
if (!$_SESSION['user_id']) header('Location: index.php');
=======
if (!$_SESSION['email']) header('Location: login.php');
>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa

    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['per_id'])) {
        $id = $_REQUEST['per_id'];
    }
     
    if ( null==$id ) {
        header("Location: per_list.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $phoneError = null;
        $institutionError = null;
         
        // keep track post values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $institution = $_POST['institution'];
<<<<<<< HEAD
        $password = $_POST['password'];
=======
>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE persons2  set per_name = ?, 
<<<<<<< HEAD
			    per_email = ?,per_password = ?, per_phone = ?, per_institution = ?
				WHERE per_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$password,$phone,$institution,$id));
=======
			    per_email = ?, per_phone = ?, per_institution = ?
				WHERE per_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$phone,$institution,$id));
>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa
            Database::disconnect();
            header("Location: per_list.php");
        }
    } else { // pre-fill fields for update
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM persons2 where per_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['per_name'];
        $email = $data['per_email'];
        $phone = $data['per_phone'];
<<<<<<< HEAD
        $institution = $data['per_institution'];
        $password = $data['per_password'];
=======
		$institution = $data['per_institution'];
>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
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
                        <h2 class="section-heading">Update Person</h2>
                        <hr class="light">
                        <p>Update a person</p>
                    </div>
                </div>
            </div>
        </section>
=======
<head> 
    <meta charset="utf-8"> 
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"> 
    <style> .glyphicon{ color: #f6d200; } </style> 
</head> 
 
<body>
>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa
    <div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Update Person</h3>
			</div>
	 
			<form class="form-horizontal" action="per_update.php?per_id=<?php echo $id?>" method="post">
			
			  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
				<label class="control-label">Name</label>
				<div class="controls">
					<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					<?php if (!empty($nameError)): ?>
						<span class="help-inline"><?php echo $nameError;?></span>
					<?php endif; ?>
				</div>
			  </div>
			  
			  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
				<label class="control-label">Email</label>
				<div class="controls">
					<input name="email" type="text" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
					<?php if (!empty($emailError)): ?>
						<span class="help-inline"><?php echo $emailError;?></span>
					<?php endif;?>
				</div>
			  </div>
			  
			  <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
				<label class="control-label">Phone</label>
				<div class="controls">
					<input name="phone" type="text"  placeholder="phone" value="<?php echo !empty($phone)?$phone:'';?>">
					<?php if (!empty($phoneError)): ?>
						<span class="help-inline"><?php echo $phoneError;?></span>
					<?php endif;?>
				</div>
			  </div>
			  
			  <div class="control-group <?php echo !empty($institutionError)?'error':'';?>">
				<label class="control-label">Institution</label>
				<div class="controls">
					<input name="institution" type="text"  placeholder="institution" value="<?php echo !empty($institution)?$institution:'';?>">
					<?php if (!empty($institutionError)): ?>
						<span class="help-inline"><?php echo $institutionError;?></span>
					<?php endif;?>
				</div>
			  </div>
<<<<<<< HEAD
        
        <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
				<label class="control-label">Password</label>
				<div class="controls">
					<input name="password" type="password"  placeholder="Name" value="<?php echo !empty($password)?$password:'';?>">
					<?php if (!empty($nameError)): ?>
						<span class="help-inline"><?php echo $nameError;?></span>
					<?php endif; ?>
				</div>
			  </div>

			  <div class="form-actions">
			  <br />
				  <button type="submit" class="btn btn-success">Update</button>
				  <a class="btn btn-primary" href="per_list.php">Back</a>
=======

			  <div class="form-actions">
				  <button type="submit" class="btn btn-success">Update</button>
				  <a class="btn" href="per_list.php">Back</a>
>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa
				</div>
			</form>
		</div>
                 
    </div> <!-- /container -->
	
<<<<<<< HEAD
=======
		<p align="center">
	<a href="phpReader.php?file='<?php echo __FILE__; ?>'" >source code</a>
	</p>
>>>>>>> b68ea2a2fe19b4f1deb5de9b5356392b998d6faa
  </body>
</html>
