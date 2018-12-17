<?php
	try{
	$dbconnect = new PDO("sqlsrv:server=SQLBC.go.usu.edu;Database=BearRiverSmartCareProd","ms6894","A01696894");
	
	//Returns errors and arrays
	$dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbconnect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	//echo "Successful";
	}
	
	catch(PDOException $e)
	{
		//echo "Connection Failed: " . $e->getMessage();
	}
	
	$statement = $dbconnect->prepare("
									--Current Forms
									SELECT
										SUM(x.Count)	[Count]
									FROM
										(
										SELECT
											COUNT(cop.ChangeOfPositionFormID) [Count]
										FROM
											ChangeOfPositionForm cop
										WHERE
											MONTH(cop.FormTimestamp) = MONTH(GETDATE())
											AND YEAR(cop.FormTimestamp) = YEAR(GETDATE())
											AND cop.HRApproved = 1

										UNION ALL

										SELECT
											COUNT(nh.NewHireFormID) [Count]
										FROM
											NewHireForm nh
										WHERE
											MONTH(nh.StartDate) = MONTH(GETDATE())
											AND YEAR(nh.StartDate) = YEAR(GETDATE())
											AND nh.HRApproved = 1

										UNION ALL

										SELECT
											COUNT(pt.PaidTimeOffFormID) [Count]
										FROM
											PaidTimeOffForm pt
										WHERE
											MONTH(pt.StartDate) = MONTH(GETDATE())
											AND YEAR(pt.StartDate) = YEAR(GETDATE())
											AND pt.HRApproved = 1

										UNION ALL

										SELECT
											COUNT(tf.TerminationFormID) [Count]
										FROM
											TerminationForm tf
										WHERE
											MONTH(tf.LastDay) = MONTH(GETDATE())
											AND YEAR(tf.LastDay) = YEAR(GETDATE())
											AND tf.HRApproved = 1
										)x");
	$statement->execute();
	$currNum = $statement->fetchAll();
	
	$statement2 = $dbconnect->prepare("
									--Previous Forms
										SELECT
											SUM(x.Count)	[Count]
										FROM
											(
										SELECT
											COUNT(cop.ChangeOfPositionFormID) [Count]
										FROM
											ChangeOfPositionForm cop
										WHERE
											cop.FormTimestamp < DATEADD(month, DATEDIFF(month, 0, GETDATE()), 0)
											AND cop.HRApproved = 1

										UNION ALL

										SELECT
											COUNT(nh.NewHireFormID) [Count]
										FROM
											NewHireForm nh
										WHERE
											nh.StartDate < DATEADD(month, DATEDIFF(month, 0, GETDATE()), 0)
											AND nh.HRApproved = 1

										UNION ALL

										SELECT
											COUNT(pt.PaidTimeOffFormID) [Count]
										FROM
											PaidTimeOffForm pt
										WHERE
											pt.StartDate < DATEADD(month, DATEDIFF(month, 0, GETDATE()), 0)
											AND pt.HRApproved = 1

										UNION ALL

										SELECT
											COUNT(tf.TerminationFormID) [Count]
										FROM
											TerminationForm tf
										WHERE
											tf.LastDay < DATEADD(month, DATEDIFF(month, 0, GETDATE()), 0)
											AND tf.HRApproved = 1
											)x");
	$statement2->execute();
	$prevNum = $statement2->fetchAll();
	
	$statement3 = $dbconnect->prepare("
									--Future Forms
									SELECT
										SUM(x.Count)	[Count]
									FROM
										(
									SELECT
										COUNT(cop.ChangeOfPositionFormID) [Count]
									FROM
										ChangeOfPositionForm cop
									WHERE
										cop.FormTimestamp > DATEADD(s,-1,DATEADD(mm, DATEDIFF(m,0,GETDATE())+1,0))
										AND cop.HRApproved = 1

									UNION ALL

									SELECT
										COUNT(nh.NewHireFormID) [Count]
									FROM
										NewHireForm nh
									WHERE
										nh.StartDate > DATEADD(s,-1,DATEADD(mm, DATEDIFF(m,0,GETDATE())+1,0))
										AND nh.HRApproved = 1

									UNION ALL

									SELECT
										COUNT(pt.PaidTimeOffFormID) [Count]
									FROM
										PaidTimeOffForm pt
									WHERE
										pt.StartDate > DATEADD(s,-1,DATEADD(mm, DATEDIFF(m,0,GETDATE())+1,0))
										AND pt.HRApproved = 1

									UNION ALL

									SELECT
										COUNT(tf.TerminationFormID) [Count]
									FROM
										TerminationForm tf
									WHERE
										tf.LastDay > DATEADD(s,-1,DATEADD(mm, DATEDIFF(m,0,GETDATE())+1,0))
										AND tf.HRApproved = 1
										)x");
	$statement3->execute();
	$futrNum = $statement3->fetchAll();
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="HRDashboard.css" rel="stylesheet">

    <title>HR Dashboard</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="home.php">Home</a>
  </button>
</nav>




  <div class="hrheader" align="center" style="font-size:30px">Human Resources Reports</div>

  <div class="row">
    <div class="col-sm-4 numbers" align="center">

	<?php
		foreach($currNum as $row){
			echo $row['Count'];
		}
	?>
	
	</div>
    <div class="col-sm-4 numbers" align="center">	
	<?php
		foreach($futrNum as $row){
			echo $row['Count'];
		}
	?>
	</div>
    <div class="col-sm-4 numbers" align="center"><?php
		foreach($prevNum as $row){
			echo $row['Count'];
		}
	?>
	</div>
  </div>

  <div class="row">
  <div class="col-sm-4 mainColor" align="center"><div class="classWithPad">Current Month</div></div>
  <div class="col-sm-4 mainColor" align="center"><div class="classWithPad">Future Requests</div></div>
  <div class="col-sm-4 mainColor" align="center"><div class="classWithPad">Past Requests</div></div>
  
  </div>
    <div class="row">
    <div class="col-sm-4" align="center" style="font-size:25px"><a href="CurrentReport.php">View Current Month</a></div>
    <div class="col-sm-4" align="center"style="font-size:25px"><a href="FutureReport.php">View Future Requests</a></div>
    <div class="col-sm-4" align="center"style="font-size:25px"><a href="PreviousReport.php">View Past Requests</a></div>
  </div>
  <div>
    <div class="hrheader" align="center" style="font-size:20px"><a href="AllReport.php">View All Requests</a></div>
  </div>


	







    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>