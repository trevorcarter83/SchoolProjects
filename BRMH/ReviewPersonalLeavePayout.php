<?php
   session_start();
   require_once('../protect.php');
   $protect = new protect();
   $user = $_SESSION['user'];
?>

<?php
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

	$form_ID = (string)$_GET['ID'];
	$form_query = "SELECT PaidTimeOffFormID, (TRIM(ST.FirstName) + ' ' + TRIM(ST.LastName)) AS EmpName, FormTimestamp,Initial,HoursOfLeave,StartDate,EndDate,AdditionalHours,EmployeeSignature,SupervisorSignature,PayrollSignature,EmployeeSignatureDate,SupervisorSignatureDate,PayrollSignatureDate,HRHours,HRAmountPerHour,HRDatePaid,HRPaidBy,HRAdjustmentDate,SupervisorApproved,HRApproved,PTO.EmployeeID  FROM PaidTimeOffForm AS PTO JOIN Staff AS ST ON PTO.EmployeeID = ST.StaffId  WHERE PaidTimeOffFormID = ".$form_ID;

	$result = $dbconnect->query($form_query);
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$data = $dbconnect->query($form_query);
	$form_Arr = $data->fetchALL(PDO::FETCH_ASSOC);

	// This is when submit is clicked it will enter it into the database.
	if(isset($_POST['submit']))
	{
		//$ptoEmployeeNum = $_POST['ptoEmployeeNum'];
		//$ptoDate = $_POST['ptoDate'];
		//$ptoInitials = $_POST['ptoInitials'];
		//$ptoHoursOff = $_POST['ptoHoursOff'];
		//$ptoDate1 = $_POST['ptoDate1'];
		//$ptoDate2 = $_POST['ptoDate2'];
		//$ptoAdditional = $_POST['ptoAdditional'];
		//$ptoEmployeeSignature = $_POST['ptoEmployeeSignature'];
		//$ptoEmployeeDate = $_POST['ptoEmployeeDate'];
		//$ptoSupervisorSignature = $_POST['ptoSupervisorSignature'];
		//$ptoSupervisorDate = $_POST['ptoSupervisorDate'];
		$ptoPersonnelSignature = $_POST['ptoPersonnelSignature'];
		$ptoPersonnelDate = $_POST['ptoPersonnelDate'];
		$ptoHours = $_POST['ptoHours'];
		$ptoPerHour = $_POST['ptoPerHour'];
		$ptoDatePaid = $_POST['ptoDatePaid'];
		$ptoPaidBy = $_POST['ptoPaidBy'];
		$ptoEnteredIn = $_POST['ptoEnteredIn'];
		$ptoApprove = $_POST['ptoApprove'];



		$statement = $dbconnect->prepare("UPDATE PaidTimeOffForm SET HRHours = :ptoHours, HRAmountPerHour = :ptoPerHour, HRDatePaid = :ptoDatePaid, HRPaidBy = :ptoPaidBy, HRAdjustmentDate = :ptoEnteredIn, PayrollSignature = :ptoPersonnelSignature, PayrollSignatureDate = :ptoPersonnelDate HRApproved = :ptoApprove WHERE PaidTimeOffFormID = ".$form_ID);

		//$statement->bindParam(':ptoEmployeeNum', $ptoEmployeeNum);
		//$statement->bindParam(':ptoDate', $ptoDate);
		//$statement->bindParam(':ptoInitials', $ptoInitials);
		//$statement->bindParam(':ptoHoursOff', $ptoHoursOff);
		//$statement->bindParam(':ptoDate1', $ptoDate1);
		//$statement->bindParam(':ptoDate2', $ptoDate2);
		//$statement->bindParam(':ptoAdditional', $ptoAdditional);
		//$statement->bindParam(':ptoEmployeeSignature', $ptoEmployeeSignature);
		//$statement->bindParam(':ptoEmployeeDate', $ptoEmployeeDate);
		//$statement->bindParam(':ptoSupervisorSignature', $ptoSupervisorSignature);
		//$statement->bindParam(':ptoSupervisorDate', $ptoSupervisorDate);
		$statement->bindParam(':ptoPersonnelSignature', $ptoPersonnelSignature);
		$statement->bindParam(':ptoPersonnelDate', $ptoPersonnelDate);
		$statement->bindParam(':ptoHours', $ptoHours);
		$statement->bindParam(':ptoPerHour', $ptoPerHour);
		$statement->bindParam(':ptoDatePaid', $ptoDatePaid);
		$statement->bindParam(':ptoPaidBy', $ptoPaidBy);
		$statement->bindParam(':ptoEnteredIn', $ptoEnteredIn);
		$statement->bindParam(':ptoApprove', $ptoApprove);

		$statement->execute();
		$success = true;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link href="../forms.css" rel="stylesheet">
    <link href="../forms.css" rel="stylesheet">
	<title>Review Personal Leave Payout</title>
<!-- Bootstrap core CSS -->
    <link href="/BRMH/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/BRMH/home.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/BRMH/form_review.php">HR Dashboard</a>
      </button>
</nav>

<div class="portrait">
	<form method="POST" action="ReviewPersonalLeavePayout.php?ID=<?php echo $form_ID ?>">
		<div style='height:75px'>
		</div>
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
			<input type="text" name="ptoName" value = "<?php echo $form_Arr['0']['EmpName']; ?>" disabled>
		</div>
		<div style="width: 12%;" class="lfloat">
			Employee #
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input type="text" name="ptoEmployeeNum" style="width: 50px;" value = "<?php echo $form_Arr['0']['EmployeeID']; ?>" disabled>
		</div>
		<div style="width: 5%;" class="lfloat">
			Date
		</div>
		<div style="width: 20%;" class="lfloat bottomborder">
			<input type="text" name="ptoDate" style="width: 100px;" value = "<?php echo $form_Arr['0']['FormTimestamp']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 738px; padding: 5px;" class="border-thin lfloat">
			<div>
				I have read the Center's Personal Leave Pay-Out Policy found in the most recent version of the Personnel Policy Manual, located on the Bear River Mental Health Internal Website, and have met all of the conditions stated therein.
			</div>
			<div style="width: 15%;" class="lfloat text-center bottomborder">
				<input type="text" name="ptoInitials" style="width: 50px;" value = "<?php echo $form_Arr['0']['Initial']; ?>" disabled>
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
			I am taking <span class="text-underline">&nbsp;<input type="text" name="ptoHoursOff" style="width: 50px;" value = "<?php echo $form_Arr['0']['HoursOfLeave']; ?>" disabled>&nbsp;</span> <span class="text-bold">HOURS OF PERSONAL LEAVE</span> on the following consecutive days <span class="text-underline"> <input type="text" name="ptoDate1" style="width: 125px;" value = "<?php echo $form_Arr['0']['StartDate']; ?>" disabled> to <input type="text" name="ptoDate2" style="width: 125px;" value = "<?php echo $form_Arr['0']['EndDate']; ?>" disabled></span> <span class="text-bold">(month/day/year).</span> <span class="text-underline">NOTE:</span> <span class="text-italic">(must be a minimum of two consecutive days in relationship to your FTE, excluding holidays and weekends---once the minimum is met, cash out should be on a one-to-one basis, AND be taken in full hour increments).</span> In lieu of time off, I would like to receive an additional <span class="text-underline">&nbsp;<input type="text" name="ptoAdditional" style="width: 100px;" value = "<?php echo $form_Arr['0']['AdditionalHours']; ?>" disabled>&nbsp;</span> <span class="text-bold">HOUR OF PAY</span> <span class="text-italic text-underline">(must not exceed the number of hours of personal leave taken, however, a greater ratio of personal leave days taken to days paid out may be approved.</span>I understand that I will receive this reimbursement the payday following the last day of my personal leave taken. <span class="text-underline">I will have a balance of at least <span class="text-bold">one week</span> of personal leave left in my leave bank.</span>
		</div>
		<div class="divbreak">
		</div>
		<div style="width: 45%;" class="lfloat bottomborder">
			<input type="text" name="ptoEmployeeSignature" style="width: 200px;" value = "<?php echo $form_Arr['0']['EmployeeSignature']; ?>" disabled>
		</div>
		<div style="width: 15%;" class="lfloat">
			&nbsp;
		</div>
		<div style="width: 20%;" class="lfloat bottomborder text-center">
			<input type="text" name="ptoEmployeeDate" style="width: 150px;" value = "<?php echo $form_Arr['0']['EmployeeSignatureDate']; ?>" disabled>
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
		<div style="width: 45%;" class="lfloat bottomborder">
			<input type="text" name="ptoSupervisorSignature" style="width: 200px;" value = "<?php echo $form_Arr['0']['SupervisorSignature']; ?>" disabled>
		</div>
		<div style="width: 15%;" class="lfloat">
			&nbsp;
		</div>
		<div style="width: 20%;" class="lfloat bottomborder text-center">
			<input type="text" name="ptoSupervisorDate" style="width: 150px;" value = "<?php echo $form_Arr['0']['SupervisorSignatureDate']; ?>" disabled>
		</div>
		<div style="width: 45%;" class="clearfloat-left">
			Supervisor Signature
		</div>
		<div style="width: 15%;" class="lfloat">
			&nbsp;
		</div>
		<div style="width: 20%;" class="lfloat text-center">
			Date
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 45%;" class="lfloat bottomborder">
			<input type="text" name="ptoPersonnelSignature" style="width: 200px;">
		</div>
		<div style="width: 15%;" class="lfloat">
			&nbsp;
		</div>
		<div style="width: 20%;" class="lfloat bottomborder text-center">
			<input type="text" name="ptoPersonnelDate" style="width: 150px;" >
		</div>
		<div style="width: 45%;" class="clearfloat-left">
			Received by Personnel/Payroll
		</div>
		<div style="width: 15%;" class="lfloat">
			&nbsp;
		</div>
		<div style="width: 20%;" class="lfloat text-center">
			Date
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 100%;" class="bottomborder-medium">
			&nbsp;
		</div>
		<div class="text-italic text-bold">
			For Office Use Only
		</div>
		<div class="cleardivbreak">
		</div>
		<div>
			<span class="text-underline">&nbsp;<input type="text" name="ptoHours" style="width: 100px;" >&nbsp;</span> <span class="text-italic">hours calculated at $</span> <span class="text-underline">&nbsp;<input type="text" name="ptoPerHour" style="width: 75px;">&nbsp;</span><span class="text-bold">(per hour)</span> <span class="text-italic">for a total of $</span> <span class="text-underline">&nbsp;&nbsp;<input type="text" name="ptoTotal" style="width: 100px;">&nbsp;&nbsp;</span>
			<br>
			Date Paid <span class="text-underline">&nbsp; <input type="text" name="ptoDatePaid" style="width: 125px;"> &nbsp;</span> &nbsp; &nbsp; Paid by <span class="text-underline">&nbsp;<input type="text" name="ptoPaidBy" style="width: 200px;">&nbsp;</span>
		</div>
		<div class="divbreak">
		</div>
		<div>
			<input type="checkbox" value="Y"> Entered adjustment in Leave Record System on <span class="text-underline">&nbsp; <input type="text" name="ptoEnteredIn" style="width: 150px;"> &nbsp;</span> date.
		</div>
		<div class="cleardivbreak">
		</div>
		<div>
			<select name = "ptoApprove">
				<option value = "1">Approved</option>
				<option value = "0">Denied</option>
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
