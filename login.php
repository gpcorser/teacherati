<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['per_id'] ))
{
    $message = 'User is already logged in';
}
/*** check that both the username, password have been submitted ***/
/*if(!isset( $_POST['username'], $_POST['password']))
{
    die(header("location:index.php?loginFailed=true&reason=blank"));
}*/

else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $uname = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        
    /*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'gpcorser';

    /*** mysql password ***/
    $mysql_password = 'remember';

    /*** database name ***/
    $mysql_dbname = 'gpcorser';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT per_id, per_email, per_password FROM persons2 
                    WHERE  per_email= :per_email AND per_password = :per_password");

        /*** bind the parameters ***/
        $stmt->bindParam(':per_email', $uname, PDO::PARAM_STR);
        $stmt->bindParam(':per_password', $pass, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $user_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($user_id == false)
        {
                die(header("location:index.php?loginFailed=true&reason=password"));
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['user_id'] = $user_id;

                /*** tell the user we are logged in ***/
                die(header("location:les_list.php"));
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later"';
    }
}
?>

<html>
<head>
<title>Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>