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
		//echo "Connection Failed: " . $e->getMessage();
	}

	// This is when submit is clicked it will enter it into the database. 
	if(isset($_POST['submit']))
	{
		$nhName = $_POST['nhName'];
		$nhStartDate = $_POST['nhStartDate'];
		$nhTitle = $_POST['nhTitle'];
		$nhFTE = $_POST['nhFTE'];
		$nhClinicalSupervisor = $_POST['nhClinicalSupervisor'];
		$nhReplacing = $_POST['nhReplacing'];
		$nhLocationID = $_POST['nhLocationID'];
		$nhComputerAccessLookup = $_POST['nhComputerAccessLookup'];
		$nhDCVLookup = $_POST['nhDCVLookup'];
		$nhBenefitsLookup = $_POST['nhBenefitsLookup'];
		$nhOther = $_POST['nhOther'];
		$nhCellPhone = $_POST['nhCellPhone'];
		$nhCellPhoneLookup = $_POST['nhCellPhoneLookup'];
		$nhSupervisor = $_POST['nhSupervisor'];
		$nhDateSubmitted = $_POST['nhDateSubmitted'];
		
		
		$statement = $dbconnect->prepare("INSERT INTO NewHireForm (EmployeeName, Replacing, ClinicalSupervisor, LocationID, NoComputerAccess, DrivingCenterVehicles, BenefitsEligible, OtherConsiderations, CellPhoneStartDate, CellPhoneAmount, SupervisorID, FormSubmissionDate, PositionID, StartDate, FTE) VALUES (:nhName, :nhReplacing, :nhClinicalSupervisor, :nhLocationID, :nhComputerAccessLookup, :nhDCVLookup, :nhBenefitsLookup, :nhOther, :nhCellPhone, :nhCellPhoneLookup, :nhSupervisor, :nhDateSubmitted, :nhTitle, :nhStartDate, :nhFTE)");
		
		$statement->bindParam(':nhName', $nhName);
		$statement->bindParam(':nhStartDate', $nhStartDate);
		$statement->bindParam(':nhTitle', $nhTitle);
		$statement->bindParam(':nhFTE', $nhFTE);
		$statement->bindParam(':nhClinicalSupervisor', $nhClinicalSupervisor);
		$statement->bindParam(':nhReplacing', $nhReplacing);
		$statement->bindParam(':nhLocationID', $nhLocationID);
		$statement->bindParam(':nhComputerAccessLookup', $nhComputerAccessLookup);
		$statement->bindParam(':nhDCVLookup', $nhDCVLookup);
		$statement->bindParam(':nhBenefitsLookup', $nhBenefitsLookup);
		$statement->bindParam(':nhOther', $nhOther);
		$statement->bindParam(':nhCellPhone', $nhCellPhone);
		$statement->bindParam(':nhCellPhoneLookup', $nhCellPhoneLookup);
		$statement->bindParam(':nhSupervisor', $nhSupervisor);
		$statement->bindParam(':nhDateSubmitted', $nhDateSubmitted);
	
		
		$statement->execute();
		$success = true;
	}

?>

<!DOCTYPE html>
<html>
<head>
    <link href="../forms.css" rel="stylesheet">
	<title>New Hire</title>
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
<div class = "portrait">
	<form method="post" action="NewHirePAC.php">
		<div style="height: 75px;" class="divbreak">
		</div>
		<div style="width: 100%;" class="text-center text-bold border-medium f18">
			New Hire Personnel Action Order
		</div>
		<div class="divbreak">
		</div>
		<div style="width: 30%;" class="lfloat bottomborder">
			Name: <input type="text" name="nhName" />
		</div>
		<div style="width: 31%;" class="lfloat bottomborder">
			Start Date: <input type="date" name="nhStartDate" placeholder = "mm/dd/yyyy">
		</div>

		<div style="width: 39%;" class="lfloat">
			&nbsp;Title
			<select name = "nhTitle">
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
		<div class="cleardivbreak">
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			FTE %: <input type="number" name="nhFTE" style="width: 50px;">
		</div>
		<div style="width: 75%;" class="lfloat bottomborder">
			Replacing: <input type="text" name="nhReplacing">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 60%;" class="lfloat bottomborder">
			Clinical Supervisor (If not licensed): <input type="text" name="nhClinicalSupervisor">
		</div>
		<div style="width: 40%;" class="lfloat bottomborder">
			Facility/Office Location: 
			<select name = "nhLocationID">
				<option value = "1">LOP</option>
				<option value = "2">BOP</option>
				<option value = "3">TOP</option>
				<option value = "4">BRH</option>
				<option value = "5">BCH</option>
				<option value = "6">RES</option>
			</select>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 36%;" class="lfloat bottomborder">
			<input type="checkbox" name="nhComputerAccess"> NO Computer Access 
			<select name = "nhComputerAccessLookup">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
		</div>
		<div style="width: 34%;" class="lfloat bottomborder text-center">
			<input type="checkbox" name="nhDCV"> Driving Center Vehicles
			<select name = "nhDCVLookup">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
		</div>
		<div style="width: 30%;" class="lfloat bottomborder text-center">
			<input type="checkbox" name="nhBenefits"> Benefits Eligible 
			<select name = "nhBenefitsLookup">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
			
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 100%;" class="border-medium lfloat">
			<div style="width: 35%;" class="lfloat">
				<span class="text-bold text-underline">Cell phone reimbursement</span> - Start Date
			</div>
			<div style="width: 20%;" class="lfloat bottomborder">
				<input type="text" placeholder = "mm/dd/yyyy" name="nhCellPhone">
			</div>
			<div class="cleardivbreak">
			</div>
			<div style="width: 100%; margin-bottom: 5px;" class="lfloat text-center">
				<select name = "nhCellPhoneLookup">
					<option value = "45">$45 (Employees over 50% FTE)</option>
					<option value = "20">$20 (Employees under 50% FTE)</option>
					<option value = "26">$26 (Nurses)</option>
				</select>
			</div>
		</div>
		<div style="width: 100%;" class="border-medium lfloat">
			<div class="text-bold">
				Other Considerations:
			</div>
			<div class="divbreak">
			</div>
			<div style="width: 98%; padding: 1%">
				<input type = "text" name="nhOther" style="width: 700px;">
			</div>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 12%;" class="text-bold lfloat">
			&nbsp; &nbsp;Supervisor&nbsp;
		</div>
		<div style="width: 58%;" class="bottomborder lfloat">
			<select name = "nhSupervisor">
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
		<div style="width: 15%;" class="text-bold lfloat">
			Date Submitted
		</div>
		<div style="width: 15%;" class="bottomborder lfloat">
			<input type = "text" name = "nhDateSubmitted" placeholder = "mm/dd/yyyy">
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
</body>