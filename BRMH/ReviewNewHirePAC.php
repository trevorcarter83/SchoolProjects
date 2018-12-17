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
		//echo "Connection Failed: " . $e->getMessage();
	}

	$form_ID = (string)$_GET['ID'];
	$form_query = "SELECT NewHireFormID,NH.StaffID,ClinicalSupervisor,LocationID,NoComputerAccess,DrivingCenterVehicles,BenefitsEligible,CellPhoneStartDate,CellPhoneAmount,OtherConsiderations, TRIM(ST.FirstName) + ' ' + TRIM(ST.LastName) AS SupervisorName ,FormSubmissionDate,HRDateProcessed,HRAdminSupervisorID,HRExperienceGiven,HRNotifiedAppropriateStaff,HRAddedToWorkerFiles,HRBenefits,HRAddedToNewLeaveSystem,HRPayrollCardDrafted,HRCostCenterAdded,HRNewJobDescription,HRAPNotifiedOfCellPhoneReimbursement,HRBeginReceivingStaffDevelopment,HRAddedToReliasLearning,HRHourlyWage,HRMonthly,HRYearly,HRStipendType,HRStipendHourly,HRStipendMonthly,HRStipendYearly,HRInsuranceStipendMonthly,Replacing,EmployeeName,SupervisorApproved,HRApproved ,P.PositionName, StartDate, FTE FROM NewHireForm AS NH LEFT JOIN Position AS P ON P.PositionID = NH.PositionID JOIN Supervisor AS S ON NH.SupervisorID = S.SupervisorID JOIN Staff AS ST ON ST.StaffId = S.EmployeeID WHERE NewHireFormID =" .$form_ID;

	$result = $dbconnect->query($form_query);
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$data = $dbconnect->query($form_query);
	$form_Arr = $data->fetchALL(PDO::FETCH_ASSOC);

	// This is when submit is clicked it will enter it into the database.
	if(isset($_POST['submit']))
	{
		//$nhName = $_POST['nhName'];
		//$nhStartDate = $_POST['nhStartDate'];
		//$nhTitle = $_POST['nhTitle'];
		//$nhClinicalSupervisor = $_POST['nhClinicalSupervisor'];
		//$nhReplacing = $_POST['nhReplacing'];
		//$nhLocationID = $_POST['nhLocationID'];
		//$nhComputerAccessLookup = $_POST['nhComputerAccessLookup'];
		//$nhDCVLookup = $_POST['nhDCVLookup'];
		//$nhBenefitsLookup = $_POST['nhBenefitsLookup'];
		//$nhOther = $_POST['nhOther'];
		//$nhCellPhone = $_POST['nhCellPhone'];
		//$nhCellPhoneLookup = $_POST['nhCellPhoneLookup'];
		//$nhSupervisor = $_POST['nhSupervisor'];
		//$nhDateSubmitted = $_POST['nhDateSubmitted'];
		$nhProcessDate = $_POST['nhProcessDate'];
		$nhEmpNum = $_POST['nhEmpNum'];
		$nhAdminSupervisor = $_POST['nhAdminSupervisor'];
		$nhExperience = $_POST['nhExperience'];
		$nhHourly = $_POST['nhHourly'];
		$nhMonthly = $_POST['nhMonthly'];
		$nhYearly = $_POST['nhYearly'];
		$nhStipendType = $_POST['nhStipendType'];
		$nhStipendHourly = $_POST['nhStipendHourly'];
		$nhStipendMonthly = $_POST['nhStipendMonthly'];
		$nhStipendYearly = $_POST['nhStipendYearly'];
		$nhInsuranceStipendHourly = $_POST['nhInsuranceStipendHourly'];
		$HR1 = $_POST['HR1'];
		$HR2 = $_POST['HR2'];
		$HR3 = $_POST['HR3'];
		$HR4 = $_POST['HR4'];
		$HR5 = $_POST['HR5'];
		$HR6 = $_POST['HR6'];
		$HR7 = $_POST['HR7'];
		$HR8 = $_POST['HR8'];
		$HR9 = $_POST['HR9'];
		$HR10 = $_POST['HR10'];
		$nhApprove = $_POST['nhApprove'];


		$statement = $dbconnect->prepare("UPDATE NewHireForm SET HRDateProcessed = :nhProcessDate, HRAdminSupervisorID = :nhAdminSupervisor, HRExperienceGiven =  :nhExperience, HRHourlyWage = :nhHourly, HRMonthly = :nhMonthly, HRYearly = :nhYearly, HRStipendType = :nhStipendType, HRStipendHourly = :nhStipendHourly, HRStipendMonthly = :nhStipendMonthly, HRStipendYearly = :nhStipendYearly, HRInsuranceStipendMonthly = :nhInsuranceStipendHourly, HRNotifiedAppropriateStaff =  :HR1, HRAddedToWorkerFiles =  :HR2, HRBenefits = :HR3, HRAddedToNewLeaveSystem = :HR4, HRPayrollCardDrafted = :HR5, HRCostCenterAdded = :HR6, HRNewJobDescription = :HR7, HRAPNotifiedOfCellPhoneReimbursement = :HR8, HRBeginReceivingStaffDevelopment = :HR9, HRAddedToReliasLearning = :HR10, HRApproved = :nhApprove WHERE NewHireFormID = $form_ID;");

		//$statement->bindParam(':nhName', $nhName);
		//$statement->bindParam(':nhStartDate', $nhStartDate);
		//$statement->bindParam(':nhClinicalSupervisor', $nhClinicalSupervisor);
		//$statement->bindParam(':nhReplacing', $nhReplacing);
		//$statement->bindParam(':nhLocationID', $nhLocationID);
		//$statement->bindParam(':nhComputerAccessLookup', $nhComputerAccessLookup);
		//$statement->bindParam(':nhDCVLookup', $nhDCVLookup);
		//$statement->bindParam(':nhBenefitsLookup', $nhBenefitsLookup);
		//$statement->bindParam(':nhOther', $nhOther);
		//$statement->bindParam(':nhCellPhone', $nhCellPhone);
		//$statement->bindParam(':nhCellPhoneLookup', $nhCellPhoneLookup);
		//$statement->bindParam(':nhSupervisor', $nhSupervisor);
		//$statement->bindParam(':nhDateSubmitted', $nhDateSubmitted);
		$statement->bindParam(':nhProcessDate', $nhProcessDate);
		$statement->bindParam(':nhAdminSupervisor', $nhAdminSupervisor);
		$statement->bindParam(':nhExperience', $nhExperience);
		$statement->bindParam(':nhHourly', $nhHourly);
		$statement->bindParam(':nhMonthly', $nhMonthly);
		$statement->bindParam(':nhYearly', $nhYearly);
		$statement->bindParam(':nhStipendType', $nhStipendType);
		$statement->bindParam(':nhStipendHourly', $nhStipendHourly);
		$statement->bindParam(':nhStipendMonthly', $nhStipendMonthly);
		$statement->bindParam(':nhStipendYearly', $nhStipendYearly);
		$statement->bindParam(':nhInsuranceStipendHourly', $nhInsuranceStipendHourly);
		$statement->bindParam(':HR1', $HR1);
		$statement->bindParam(':HR2', $HR2);
		$statement->bindParam(':HR3', $HR3);
		$statement->bindParam(':HR4', $HR4);
		$statement->bindParam(':HR5', $HR5);
		$statement->bindParam(':HR6', $HR6);
		$statement->bindParam(':HR7', $HR7);
		$statement->bindParam(':HR8', $HR8);
		$statement->bindParam(':HR9', $HR9);
		$statement->bindParam(':HR10', $HR10);
		$statement->bindParam(':nhApprove', $nhApprove);

		$statement->execute();
		$success = true;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<link href="../forms.css" rel="stylesheet">
    <link href="../forms.css" rel="stylesheet">
	<title>Review New Hire</title>
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
	<form method="post" action="ReviewNewHirePAC.php?ID=<?php echo $form_ID ?>">
		<div style="height:75px">
		</div>
		<div style="width: 100%;" class="text-center text-bold border-medium f18">
			New Hire Personnel Action Order
		</div>
		<div class="divbreak">
		</div>
		<div style="width: 30%;" class="lfloat bottomborder">
			Name: <input type="text" name="nhName" value = "<?php echo $form_Arr['0']['EmployeeName']; ?>" disabled>
		</div>
		<div style="width: 31%;" class="lfloat bottomborder">
			Start Date: <input type="date" name="nhStartDate" value = "<?php echo $form_Arr['0']['StartDate']; ?>" disabled>
		</div>

		<div style="width: 39%;" class="lfloat">
			&nbsp;Title: <input type="Text" name="nhTitle" value = "<?php echo $form_Arr['0']['PositionName']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			FTE %: <input type="text" name="nhFTE" style="width: 50px;" value = "<?php echo $form_Arr['0']['FTE']; ?>" disabled>
		</div>
		<div style="width: 75%;" class="lfloat bottomborder">
			Replacing: <input type="text" name="nhReplacing" value = "<?php echo $form_Arr['0']['Replacing']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 60%;" class="lfloat bottomborder">
			Clinical Supervisor (If not licensed): <input type="text" name="nhClinicalSupervisor" value = "<?php echo $form_Arr['0']['ClinicalSupervisor']; ?>" disabled>
		</div>
		<div style="width: 40%;" class="lfloat bottomborder">
			Facility/Office Location:
			<select name = "nhLocationID">
			<?php 
					if ($form_Arr['0']['LocationID'] == 1){
					echo '<option value = "1">LOP</option>';
					} else if ($form_Arr['0']['LocationID'] == 2){
					echo '<option value = "2">BOP</option>';
					} else if ($form_Arr['0']['LocationID'] == 3){
					echo '<option value = "3">TOP</option>';
					} else if ($form_Arr['0']['LocationID'] == 4){
					echo '<option value = "4">BRH</option>';
					} else if ($form_Arr['0']['LocationID'] == 5){
					echo '<option value = "5">BCH</option>';
					} else if ($form_Arr['0']['LocationID'] == 6){
					echo '<option value = "6">RES</option>';
					} ?>
			</select>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 36%;" class="lfloat bottomborder">
			<input type="checkbox" name="nhComputerAccess" <?php if($form_Arr['0']['NoComputerAccess'] == 1){echo 'checked';} ?> disabled> NO Computer Access
			<select name = "nhComputerAccessLookup">
			<?php 
					if ($form_Arr['0']['NoComputerAccess'] == 1){
					echo '<option value = "1">Y</option>';
					} else if ($form_Arr['0']['NoComputerAccess'] == 0){
					echo '<option value = "0">NA</option>'; 
					}
			?>
			</select>
		</div>
		<div style="width: 34%;" class="lfloat bottomborder text-center">
			<input type="checkbox" name="nhDCV" <?php if($form_Arr['0']['DrivingCenterVehicles'] == 1){echo 'checked';} ?> disabled> Driving Center Vehicles
			<select name = "nhDCVLookup">
			<?php 
					if ($form_Arr['0']['DrivingCenterVehicles'] == 1){
					echo '<option value = "1">Y</option>';
					} else if ($form_Arr['0']['DrivingCenterVehicles'] == 0){
					echo '<option value = "0">NA</option>'; 
					}
			?>
			</select>
		</div>
		<div style="width: 30%;" class="lfloat bottomborder text-center">
			<input type="checkbox" name="nhBenefits" <?php if($form_Arr['0']['BenefitsEligible'] == 1){echo 'checked';} ?> disabled> Benefits Eligible
			<select name = "nhBenefitsLookup">
			<?php 
					if ($form_Arr['0']['BenefitsEligible'] == 1){
					echo '<option value = "1">Y</option>';
					} else if ($form_Arr['0']['Benefits'] == 0){
					echo '<option value = "0">NA</option>'; 
					}
			?>
			</select>

		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 100%;" class="border-medium lfloat">
			<div style="width: 35%;" class="lfloat">
				<span class="text-bold text-underline">Cell phone reimbursement</span> - Start Date
			</div>
			<div style="width: 20%;" class="lfloat bottomborder">
				<input type="text" name="nhCellPhone" value = "<?php echo $form_Arr['0']['CellPhoneStartDate']; ?>" disabled>
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
			<div style="width: 96%; padding-top: 10px; margin-bottom: 10px; margin-left: 2%; margin-right: 2%;" class="bottomborder">
			<input type="text" name="nhOther" style="width: 700px;" value = "<?php echo $form_Arr['0']['OtherConsiderations']; ?>" disabled>
		</div>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 12%;" class="text-bold lfloat">
			&nbsp; &nbsp;Supervisor&nbsp;
		</div>
		<div style="width: 58%;" class="bottomborder lfloat">
			<input type="text" name = "nhSupervisor" value = "<?php echo $form_Arr['0']['SupervisorName']; ?>" disabled>
		</div>
		<div style="width: 15%;" class="text-bold lfloat">
			Date Submitted
		</div>
		<div style="width: 15%;" class="bottomborder lfloat">
			<input type="text" name="nhDateSubmitted" style="width: 100px;" value = "<?php echo $form_Arr['0']['FormSubmissionDate']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
	<div style="width: 740px; padding: 5px;" class="border-thin lfloat">
		<div style="width: 75%;" class="lfloat text-bold text-underline f16">
			FOR H/R USE ONLY:
		</div>
		<div style="width: 25%;" class="lfloat">
			<span class="text-bold">EMPLOYEE #</span> <span class="text-underline"><input type="text" name="nhEmpNum" style="width: 50px;"></span>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 20%;" class="lfloat text-bold text-italic">
			Date Processed?
		</div>
		<div style="width: 30%;" class="lfloat bottomborder">
			<input type="text" name="nhProcessDate" style="width: 75px;">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 20%;" class="lfloat text-bold text-italic">
			Admin Supervisor
		</div>
		<div style="width: 30%;" class="lfloat bottomborder">
			<select name = "nhAdminSupervisor">
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
		<div style="width: 20%;" class="lfloat text-right text-bold text-italic">
			Experience Given:&nbsp;
		</div>
		<div style="width: 15%;" class="lfloat bottomborder text-center">
			<input type="text" name="nhExperience" style="width: 75px;" >
		</div>
		<div style="width: 5%;" class="lfloat text-italic">
			(Years)
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 25%;" class="lfloat text-bold text-italic">
			Change of Wage/Salary
		</div>
		<div style="width: 7%;" class="lfloat text-italic text-right">
			Hourly&nbsp;
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input type="text" name="nhHourly" style="width: 75px;" >
		</div>
		<div style="width: 7%;" class="lfloat text-italic text-right">
			Monthly&nbsp;
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input type="text" name="nhMonthly" style="width: 75px;">
		</div>
		<div style="width: 7%;" class="lfloat text-italic text-right">
			Yearly&nbsp;
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input type="text" name="nhYearly" style="width: 75px;">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 8%;" class="lfloat text-bold text-italic">
			Stipend
		</div>
		<div style="width: 6%;" class="lfloat text-italic text-right">
			Type:&nbsp;
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input type="text" name="nhStipendType" style="width: 75px;">
		</div>
		<div style="width: 7%;" class="lfloat text-italic text-right">
			Hourly&nbsp;
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input type="text" name="nhStipendHourly" style="width: 75px;">
		</div>
		<div style="width: 7%;" class="lfloat text-italic text-right">
			Monthly&nbsp;
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input type="text" name="nhStipendMonthly" style="width: 75px;">
		</div>
		<div style="width: 7%;" class="lfloat text-italic text-right">
			Yearly&nbsp;
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input type="text" name="nhStipendYearly" style="width: 75px;">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 20%;" class="lfloat text-bold text-italic">
			Insurance Stipend
		</div>
		<div style="width: 7%;" class="lfloat text-italic text-right">
			Hourly&nbsp;
		</div>
		<div style="width: 20%;" class="lfloat bottomborder">
			<input type="text" name="nhInsuranceStipendHourly" style="width: 75px;">
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 25%; line-height: 18px;" class="lfloat f12">
			Notified: Appropriate Staff
			<br>
			Added to Worker Files
			<br>
			Benefits
			<br>
			Added to New Leave System
			<br>
			Payroll Card Drafted
		</div>
		<div style="width: 5%;" class="lfloat text-underline f12">
			<select name = "HR1">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
			<br>
			<select name = "HR2">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
			<br>
			<select name = "HR3">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
			<br>
			<select name = "HR4">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
			<br>
			<select name = "HR5">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
		</div>
		<div style="width: 5%;" class="lfloat">
			&nbsp;
		</div>
		<div style="width: 35%; line-height: 18px;" class="lfloat f12">
			Cost Center Added
			<br>
			Job Description
			<br>
			A/P Notified of Cell Phone Reimbursement
			<br>
			Begin receiving Staff Development
			<br>
			Added to Relias Learning
		</div>
		<div style="width: 5%;" class="lfloat text-underline f12">
			<select name = "HR6">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
			<br>
			<select name = "HR7">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
			<br>
			<select name = "HR8">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
			<br>
			<select name = "HR9">
				<option value = "1">Y</option>
				<option value = "0">NA</option>
			</select>
			<br>
			<select name = "HR10">
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
			<select name = "nhApprove">
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
		location.href = "/BRMH/form_review.php";
	}
</script>
