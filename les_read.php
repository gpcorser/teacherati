<?php
   session_start();
   if (!$_SESSION['user_id'])
       header('Location: index.php');
   
   require 'database.php';
   $id = null;
   if (!empty($_GET['les_id'])) {
       $id = $_REQUEST['les_id'];
   }
   
   if (null == $id) {
       header("Location: les_list.php");
   } else {
       $pdo = Database::connect();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM lessons2 where les_id = ?";
       $q   = $pdo->prepare($sql);
       $q->execute(array(
           $id
       ));
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Database::disconnect();
   }
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
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style>
         div.stars {
         width: 180px;
         display: inline-block;
         }
         input.star { display: none; }
         label.star {
         float: right;
         padding: 5px;
         font-size: 28px;
         color: #444;
         transition: all .2s;
         }
         input.star:checked ~ label.star:before {
         content: '\f005';
         color: #FD4;
         transition: all .25s;
         }
         input.star-5:checked ~ label.star:before {
         color: #FE7;
         text-shadow: 0 0 20px #952;
         }
         input.star-1:checked ~ label.star:before { color: #F62; }
         label.star:hover { transform: rotate(-15deg) scale(1.3); }
         label.star:before {
         content: '\f006';
         font-family: FontAwesome;
         }
      </style>
   </head>
   <body id="page-top" style="background-image: url(img/background.png);">
      <section class="bg-primary" id="about" style="background-image: url(img/laptop-on-work-desk.jpg); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat; background-attachment: fixed;">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-lg-offset-2 text-center">
                  <h2 class="section-heading">Read Lesson</h2>
                  <hr class="light">
                  <h3><?php
                     echo $data['les_name'];
                     ?><br /><br />
                     Created By: <?php
                        # echo $data['les_per_id'];
                        $les_per_id = $data['les_per_id'];
                        $pdo        = Database::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "SELECT * FROM persons2 where per_id = ?";
                        $q   = $pdo->prepare($sql);
                        $q->execute(array(
                            $les_per_id
                        ));
                        $data2    = $q->fetch(PDO::FETCH_ASSOC);
                        $per_name = $data2['per_name'];
                        Database::disconnect();
                        echo $per_name;
                        ?>
                  </h3>
               </div>
            </div>
         </div>
      </section>
      <div class="container">
	  <div class="col-md-4">
         <h3>Video URL:</h3>
         <p> http://youtube.com/<?php
            echo $data['les_video_url'];
            ?></p>
         <h3>Lab Notes URL:</h3>
         <p> <?php
            echo $data['les_labnotes_url'];
            ?></p>
         <h3>Quiz URL:</h3>
         <p> <?php
            echo $data['les_quiz_url'];
            ?></p>
         <h3>Answers URL:</h3>
         <p> <?php
            echo $data['les_answers_url'];
            ?></p>
         <?php
            /*
            $url = $data['les_video_url'] ;
            $parts = parse_url($url);
            $q = $parts['query'];
            if (strpos( $q, '=')) 
            $q=substr($q, strpos( $q, '=') + 1, 1024);
            */
            $q = $data['les_video_url'];
            
            echo "Displaying https://www.youtube.com/embed/" . $q;
            echo '<br />';
            echo '<iframe width="420" height="315" src="https://www.youtube.com/embed/' . $q . '" frameborder="0" allowfullscreen></iframe>';
            
            ?>
         <br />
		 
			 <!--
       <h3>Rate This Lesson:</h3>
			 <div class="stars">
				<form action="">
				   <input class="star star-5" id="star-5" type="radio" name="star"/>
				   <label class="star star-5" for="star-5"></label>
				   <input class="star star-4" id="star-4" type="radio" name="star"/>
				   <label class="star star-4" for="star-4"></label>
				   <input class="star star-3" id="star-3" type="radio" name="star"/>
				   <label class="star star-3" for="star-3"></label>
				   <input class="star star-2" id="star-2" type="radio" name="star"/>
				   <label class="star star-2" for="star-2"></label>
				   <input class="star star-1" id="star-1" type="radio" name="star"/>
				   <label class="star star-1" for="star-1"></label>
				</form>
			 </div>
       -->
			 <h3>Comments:</h3>
			 
			 <h3>Leave a Comment:</h3>
				 <form action="" id="usrform">
					<textarea class="form-control" name="comment" form="usrform" placeholder="Leave a comment!"></textarea>
					<br /><input class="btn btn-success" type="submit">
				 </form>
			<br /><br /><a class="btn btn-primary" href="les_list.php">Back To Lesson List</a><br /><br />
		 </div>
		 
		 
      </div>
      </div> <!-- /container -->
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
   </body>
</html>