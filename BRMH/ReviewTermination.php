<?php
   session_start();
   require_once('../protect.php');
   $protect = new protect();
   $user = $_SESSION['user'];
?>

<?php
	try{
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
	$form_query = "SELECT TerminationFormID, T.StaffID,LastDay,BeenProvidedWithLeavingUsForm,BeenDirectedToAccountantForBenefitsForm,SupervisorProvidedHRInstructionOnReplacement,SupervisorReviewingOustandingDocumentation,OtherConsideration, TRIM(ST.FirstName) + ' ' + TRIM(ST.LastName) AS SupervisorName,HRNotifiedAppropriateStaff,HRAddedToWorkerFiles,HRCloseOutLeaveSystem,HRPayrollCardDrafted,HRTerminateReliasLearning,HRSentAPEmail,HRPersonnelFile,HRPRCards,EmployeeName,SupervisorApproved,HRApproved,PositionID,DateSubmitted FROM TerminationForm AS T JOIN Supervisor AS S ON T.SupervisorID = S.SupervisorID JOIN Staff AS ST ON S.EmployeeID = ST.StaffId WHERE TerminationFormID = " .$form_ID;

	$result = $dbconnect->query($form_query);
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$data = $dbconnect->query($form_query);
	$form_Arr = $data->fetchALL(PDO::FETCH_ASSOC);

	// This is when submit is clicked it will enter it into the database.
	if(isset($_POST['submit']))
	{
		//$termEmployeeLeaving = $_POST['termEmployeeLeaving'];
		//$termNoB = $_POST['termNoB'];
		//$termSupervisorInstructions = $_POST['termSupervisorInstructions'];
		//$termSupervisorDocumentation = $_POST['termSupervisorDocumentation'];
		//$termOther = $_POST['termOther'];
		//$termSupervisor = $_POST['termSupervisor'];
		//$termDateSubmitted = $_POST['termDateSubmitted'];
		$termEmpNum = $_POST['termEmpNum'];
		// $termProcessDate = $_POST['termProcessDate'];
		// $termAdminSupervisor = $_POST['termAdminSupervisor'];
		// $termExperience = $_POST['termExperience'];
		// $termHourly = $_POST['termHourly'];
		// $termMonthly = $_POST['termMonthly'];
		// $termYearly = $_POST['termYearly'];
		// $termStipendType = $_POST['termStipendType'];
		// $termStipendHourly = $_POST['termStipendHourly'];
		// $termStipendMonthly = $_POST['termStipendMonthly'];
		// $termStipendYearly = $_POST['termStipendYearly'];
		$termHR1 = $_POST['termHR1'];
		$termHR2 = $_POST['termHR2'];
		$termHR3 = $_POST['termHR3'];
		$termHR4 = $_POST['termHR4'];
		$termHR5 = $_POST['termHR5'];
		$termHR7 = $_POST['termHR7'];
		$termHR8 = $_POST['termHR8'];
		$termHR9 = $_POST['termHR9'];
		$termApprove = $_POST['termApprove'];



		$statement = $dbconnect->prepare("UPDATE TerminationForm SET StaffID = :termEmpNum, HRNotifiedAppropriateStaff = :termHR1, HRAddedToWorkerFiles = :termHR2, HRCloseOutLeaveSystem = :termHR3, HRPayrollCardDrafted = :termHR4, HRTerminateReliasLearning = :termHR5, HRSentAPEmail = :termHR7, HRPersonnelFile = :termHR8, HRPRCards = :termHR9, HRApproved = :termApprove WHERE TerminationFormID =".$form_ID);


		//$statement->bindParam(':termEmployeeLeaving', $termEmployeeLeaving);
		//$statement->bindParam(':termNoB', $termNoB);
		//$statement->bindParam(':termSupervisorInstructions', $termSupervisorInstructions);
		//$statement->bindParam(':termSupervisorDocumentation', $termSupervisorDocumentation);
		//$statement->bindParam(':termOther', $termOther);
		//$statement->bindParam(':termSupervisor', $termSupervisor);
		//$statement->bindParam(':termDateSubmitted', $termDateSubmitted);
		$statement->bindParam(':termEmpNum', $termEmpNum);
		//$statement->bindParam(':DateSubmitted', $termDateSubmitted);
		// $statement->bindParam(':termProcessDate', $termProcessDate);
		// $statement->bindParam(':termAdminSupervisor', $termAdminSupervisor);
		// $statement->bindParam(':termExperience', $termExperience);
		// $statement->bindParam(':termHourly', $termHourly);
		// $statement->bindParam(':termMonthly', $termMonthly);
		// $statement->bindParam(':termYearly', $termYearly);
		// $statement->bindParam(':termStipendType', $termStipendType);
		// $statement->bindParam(':termStipendHourly', $termStipendHourly);
		// $statement->bindParam(':termStipendMonthly', $termStipendMonthly);
		// $statement->bindParam(':termStipendYearly', $termStipendYearly);
		$statement->bindParam(':termHR1', $termHR1);
		$statement->bindParam(':termHR2', $termHR2);
		$statement->bindParam(':termHR3', $termHR3);
		$statement->bindParam(':termHR4', $termHR4);
		$statement->bindParam(':termHR5', $termHR5);
		$statement->bindParam(':termHR7', $termHR7);
		$statement->bindParam(':termHR8', $termHR8);
		$statement->bindParam(':termHR9', $termHR9);
		$statement->bindParam(':termApprove', $termApprove);


		$statement->execute();
		$success = true;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link href="../forms.css" rel="stylesheet">
    <link href="../forms.css" rel="stylesheet">
	<title>Review Termination</title>
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
<div class = "portrait">
	<form method = "POST" action = "ReviewTermination.php?ID=<?php echo $form_ID ?>">
		<div style='height:75px'>
		</div>
		<div style="width: 100%;" class="text-center text-bold border-medium f18">
			Termination - Personnel Action Order
		</div>
		<div class="divbreak">
		</div>
		<div class="text-bold text-italic">
			Has the employee:
		</div>
		<div style="width: 100%;">
			<input type="checkbox" value="1" name="termEmployeeLeaving" <?php if($form_Arr['0']['BeenProvidedWithLeavingUsForm'] == 1){echo 'checked';} ?> disabled> Been provided the <span class="text-bold">"So You Are Leaving Us"</span> form?
			<br>
			<input type="checkbox" value="1" name="termNoB" <?php if($form_Arr['0']['BeenDirectedToAccountantForBenefitsForm'] == 1){echo 'checked';} ?> disabled> Been directed to the Accountant for completion of <span class="text-bold">"Notification of Benefits"</span> form
		</div>
		<div class="cleardivbreak">
		</div>
		<div class="text-bold">
			Have you as the supervisor:
		</div>
		<div style="width: 100%;">
			<input type="checkbox" value="1" name="termSupervisorInstructions" <?php if($form_Arr['0']['SupervisorProvidedHRInstructionOnReplacement'] == 1){echo 'checked';} ?> disabled> Provided H/R instructions on hiring a replacement?
			<br>
			<input type="checkbox" value="1" name="termSupervisorDocumentation" <?php if($form_Arr['0']['SupervisorReviewingOustandingDocumentation'] == 1){echo 'checked';} ?> disabled> Began reviewing the employee's outstanding documentation?
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 20%;" class="lfloat text-bold">
			Other Considerations:
		</div>
		<div style="width: 80%;" class="lfloat bottomborder">
			<input type="text" name="termOther" style="width: 550px;" value = "<?php echo $form_Arr['0']['OtherConsideration']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 10%;" class="lfloat">
			Supervisor
		</div>
		<div style="width: 40%;" class="lfloat bottomborder">
			<input type="text" name="termSupervisor" style="width: 200px;" value = "<?php echo $form_Arr['0']['SupervisorName']; ?>" disabled>
		</div>
		<div style="width: 15%;" class="lfloat">
			Date Submitted
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			<input type="text" name="termDateSubmitted" style="width: 150px;" value = "<?php echo $form_Arr['0']['DateSubmitted']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 740px; padding: 5px;" class="border-thin lfloat">
			<div style="width: 75%;" class="lfloat text-bold text-underline f16">
				FOR H/R USE ONLY:
			</div>
			<div style="width: 25%;" class="lfloat">
				<span class="text-bold">EMPLOYEE #</span> <span class="text-underline"><input type="text" name="termEmpNum" style="width: 50px;"></span>
			</div>
			<div class="cleardivbreak">
			</div>
			<div style="width: 25%; line-height: 18px;" class="lfloat f12">
				Notified: Appropriate Staff
				<br>
				Added to Worker Files
				<br>
				Close out Leave System
				<br>
				Payroll Card Drafted
				<br>
				Terminate Relias Learning
			</div>
			<div style="width: 5%;" class="lfloat text-underline f12">
				<select name = "termHR1">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "termHR2">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "termHR3">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "termHR4">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "termHR5">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
			</div>
			<div style="width: 5%;" class="lfloat">
				&nbsp;
			</div>
			<div style="width: 35%; line-height: 18px;" class="lfloat f12">
				Sent A/P email to notify Provider Enrollment
				<br>
				Personnel File
				<br>
				P/R Cards
			</div>
			<div style="width: 5%;" class="lfloat text-underline f12">
				<select name = "termHR7">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "termHR8">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "termHR9">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
			</div>
			<div class="cleardivbreak">
			</div>
		</div>
		<div class="cleardivbreak">
		</div>
		<div>
			<select name = "termApprove">
				<option value = "1">Approved</option>
				<option value = "0">Denied</option>
		</div>
		<div class="wrapper">
			<input type="submit" name="submit"></input>
		</div>
	</form>
</div>
<script>
	var success = <?php echo $success; ?>;
	if (success){
		alert ("Successfully submitted");
		location.href = "/BRMH/home.php";
	}
</script>
