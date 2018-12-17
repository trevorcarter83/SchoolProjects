<?php
	try{
	$dbconnect = new PDO("sqlsrv:server=SQLBC.go.usu.edu;Database=BearRiverSmartCareProd","ms6894","A01696894");
	
	//Returns errors and arrays
	$dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbconnect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	echo "Connection Successful";
	}
	
	catch(PDOException $e)
	{
		echo "Connection Failed: " . $e->getMessage();
	}
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
    <link href="form_review.css" rel="stylesheet">

    <title>Supervisor Approval Page</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="home.php">Home</a>
  </button>
</nav>

        <main role="main" class="container starter-template">  

      <h1>Forms Pending</h1>

        <ul class="list-group">

<?php
	try {
	$COPquery = "SELECT ChangeOfPositionFormID AS FormID, REPLACE(CAST(MONTH(FormTimestamp) AS char) + '/' + CAST(DAY(FormTimestamp) as char),' ','') AS FormDate , S.FirstName + ' ' + S.LastName AS EMPNAME, 'Change Of Position' AS FORMTYPE FROM ChangeOfPositionForm AS F JOIN Staff AS S ON S.StaffId = F.StaffID WHERE HRApproved IS NULL";

	$NHquery = "SELECT NewHireFormID AS FormID, REPLACE(CAST(MONTH(FormSubmissionDate) AS char) + '/' + CAST(DAY(FormSubmissionDate) as char),' ','') AS FormDate, EmployeeName AS EMPNAME, 'New Hire' AS FORMTYPE FROM NewHireForm WHERE HRApproved IS NULL";

	$PTOquery = "SELECT PaidTimeOffFormID AS FORMID, REPLACE(CAST(MONTH(FormTimestamp) AS char) + '/' + CAST(DAY(FormTimestamp) as char),' ','')  AS FormDate, S.FirstName + ' ' + S.LastName AS EMPNAME, 'Paid Time Off' AS FORMTYPE FROM PaidTimeOffForm AS F JOIN Staff AS S ON S.StaffId = F.EmployeeID WHERE SupervisorApproved = 1 AND HRApproved IS NULL";

	$Tquery = "SELECT TerminationFormID AS FormID, REPLACE(CAST(MONTH(LastDay) AS char) + '/' + CAST(DAY(LastDay) as char),' ','')  AS FormDate, S.FirstName + ' ' + S.LastName AS EMPNAME, 'Termination' AS FORMTYPE FROM TerminationForm AS F JOIN Staff AS S ON S.StaffId = F.StaffID WHERE HRApproved IS NULL";


	//COP Forms from DB
	$COP_result = $dbconnect->query($COPquery);
	$COP_row = $COP_result->fetch(PDO::FETCH_NUM);
	$data = $dbconnect->query($COPquery);
	$COP_Arr = $data->fetchALL(PDO::FETCH_NUM);
	for ($row = 0; $row < count($COP_Arr); $row++){
		echo "<a href='forms/ReviewChangeOfPosition.php?ID=".(string)$COP_Arr[$row][0]."' class='list-group-item list-group-item-action list-group-item-primary'>";
		for ($col = 0; $col < count($COP_Arr[$row]); $col++){
			if($col == 0){
			
			}
			else {
				echo " - ".(string)$COP_Arr[$row][$col]."";
			}
		}
		echo "</a>";
	}

	//NH Forms from DB
	$NH_result = $dbconnect->query($COPquery);
	$NH_row = $NH_result->fetch(PDO::FETCH_ASSOC);
	$data = $dbconnect->query($NHquery);
	$NH_Arr = $data->fetchALL(PDO::FETCH_NUM);
	for ($row = 0; $row < count($NH_Arr); $row++){
		echo "<a href='forms/ReviewNewHirePAC.php?ID=".(string)$NH_Arr[$row][0]."' class='list-group-item list-group-item-action list-group-item-primary'>";
		for ($col = 0; $col < count($NH_Arr[$row]); $col++){
			if($col == 0){
			
			}
			else {
				echo " - ".(string)$NH_Arr[$row][$col]."";
			}
		}
		echo "</a>";
	}

	//PTO Forms from DB
	$PTO_result = $dbconnect->query($COPquery);
	$PTO_row = $PTO_result->fetch(PDO::FETCH_ASSOC);
	$data = $dbconnect->query($PTOquery);
	$PTO_Arr = $data->fetchALL(PDO::FETCH_NUM);
	for ($row = 0; $row < count($PTO_Arr); $row++){
		print "<a href='forms/ReviewPersonalLeavePayout.php?ID=".(string)$PTO_Arr[$row][0]."' class='list-group-item list-group-item-action list-group-item-primary'>";
		for ($col = 0; $col < count($PTO_Arr[$row]); $col++){
			if($col == 0){
			
			}
			else {
				echo " - ".(string)$PTO_Arr[$row][$col]."";
			}
		}
		echo "</a>";
	}

	//T Forms from DB
	$T_result = $dbconnect->query($COPquery);
	$T_row = $T_result->fetch(PDO::FETCH_ASSOC);
	$data = $dbconnect->query($Tquery);
	$T_Arr = $data->fetchALL(PDO::FETCH_NUM);
	for ($row = 0; $row < count($T_Arr); $row++){
		print "<a href='forms/ReviewTermination.php?ID=".(string)$T_Arr[$row][0]."' class='list-group-item list-group-item-action list-group-item-primary'>";
		for ($col = 0; $col < count($T_Arr[$row]); $col++){
			if($col == 0){
			
			}
			else {
				echo " - ".(string)$T_Arr[$row][$col]."";
			}
		}
		echo "</a>";
	}
	} catch(PDOException $e) {
	 echo 'ERROR: ' . $e->getMessage();
	} // end try
?>

        </ul>
 <!--       <h1 class='starter-template'>Past Form Lookup</h1>
         <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>
