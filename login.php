<?php
	
	// Start the session
	session_start();
	
	// Set an error message
	$error = "";
	
	// If the user pressed the Submit button
	if(isset($_POST['loginSubmit']))
	{
		// This will not be used if successful login
		$error = '<div class="alert alert-danger" role="alert"><b>Login Error:</b> Please enter a valid username and password.</div>';
		
		// Required Database Information
		$dbHost = 'localhost';
		$dbUsername = 'gpcorser';
		$dbUserPassword = 'remember';
		$dbName = 'gpcorser' ;
		
		// Entered user information
		$uname = $_POST['username'];
		$pass = $_POST['password'];
		
		// Session Information
		$dataEmail = "";
		$dataPerId = "";
		
		// Create a mysqli object
		$mysqli = new mysqli($dbHost, $dbUsername, $dbUserPassword, $dbName);
		
		// Init statement
		$stmt = $mysqli->stmt_init();
		
		// Create query
		$sql = "SELECT per_email, per_id FROM persons2 
		    WHERE per_email = ? AND per_password = ?";
		
		if($stmt = $mysqli->prepare($sql))
		{
            // Bind params
            $stmt->bind_param('ss', $uname, $pass);

			// Execute statement
            if($stmt->execute())
            {
				// Bind query result to variables
				$stmt->bind_result($dataEmail,$dataPerId);
				
				// Fetch the statement
				if ($stmt->fetch())
				{
					// Set SESSION variable
					$_SESSION['email'] = $dataEmail;
					$_SESSION['per_id'] = $dataPerId;
					
					// Close statement and mysqli object
					$stmt->close();
					$mysqli->close();
					
					// always redirect to per_list.php if login successful
					header('Location: per_list.php');
					exit;
					
					/*
					// If the user came from the login page, direct them to the landing page
					if ($_SERVER['HTTP_REFERER'] == "http://cis355.com/student14/login.php" 
					    || $_SERVER['HTTP_REFERER'] == "http://www.cis355.com/student14/login.php" )
					{
						// Relocate to landing page
						header('Location: landing.php');
						exit;
					}
					
					else
					{
						// Relocate to landing page
						header('Location: '. $_SERVER['HTTP_REFERER']);
						exit;
					}
					*/
				}
			}
                      
            // Close statement
			$stmt->close();
		}
		$mysqli->close();
	}
?>