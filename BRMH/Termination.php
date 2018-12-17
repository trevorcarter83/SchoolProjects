<?php
   session_start();
   require_once('../protect.php');
   $protect = new protect();
   $user = $_SESSION['user'];

	try{
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

	// This is when submit is clicked it will enter it into the database. 
	if(isset($_POST['submit']))
	{
		$termEmployeeName = $_POST['termEmployeeName'];
		$termPosition = $_POST['termPosition'];
		$termLastDay = $_POST['termLastDay'];
		$termEmployeeLeaving = $_POST['termEmployeeLeaving'];
		$termNoB = $_POST['termNoB'];
		$termSupervisorInstructions = $_POST['termSupervisorInstructions'];
		$termSupervisorDocumentation = $_POST['termSupervisorDocumentation'];
		$termOther = $_POST['termOther'];
		$termSupervisor = $_POST['termSupervisor'];
		//$termDateSubmitted = $_POST['termDateSubmitted'];
		
		
		
		$statement = $dbconnect->prepare("INSERT INTO TerminationForm (EmployeeName, PositionID, LastDay, BeenProvidedWithLeavingUsForm, BeenDirectedToAccountantForBenefitsForm, SupervisorProvidedHRInstructionOnReplacement, SupervisorReviewingOustandingDocumentation, OtherConsideration, SupervisorID, SupervisorApproved) VALUES (:termEmployeeName, :termPosition, :termLastDay, :termEmployeeLeaving, :termNoB, :termSupervisorInstructions, :termSupervisorDocumentation, :termOther, :termSupervisor, '1')");
		
		
		$statement->bindParam(':termEmployeeName', $termEmployeeName);
		$statement->bindParam(':termPosition', $termPosition);
		$statement->bindParam(':termLastDay', $termLastDay);
		$statement->bindParam(':termEmployeeLeaving', $termEmployeeLeaving);
		$statement->bindParam(':termNoB', $termNoB);
		$statement->bindParam(':termSupervisorInstructions', $termSupervisorInstructions);
		$statement->bindParam(':termSupervisorDocumentation', $termSupervisorDocumentation);
		$statement->bindParam(':termOther', $termOther);
		$statement->bindParam(':termSupervisor', $termSupervisor);
		//$statement->bindParam(':termDateSubmitted', $termDateSubmitted);
		
		
		$statement->execute();
		$success = true;
	}

?>
<!DOCTYPE html>
<html>
<head>
    <link href="../forms.css" rel="stylesheet">
	<title>Termination</title>
<!-- Bootstrap core CSS -->
    <link href="/BRMH/bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/BRMH/home.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/BRMH/home.php">Home</a>\
      </button>
</nav>
<div class = "portrait">
	<div style="height: 75px;" class="divbreak">
	</div>
	<form method = "POST" action = "Termination.php">
		<div style="width: 100%;" class="text-center text-bold border-medium f18">
			Termination - Personnel Action Order
		</div>
		<div class="divbreak">
		</div>
		<div style="width: 27%;" class="lfloat">
			Employee's Name: <input type="text" name = "termEmployeeName" style="width: 80px;">
		</div>
		<div style="width: 42%;" class="lfloat">
			Position: <select name = "termPosition">
				<option value = "1">N/A</option>
				<option value = "2">Temp DP Receptionist</option>
				<option value = "3">Temp DP Kitchen Asst.</option>
				<option value = "4">Peer Support Specialist</option>
				<option value = "5">Residential Senior Housing Aide</option>
				<option value = "6">Residential Aide</option>
				<option value = "7">Support Specialist</option>
				<option value = "8">Medical Assistant</option>
				<option value = "9">2nd Yr. Ph.D. Student</option>
				<option value = "10">1st Yr. Ph.D. Student</option>
				<option value = "11">Master's Student</option>
				<option value = "12">Bachelors Student</option>
				<option value = "13">Case Manager I</option>
				<option value = "14">Case Manager II</option>
				<option value = "15">Utilization Coordinator</option>
				<option value = "16">Family Facilitator</option>
				<option value = "17">Clinical Support Specialist</option>
				<option value = "18">Clinical Secretary</option>
				<option value = "19">Contract Specialist</option>
				<option value = "20">Administrative Assistant to Pres/CEO</option>
				<option value = "21">Information System/Support Specialist</option>
				<option value = "22">Masters - Unlicensed</option>
				<option value = "23">Masters - Licensed</option>
				<option value = "24">Psychologist - Unlicensed</option>
				<option value = "25">Psychologist - Licensed</option>
				<option value = "26">Accountant - B.S.</option>
				<option value = "27">Accountant - M.A. NO CPA</option>
				<option value = "28">Accountant - M.A. CPA</option>
				<option value = "29">LPN Nurse</option>
				<option value = "30">RN</option>
				<option value = "31">APRN</option>
				<option value = "32">Psychiatrist</option>
				<option value = "33">Programmer</option>
				<option value = "34">Senior Network Administrator</option>
				<option value = "35">Corporate Compliance Officer</option>
				<option value = "36">Director of H/R and MIS</option>
				<option value = "37">Director of Financial Services</option>
				<option value = "38">President/CEO</option>
			</select>
		</div>
		<div style="width: 26%;" class="lfloat">
			Last day: <input type="date" name="termLastDay" style="width: 130px;" placeholder = "mm/dd/yyyy">
		</div>
		<div class="cleardivbreak">
		</div>
		<div class="text-bold text-italic">
			Has the employee:
		</div>
		<div style="width: 100%;">
			<input type="checkbox" value="1" name="termEmployeeLeaving"> Been provided the <span class="text-bold">"So You Are Leaving Us"</span> form?
			<br>
			<input type="checkbox" value="1" name="termNoB"> Been directed to the Accountant for completion of <span class="text-bold">"Notification of Benefits"</span> form
		</div>
		<div class="cleardivbreak">
		</div>
		<div class="text-bold">
			Have you as the supervisor:
		</div>
		<div style="width: 100%;">
			<input type="checkbox" value="1" name="termSupervisorInstructions"> Provided H/R instructions on hiring a replacement?
			<br>
			<input type="checkbox" value="1" name="termSupervisorDocumentation"> Began reviewing the employee's outstanding documentation?
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 20%;" class="lfloat text-bold">
			Other Considerations:
		</div>
		<div style="width: 80%;" class="lfloat bottomborder">
			<input type="text" name="termOther" style="width: 550px;">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 10%;" class="lfloat">
			Supervisor
		</div>
		<div style="width: 40%;" class="lfloat bottomborder">
			<select name = "termSupervisor">
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
		<div style="width: 15%;" class="lfloat">
			Date Submitted
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			<input type="date" name="termDateSubmitted" style="width: 150px;" placeholder = "mm/dd/yyyy">
		</div>
		<div class="cleardivbreak">
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