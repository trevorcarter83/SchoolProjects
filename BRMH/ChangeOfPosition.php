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
		$copEmployeeNum = $_POST['copEmployeeNum'];
		$copEmployeeName = $_POST['copEmployeeName'];
		$copEffectiveDate = $_POST['copEffectiveDate'];
		$copFTEChange = $_POST['copFTEChange'];
		$copFTEChangeNew = $_POST['copFTEChangeNew'];
		$copNewPosition = $_POST['copNewPosition'];
		$copOldPosition = $_POST['copOldPosition'];
		$copReplacing = $_POST['copReplacing'];
		$copClinicalSupervisor = $_POST['copClinicalSupervisor'];
		$copClinicalLicenseDate = $_POST['copClinicalLicenseDate'];
		$copCellPhoneStart = $_POST['copCellPhoneStart'];
		$copCellPhoneEnd = $_POST['copCellPhoneEnd'];
		$copCellPhoneAmount = $_POST['copCellPhoneAmount'];
		$copOther = $_POST['copOther'];
		$copSupervisor = $_POST['copSupervisor'];
		//$copDateSubmitted = $_POST['copDateSubmitted'];		
		
		
		$statement = $dbconnect->prepare("INSERT INTO ChangeOfPositionForm (StaffID, EmployeeName, FormTimestamp, FTEChange, PositionChange, FTEChangeNew, PositionChangeNew, PositionChangeReplacing, PositionChangeClinicalSupervisor, ClinicalLicenseEffectiveDate, CellPhoneStartDate, CellPhoneEndDate, CellPhoneAmount, OtherConsiderations, SupervisorID) VALUES (:copEmployeeNum, :copEmployeeName, :copEffectiveDate, :copFTEChange, :copOldPosition, :copFTEChangeNew, :copNewPosition, :copReplacing, :copClinicalSupervisor, :copClinicalLicenseDate, :copCellPhoneStart, :copCellPhoneEnd, :copCellPhoneAmount, :copOther, :copSupervisor)");

		$statement->bindParam(':copEmployeeNum', $copEmployeeNum);
		$statement->bindParam(':copEmployeeName', $copEmployeeName);
		$statement->bindParam(':copEffectiveDate', $copEffectiveDate);
		$statement->bindParam(':copFTEChange', $copFTEChange);
		$statement->bindParam(':copFTEChangeNew', $copFTEChangeNew);
		$statement->bindParam(':copReplacing', $copReplacing);
		$statement->bindParam(':copNewPosition', $copNewPosition);
		$statement->bindParam(':copOldPosition', $copOldPosition);
		$statement->bindParam(':copClinicalSupervisor', $copClinicalSupervisor);
		$statement->bindParam(':copClinicalLicenseDate', $copClinicalLicenseDate);
		$statement->bindParam(':copCellPhoneStart', $copCellPhoneStart);
		$statement->bindParam(':copCellPhoneEnd', $copCellPhoneEnd);
		$statement->bindParam(':copCellPhoneAmount', $copCellPhoneAmount);
		$statement->bindParam(':copOther', $copOther);
		$statement->bindParam(':copSupervisor', $copSupervisor);
		//$statement->bindParam(':copDateSubmitted', $copDateSubmitted);
		
		$statement->execute();
		$success = true;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="../forms.css" rel="stylesheet">
	<title>Change of Position</title>
	
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
	<form method = "POST" action = "ChangeOfPosition.php">
		<div style="height: 75px;" class="divbreak">
		</div>
		<div style="width: 100%;" class="text-center text-bold border-medium f18">
			Change of Position/FTE/Salary - Personnel Action Order
		</div>
		<div class="divbreak">
		</div>
		<div style="width: 20%;" class="lfloat bottomborder">
			Employee # <input type = "number" name = "copEmployeeNum" style="width: 50px;">
		</div>
		<div style="width: 40%;" class="lfloat bottomborder">
			Employee Name: <input type = "text" name = "copEmployeeName">
		</div>
		<div style="width: 40%;" class="lfloat bottomborder">
			Effective Date: <input style="width: 130px;" type="date" name="copEffectiveDate" placeholder = "mm/dd/yyyy">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 20%;" class="lfloat">
			<input type="checkbox" name="copFTEChange" value="FTE Change"> FTE Change? From
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input style="width: 50px;" type="number" name="copFTEChange" min="0" max="100">
		</div>
		<div style="width: 5%;" class="lfloat">
			% to
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input style="width: 50px;" type="number" name="copFTEChangeNew" min="0" max="100">
		</div>
		<div style="width: 2%;" class="lfloat">
			%
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 30%;" class="lfloat">
			<input type="checkbox" name="copPositionChange" value="New Position"> Position Change? New position
		</div>
		<div style="width: 20%;" class="lfloat">
			<select name = "copNewPosition">
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
		<div style="width: 17%;" class="lfloat">
			&nbsp;
		</div>
		<div style="width: 15%;" class="lfloat">
			Old Position
		</div>
		<div style="width: 20%;" class="lfloat">
			<select name = "copOldPosition">
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
		<div style="width: 27%;" class="lfloat">
			Who is the person replacing?
		</div>
		<div style="width: 35%;" class="lfloat bottomborder">
			<input style="width: 125px;" type="text" name="copReplacing">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="padding-left: 5%; width: 60%;" class="lfloat">
			If clinical, but not licensed independently, clinical supervisor is?
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			<input style="width: 125px;" type="text" name="copClinicalSupervisor">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 47%;" class="lfloat">
			<input type="checkbox" name="copClinicalLicenseED" value="New Position"> Received a clinical license? Effective date?
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			<input style="width: 125px;" type="date" name="copClinicalLicenseDate" placeholder = "mm/dd/yyyy">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 100%;" class="border-medium lfloat">
			<div style="width: 60%;" class="lfloat">
				<span class="text-bold text-underline">Cell phone reimbursement</span> - Start Date <input type="date" name="copCellPhoneStart" placeholder = "mm/dd/yyyy">
			</div>
			<div style="width: 40%;" class="lfloat">
				End Date: <input type="date" name="copCellPhoneEnd" placeholder = "mm/dd/yyyy">
			</div>
			<div style="width: 30%;" class="lfloat">
				
			</div>
			<div class="cleardivbreak">
			</div>
			<div style="width: 100%; margin-bottom: 5px;" class="lfloat text-center">
				<select name = "copCellPhoneAmount">
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
			<div style="width: 96%; padding-top: 10px; margin-bottom: 10px; margin-left: 2%; margin-right: 2%;" class="bottomborder">
				<input type="text" name="copOther" style="width: 700px;">
			</div>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 12%;" class="text-bold lfloat">
			&nbsp; &nbsp;Supervisor&nbsp;
		</div>
		<div style="width: 58%;" class="bottomborder lfloat">
			<select name = "copSupervisor">
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
			<input type="date" name="copDateSubmitted" style="width: 100px;" placeholder = "mm/dd/yyyy">
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="/BRMH/bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="/BRMH/bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</body>