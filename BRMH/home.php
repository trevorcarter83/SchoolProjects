<?php
   session_start();
   require_once('protect.php');
   $protect = new protect();
   $user = $_SESSION['user'];
   
   	try{
	//$dbconnect = new PDO("mysql:host=localhost;dbname=natedb;","root","usbw");
	$dbconnect = new PDO("sqlsrv:server=SQLBC.go.usu.edu;Database=BearRiverSmartCareProd","ms6894","A01696894");
	
	//Returns errors and arrays
	$dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbconnect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		//echo "Connection Successful";
	}
	
	catch(PDOException $e)
	{
		//echo "Connection Failed: " . $e->getMessage();
	}
   
    $data = array($user);
	$sql = "SELECT Supervisor, EHRUser FROM Staff WHERE UserCode = ?";
	$stmt = $dbconnect->prepare($sql);
	$stmt->execute($data);
	$row = $stmt->fetch(PDO::FETCH_NUM);
	$supervisor = $row['0'];
	$hr = $row['1'];
	echo $row['0'];
	echo $row['1'];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>BRMH Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="/BRMH/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/BRMH/home.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	  <a class="navbar-brand" href="/BRMH/clear.php">Sign Out</a>
      </button>
    </nav>

    <main role="main" class="container">

            <div class="starter-template">
				<ul class="list-group">
				<?php
					if ($supervisor == "0" AND $hr == "0") {
						echo '<li class="list-group-item"><a href="forms\PersonalLeavePayout.php">Employee PTO Payout Request</a></li>';
					}
					
					elseif ($supervisor == "1" AND $hr == "0"){
						echo'<li class="list-group-item"><a href="forms\PersonalLeavePayout.php">Employee PTO Payout Request</a></li>';
						echo'<li class="list-group-item"><a href="forms\NewHirePAC.php">New Hire Personnel Action Order</a></li>';
						echo'<li class="list-group-item"><a href="forms\ChangeOfPosition.php">Change of Position/FTE/Salary - Personnel Action Order</a></li>';
						echo'<li class="list-group-item"><a href="forms\Termination.php">Termination Personnel Action Order</a></li>';
						echo'<li class="list-group-item"><a href="supervisor_form_review.php">Supervisor Approval Dashboard</a></li>';
					}

					elseif ($hr == "1" AND $supervisor == "1") {
						echo'<li class="list-group-item"><a href="forms\PersonalLeavePayout.php">Employee PTO Payout Request</a></li>';
						echo'<li class="list-group-item"><a href="forms\NewHirePAC.php">New Hire Personnel Action Order</a></li>';
						echo'<li class="list-group-item"><a href="forms\ChangeOfPosition.php">Change of Position/FTE/Salary - Personnel Action Order</a></li>';
						echo'<li class="list-group-item"><a href="forms\Termination.php">Termination Personnel Action Order</a></li>';
						echo'<li class="list-group-item"><a href="form_review.php">HR Approval Dashboard</a></li>';
						echo'<li class="list-group-item"><a href="HRDashboard.php">Reports</a></li>';
					}
				?>
				</ul>
			</div>


	</main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>