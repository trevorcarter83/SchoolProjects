<?php
   session_start();
   require_once('../protect.php');
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
	echo "Connection Failed: " . $e->getMessage();
	}

	// This is when submit is clicked it will enter it into the database. 
	if(isset($_POST['submit']))
	{
		$ptoEmployeeNum = $_POST['ptoEmployeeNum'];
		$ptoDate = $_POST['ptoDate'];
		$ptoInitials = $_POST['ptoInitials'];
		$ptoHoursOff = $_POST['ptoHoursOff'];
		$ptoDate1 = $_POST['ptoDate1'];
		$ptoDate2 = $_POST['ptoDate2'];
		$ptoAdditional = $_POST['ptoAdditional'];
		$ptoEmployeeSignature = $_POST['ptoEmployeeSignature'];
		$ptoEmployeeDate = $_POST['ptoEmployeeDate'];
		$ptoSupervisor = $_POST['ptoSupervisor'];
		
		
		
		$statement = $dbconnect->prepare("INSERT INTO PaidTimeOffForm (EmployeeID, FormTimestamp, Initial, HoursOfLeave, StartDate, EndDate, AdditionalHours, EmployeeSignature, EmployeeSignatureDate, SupervisorID) VALUES (:ptoEmployeeNum, :ptoDate, :ptoInitials, :ptoHoursOff, :ptoDate1, :ptoDate2, :ptoAdditional, :ptoEmployeeSignature, :ptoEmployeeDate, :ptoSupervisor)");
		
		$statement->bindParam(':ptoEmployeeNum', $ptoEmployeeNum);
		$statement->bindParam(':ptoDate', $ptoDate);
		$statement->bindParam(':ptoInitials', $ptoInitials);
		$statement->bindParam(':ptoHoursOff', $ptoHoursOff);
		$statement->bindParam(':ptoDate1', $ptoDate1);
		$statement->bindParam(':ptoDate2', $ptoDate2);
		$statement->bindParam(':ptoAdditional', $ptoAdditional);
		$statement->bindParam(':ptoEmployeeSignature', $ptoEmployeeSignature);
		$statement->bindParam(':ptoEmployeeDate', $ptoEmployeeDate);
		$statement->bindParam(':ptoSupervisor', $ptoSupervisor);
		
		$statement->execute();
		$success = true;
	}

?>
<!DOCTYPE html>
<html>
<head>
    <link href="../forms.css" rel="stylesheet">
	<title>Employee PTO</title>
<!-- Bootstrap core CSS -->
    <link href="/BRMH/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/BRMH/home.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/BRMH/home.php">Home</a>
      </button>
</nav>
<div class="portrait">
<div style="height: 75px;" class="divbreak">
</div>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	  <a class="navbar-brand" href="../home.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
	<form method="POST" action="PersonalLeavePayout.php">
		<div class="text-center text-bold">
			Bear River Mental Health Services, Inc.
			<br>
			Request for Personal Leave Pay-out
		</div>
		<div class="divbreak">
		</div>
		<div style="width: 7%;" class="lfloat">
			Name
		</div>
		<div style="width: 41%;" class="lfloat bottomborder">
			<input type="text" name="ptoName">
		</div>
		<div style="width: 12%;" class="lfloat">
			Employee #
		</div>
		<div style="width: 10%;" class="lfloat bottomborder">
			<input type="number" name="ptoEmployeeNum" style="width: 50px;">
		</div>
		<div style="width: 5%;" class="lfloat">
			Date
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			<input type="date" name="ptoDate" placeholder = "mm/dd/yyyy" style="width: 150px;">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 738px; padding: 5px;" class="border-thin lfloat">
			<div>
				I have read the Center's Personal Leave Pay-Out Policy found in the most recent version of the Personnel Policy Manual, located on the Bear River Mental Health Internal Website, and have met all of the conditions stated therein.
			</div>
			<div style="width: 15%;" class="lfloat text-center bottomborder">
				<input type="text" name="ptoInitials" style="width: 50px;">
			</div>
			<div class="lfloat">
				(Please Initial).
			</div>
		</div>
		<div class="cleardivbreak">
		</div>
		<div class="f18 text-bold text-italic">
			I would like to request the following:
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="line-height: 30px;">
			I am taking <span class="text-underline">&nbsp;<input type="number" name="ptoHoursOff" style="width: 50px;">&nbsp;</span> <span class="text-bold">HOURS OF PERSONAL LEAVE</span> on the following consecutive days <span class="text-underline"> <input type="date" name="ptoDate1" placeholder = "mm/dd/yyyy" style="width: 125px;"> to <input type="date" name="ptoDate2" placeholder = "mm/dd/yyyy" style="width: 125px;"></span> <span class="text-bold">(month/day/year).</span> <span class="text-underline">NOTE:</span> <span class="text-italic">(must be a minimum of two consecutive days in relationship to your FTE, excluding holidays and weekends---once the minimum is met, cash out should be on a one-to-one basis, AND be taken in full hour increments).</span> In lieu of time off, I would like to receive an additional <span class="text-underline">&nbsp;<input type="number" name="ptoAdditional" style="width: 100px;">&nbsp;</span> <span class="text-bold">HOUR OF PAY</span> <span class="text-italic text-underline">(must not exceed the number of hours of personal leave taken, however, a greater ratio of personal leave days taken to days paid out may be approved.</span>I understand that I will receive this reimbursement the payday following the last day of my personal leave taken. <span class="text-underline">I will have a balance of at least <span class="text-bold">one week</span> of personal leave left in my leave bank.</span> 
		</div>
		<div class="divbreak">
		</div>
		<div style="width: 45%;" class="lfloat bottomborder">
			<input type="text" name="ptoEmployeeSignature" style="width: 200px;">
		</div>
		<div style="width: 15%;" class="lfloat">
			&nbsp;
		</div>
		<div style="width: 20%;" class="lfloat bottomborder text-center">
			<input type="date" placeholder = "mm/dd/yyyy" name="ptoEmployeeDate" style="width: 150px;">
		</div>
		<div style="width: 45%;" class="clearfloat-left">
			Employee Signature
		</div>
		<div style="width: 15%;" class="lfloat">
			&nbsp;
		</div>
		<div style="width: 20%;" class="lfloat text-center">
			Date
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 25%;" class="lfloat">
			Who is your supervisor?
		</div>
		<div style="width: 40%;" class="lfloat">
			<select name = "ptoSupervisor">
				<option value = "3">Beth Smith</option>
				<option value = "4">Lance Bingham</option>
				<option value = "5">Tim Frost</option>
				<option value = "6">Adam Boman</option>
				<option value = "7">Carolina Brog</option>
				<option value = "8">Rob Johnson</option>
				<option value = "9">Trevor Cook</option>
				<option value = "10">Ean Sorensen</option>
				<option value = "11">Shaela Glade</option>
			</select>
		</div>
		<div class="cleardivbreak">
		</div>
		<div class="wrapper">
			<input type="submit" name="submit"></input>
		</div>
	</form>
</div>
<script>
	var success = "<?php echo $success;?>";
	if (success){
		alert ("Successfully submitted");
		location.href = "/BRMH/home.php";
	}
</script>
</body>