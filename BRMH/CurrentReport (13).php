<?php
   session_start();
   require_once('protect.php');
   $protect = new protect();
   $user = $_SESSION['user'];
?>
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
	
	$statement = $dbconnect->prepare("SELECT
	[EmployeeName]
	, [EmployeeNumber]
	, CONVERT(date,x.effectivedate)  [EffectiveDate]
	, [ActionType]
	, [Replacing]
	, [Benefits]
	, [WageSalary]

FROM(
	SELECT
		ISNULL((RTRIM(s.FirstName) + ' ' + RTRIM(s.LastName)),cop.EmployeeName)	[EmployeeName]
		, s.StaffId										[EmployeeNumber]
		, cop.FormTimestamp								[EffectiveDate]
		, 'Change Of Position'							[ActionType]
		, cop.PositionChangeReplacing					[Replacing]
		, CASE 
			WHEN cop.HRBenefits = 1 
			THEN 'Y'
			ELSE 'N'
			END											[Benefits]
		, 'Hourly: '+CONVERT(varchar(max),ISNULL(HRHourlyWage,0))
			+ ', Monthly: '+CONVERT(varchar(max),ISNULL(HRMonthly,0))
			+ ', Yearly: '+CONVERT(varchar(max),ISNULL(HRYearly,0))	[WageSalary]
	FROM
		ChangeOfPositionForm cop
		LEFT JOIN Staff s ON cop.StaffID = s.StaffId
	WHERE
		cop.HRApproved = 1

	UNION ALL

	SELECT
		cop.EmployeeName								[EmployeeName]
		, s.StaffId										[EmployeeNumber]
		, cop.StartDate						[EffectiveDate]
		, 'New Hire'									[ActionType]
		, cop.Replacing									[Replacing]
		, CASE 
			WHEN cop.HRBenefits = 1 
			THEN 'Y'
			ELSE 'N'
			END											[Benefits]
		, 'Hourly: '+CONVERT(varchar(max),ISNULL(HRHourlyWage,0))
			+ ', Monthly: '+CONVERT(varchar(max),ISNULL(HRMonthly,0))
			+ ', Yearly: '+CONVERT(varchar(max),ISNULL(HRYearly,0))	[WageSalary]
	FROM
		NewHireForm cop
		LEFT JOIN Staff s ON cop.StaffID = s.StaffId
	WHERE
		cop.HRApproved = 1

	UNION ALL

	SELECT
		ISNULL((RTRIM(s.FirstName) + ' ' + RTRIM(s.LastName)),cop.EmployeeName)	[EmployeeName]
		, s.StaffId										[EmployeeNumber]
		, cop.StartDate								[EffectiveDate]
		, 'Paid Time Off'								[ActionType]
		, ''											[Replacing]
		, ''											[Benefits]
		, 'Hours: ' + CONVERT(varchar(max),ISNULL(HRHours,0))
			+', Amount Per Hour: '+CONVERT(varchar(max),ISNULL(HRAmountPerHour,0))	[WageSalary]
	FROM
		PaidTimeOffForm cop
		LEFT JOIN Staff s ON cop.EmployeeID = s.StaffId
	WHERE
		cop.HRApproved = 1

	UNION ALL

	SELECT
		ISNULL((RTRIM(s.FirstName) + ' ' + RTRIM(s.LastName)),cop.EmployeeName)	[EmployeeName]
		, s.StaffId										[EmployeeNumber]
		, cop.LastDay									[EffectiveDate]
		, 'Termination'									[ActionType]
		, ''											[Replacing]
		, ''											[Benefits]
		, ''											[WageSalary]
	FROM
		TerminationForm cop
		LEFT JOIN Staff s ON cop.StaffID = s.StaffId
	WHERE
		cop.HRApproved = 1
	)x
WHERE
	MONTH(x.EffectiveDate) = MONTH(GETDATE())
	AND YEAR(x.EffectiveDate) = YEAR(GETDATE())
");
	$statement->execute();
	//$currNum = $statement->fetchAll();

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

       <link href="../forms.css" rel="stylesheet">
	<title>Current Report</title>

    <!-- Custom styles for this template -->
    <link href="/BRMH/home.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		  <a class="navbar-brand" href="/BRMH/HRDashboard.php">Dashboard</a>
		  </button>
	</nav>
	<div style="height: 75px;">
		&nbsp; 
	</div>


	<div>
	
	<?php
		//foreach($currNum as $row){
		//	echo $row['staffid'];
		//}
	echo '<table>
		 <tr>
			<th>Employee Name</th>
			<th>Employee Number</th>
			<th>Effective Date</th>
			<th>Action Type</th>
			<th>Replacing</th>
			<th>Benefits</th>
			<th>Wage/Salary</th>
		</tr>';
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		echo '
		<tr>
			<td>' . $row['EmployeeName'] . '</td>
			<td>' . $row['EmployeeNumber'] . '</td>
			<td>' . $row['EffectiveDate'] . '</td>
			<td>' . $row['ActionType'] . '</td>
			<td>' . $row['Replacing'] . '</td>
			<td>' . $row['Benefits'] . '</td>
			<td>' . $row['WageSalary'] . '</td>
		</tr>';
	}
	echo '</table>';
		
		
	?>
	
	</div>
	


	







    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>