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
	$form_query = "SELECT ChangeOfPositionFormID, C.StaffID, FormTimestamp, FTEChange, p.PositionName AS PositionChange, ReceivedClinicalLicense,FTEChangeNew, p2.PositionName AS PositionChangeNew,PositionChangeReplacing,PositionChangeClinicalSupervisor,ClinicalLicenseEffectiveDate,CellPhoneStartDate,CellPhoneEndDate,CellPhoneAmount,OtherConsiderations, TRIM(E.FirstName) + ' ' + TRIM(E.LastName) AS SupervisorName ,HRExperienceGiven,HRNotifiedAppropriateStaff,HRAddedToWorkerFiles,HRBenefits,HRAddedToNewLeaveSystem,HRPayrollCardDrafted,HRCostCenterAdded,HRNewJobDescription,HRAPNotifiedOfCellPhoneReimbursement,HRBeginReceivingStaffDevelopment,HRHourlyWage,HRMonthly,HRYearly,HRStipendType,HRStipendHourly,HRStipendMonthly,HRStipendYearly,HRInsuranceStipendMonthly,EmployeeName,SupervisorApproved,HRApproved, EffectiveDate FROM ChangeOfPositionForm AS C JOIN Position AS P ON C.PositionChange = P.PositionID JOIN Position AS P2 ON C.PositionChangeNew = p2.PositionID JOIN Supervisor AS S ON S.SupervisorID = C.SupervisorID JOIN Staff AS E ON S.EmployeeID = E.StaffId WHERE ChangeOfPositionFormID = " . $form_ID;

	$result = $dbconnect->query($form_query);
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$data = $dbconnect->query($form_query);
	$form_Arr = $data->fetchALL(PDO::FETCH_ASSOC);


	// This is when submit is clicked it will enter it into the database.
	if(isset($_POST['submit']))
	{
		//$copEmployeeNum = $_POST['copEmployeeNum'];
		//$copEmployeeName = $_POST['copEmployeeName'];
		// $copEffectiveDate = $_POST['copEffectiveDate'];
		// $copFTEChange = $_POST['copFTEChange'];
		// $copFTEChangeNew = $_POST['copFTEChangeNew'];
		// $copNewPosition = $_POST['copNewPosition'];
		// $copOldPosition = $_POST['copOldPosition'];
		// $copReplacing = $_POST['copReplacing'];
		// $copClinicalSupervisor = $_POST['copClinicalSupervisor'];
		// $copClinicalLicenseDate = $_POST['copClinicalLicenseDate'];
		// $copCellPhone = $_POST['copCellPhone'];
		// $copCellPhoneAmount = $_POST['copCellPhoneAmount'];
		// $copOther = $_POST['copOther'];
		// $copSupervisor = $_POST['copSupervisor'];
		$copExperience = $_POST['copExperience'];
		//$copDateSubmitted = $_POST['copDateSubmitted'];
		//$copEmpNum = $_POST['copEmpNum'];
		//$copProcessDate = $_POST['copProcessDate'];
		//$copAdminSupervisor = $_POST['copAdminSupervisor'];
		$copHourly = $_POST['copHourly'];
		$copMonthly = $_POST['copMonthly'];
		$copYearly = $_POST['copYearly'];
		$copStipendType = $_POST['copStipendType'];
		$copStipendHourly = $_POST['copStipendHourly'];
		$copStipendMonthly = $_POST['copStipendMonthly'];
		$copStipendYearly = $_POST['copStipendYearly'];
		$copInsuranceStipendHourly = $_POST['copInsuranceStipendHourly'];
		$copHR1 = $_POST['copHR1'];
		$copHR2 = $_POST['copHR2'];
		$copHR3 = $_POST['copHR3'];
		$copHR4 = $_POST['copHR4'];
		$copHR5 = $_POST['copHR5'];
		$copHR6 = $_POST['copHR6'];
		$copHR7 = $_POST['copHR7'];
		$copHR8 = $_POST['copHR8'];
		$copHR9 = $_POST['copHR9'];
		$copApprove = $_POST['copApprove'];



		$statement = $dbconnect->prepare("UPDATE ChangeOfPositionForm SET HRExperienceGiven = :copExperience, HRNotifiedAppropriateStaff = :copHR1, HRAddedToWorkerFiles = :copHR2, HRBenefits  = :copHR3, HRAddedToNewLeaveSystem  = :copHR4, HRPayrollCardDrafted  = :copHR5, HRCostCenterAdded  = :copHR6, HRNewJobDescription = :copHR7, HRAPNotifiedOfCellPhoneReimbursement  = :copHR8, HRBeginReceivingStaffDevelopment = :copHR9, HRHourlyWage = :copHourly, HRMonthly = :copMonthly, HRYearly = :copYearly, HRStipendType = :copStipendType, HRStipendHourly = :copStipendHourly, HRStipendMonthly = :copStipendMonthly, HRStipendYearly = :copStipendYearly, HRInsuranceStipendMonthly = :copInsuranceStipendHourly, HRApproved = :copApprove WHERE ChangeOfPositionFormID = $form_ID;");

		//$statement->bindParam(':copEmployeeNum', $copEmployeeNum);
		//$statement->bindParam(':copEmployeeName', $copEmployeeName);
		//$statement->bindParam(':copEffectiveDate', $copEffectiveDate);
		//$statement->bindParam(':copFTEChange', $copFTEChange);
		//$statement->bindParam(':copFTEChangeNew', $copFTEChangeNew);
		//$statement->bindParam(':copReplacing', $copReplacing);
		//$statement->bindParam(':copNewPosition', $copNewPosition);
		//$statement->bindParam(':copOldPosition', $copOldPosition);
		//$statement->bindParam(':copClinicalSupervisor', $copClinicalSupervisor);
		//$statement->bindParam(':copClinicalLicenseDate', $copClinicalLicenseDate);
		//$statement->bindParam(':copCellPhone', $copCellPhone);
		//$statement->bindParam(':copCellPhoneAmount', $copCellPhoneAmount);
		//$statement->bindParam(':copOther', $copOther);
		//$statement->bindParam(':copSupervisor', $copSupervisor);
		$statement->bindParam(':copExperience', $copExperience);
		//$statement->bindParam(':copDateSubmitted', $copDateSubmitted);
		//$statement->bindParam(':copEmpNum', $copEmpNum);
		//$statement->bindParam(':copProcessDate', $copProcessDate);
		//$statement->bindParam(':copAdminSupervisor', $copAdminSupervisor);
		$statement->bindParam(':copHourly', $copHourly);
		$statement->bindParam(':copMonthly', $copMonthly);
		$statement->bindParam(':copYearly', $copYearly);
		$statement->bindParam(':copStipendType', $copStipendType);
		$statement->bindParam(':copStipendHourly', $copStipendHourly);
		$statement->bindParam(':copStipendMonthly', $copStipendMonthly);
		$statement->bindParam(':copStipendYearly', $copStipendYearly);
		$statement->bindParam(':copInsuranceStipendHourly', $copInsuranceStipendHourly);
		$statement->bindParam(':copHR1', $copHR1);
		$statement->bindParam(':copHR2', $copHR2);
		$statement->bindParam(':copHR3', $copHR3);
		$statement->bindParam(':copHR4', $copHR4);
		$statement->bindParam(':copHR5', $copHR5);
		$statement->bindParam(':copHR6', $copHR6);
		$statement->bindParam(':copHR7', $copHR7);
		$statement->bindParam(':copHR8', $copHR8);
		$statement->bindParam(':copHR9', $copHR9);
		$statement->bindParam(':copApprove', $copApprove);
		

		$statement->execute();
		$success = true;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link href="../forms.css" rel="stylesheet">
    <link href="../forms.css" rel="stylesheet">
	<title>Review Change of Position</title>
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
	<form method = "POST" action = "ReviewChangeOfPosition.php?ID=<?php echo $form_ID ?>">
		<div style='height:75px'>
		</div>
		<div style="width: 100%;" class="text-center text-bold border-medium f18">
			Change of Position/FTE/Salary - Personnel Action Order
		</div>
		<div class="divbreak">
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			Employee # <input type = "text" name = "copEmployeeNum" style="width: 50px;" value = "<?php echo (string)$form_Arr['0']['StaffID']; ?>" disabled>
		</div>
		<div style="width: 45%;" class="lfloat bottomborder">
			Employee Name: <input type = "text" name = "copEmployeeName" value = "<?php echo (string)$form_Arr['0']['EmployeeName']; ?>" disabled>
		</div>
		<div style="width: 30%;" class="lfloat bottomborder">
			Effective Date: <input style="width: 125px;" type="text" name="copEffectiveDate" value="1/1/2000" value = "<?php echo (string)$form_Arr['0']['EffectiveDate']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 20%;" class="lfloat">
			<input type="checkbox" name="copFTEChange" value="FTE Change" <?php if($form_Arr['0']['FTEChangeNew'] < 0){echo 'checked';} ?> disabled> FTE Change? From
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input style="width: 50px;" type="number" name="copFTEChange" min="0" max="100" value = "<?php echo (string)$form_Arr['0']['FullTimeEquivalentPercentage']; ?>" disabled>
		</div>
		<div style="width: 5%;" class="lfloat">
			% to
		</div>
		<div style="width: 15%;" class="lfloat bottomborder">
			<input style="width: 50px;" type="number" name="copFTEChangeNew" min="0" max="100" value = "<?php echo (string)$form_Arr['0']['FTEChangeNew']; ?>" disabled>
		</div>
		<div style="width: 2%;" class="lfloat">
			%
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 30%;" class="lfloat">
			<input type="checkbox" name="copPositionChange" value="New Position" <?php if($form_Arr['0']['PositionChange'] != 'N/A' && $form_Arr['0']['PositionChangeNew'] != 'N/A'){echo 'checked';} ?> disabled> Position Change? New position
		</div>
		<div style="width: 30%;" class="lfloat bottomborder">
			<input type = "text" name = "copNewPosition" value = "<?php echo (string)$form_Arr['0']['PositionChangeNew']; ?>" disabled>
		</div>
		<div style="width: 15%;" class="lfloat">
			Old Position
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			<input type = "text" name = "copOldPosition" value = "<?php echo (string)$form_Arr['0']['PositionChange']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 27%;" class="lfloat">
			Who is the person replacing?
		</div>
		<div style="width: 35%;" class="lfloat bottomborder">
			<input style="width: 125px;" type="text" name="copReplacing" value = "<?php echo (string)$form_Arr['0']['PositionChangeReplacing']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="padding-left: 5%; width: 55%;" class="lfloat">
			If clinical, but not licensed independently, clinical supervisor is?
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			<input style="width: 125px;" type="text" name="copClinicalSupervisor" value = "<?php echo (string)$form_Arr['0']['PositionChangeClinicalSupervisor']; ?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 47%;" class="lfloat">
			<input type="checkbox" name="copClinicalLicenseED" value="New Position" <?php if($form_Arr['0']['ClinicalLicenseEffectiveDate'] != '1900-01-01'){echo 'checked';} ?> disabled> Received a clinical license? Effective date?
		</div>
		<div style="width: 25%;" class="lfloat bottomborder">
			<?php
				if($form_Arr['0']['ClinicalLicenseEffectiveDate'] == '1900-01-01'){
					$val = '';
				} 
				else {
					$val = $form_Arr['0']['ClinicalLicenseEffectiveDate'];
				} 
			?>
			<input style="width: 125px;" type="text" name="copClinicalLicenseDate"  value = '<?php echo $val?>' disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 100%;" class="border-medium lfloat">
			<div style="width: 35%;" class="lfloat">
				<span class="text-bold text-underline">Cell phone reimbursement</span> - Start Date
			</div>
			<div style="width: 20%;" class="lfloat bottomborder">
				<input type="text" name="copCellPhone" value = "<?php echo (string)$form_Arr['0']['CellPhoneStartDate']; ?>" disabled>
			</div>
			<div class="cleardivbreak">
			</div>
			<div style="width: 100%; margin-bottom: 5px;" class="lfloat text-center">
				<select name = "copCellPhoneAmount">
					<?php 
						if ($form_Arr['0']['CellPhoneAmount'] == 45){
							echo '	';
						} else if ($form_Arr['0']['CellPhoneAmount'] == 20){
							echo '<option value = "20">$20 (Employees under 50% FTE)</option>';
						} else {
							echo '<option value = "26">$26 (Nurses)</option>';
						}	?>
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
				<input type="text" name="copOther" style="width: 700px;"  value = "<?php echo (string)$form_Arr['0']['OtherConsiderations']; ?>" disabled>
			</div>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 12%;" class="text-bold lfloat">
			&nbsp; &nbsp;Supervisor&nbsp;
		</div>
		<div style="width: 38%;" class="bottomborder lfloat">
			<input type = "text" name="copSupervisor" value = "<?php echo (string)$form_Arr['0']['SupervisorName']?>" disabled>
		</div>
		<div style="width: 15%;" class="text-bold lfloat">
			Date Submitted
		</div>
		<div style="width: 35%;" class="bottomborder lfloat">
			<input type="text" name="copDateSubmitted" style="width: 200px;" value = "<?php echo (string)$form_Arr['0']['FormTimestamp']?>" disabled>
		</div>
		<div class="cleardivbreak">
		</div>
		<div style="width: 740px; padding: 5px;" class="border-thin lfloat">
			<div style="width: 75%;" class="lfloat text-bold text-underline f16">
				FOR H/R USE ONLY:
			</div>
			<div class="cleardivbreak">
			</div>
			<div style="width: 20%;" class="lfloat text-left text-bold text-italic">
				Experience Given:&nbsp;
			</div>
			<div style="width: 15%;" class="lfloat bottomborder text-center">
				<input type="text" name="copExperience" style="width: 75px;	" required>
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
				<input type="text" name="copHourly" style="width: 75px;" value = "<?php echo (string)$form_Arr['0']['HRHourlyWage']; ?>" required>
			</div>
			<div style="width: 7%;" class="lfloat text-italic text-right">
				Monthly&nbsp;
			</div>
			<div style="width: 15%;" class="lfloat bottomborder">
				<input type="text" name="copMonthly" style="width: 75px;" value = "<?php echo (string)$form_Arr['0']['HRMonthly']; ?>" required>
			</div>
			<div style="width: 7%;" class="lfloat text-italic text-right">
				Yearly&nbsp;
			</div>
			<div style="width: 15%;" class="lfloat bottomborder">
				<input type="text" name="copYearly" style="width: 75px;" value = "<?php echo (string)$form_Arr['0']['HRYearly']; ?>" required>
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
				<input type="text" name="copStipendType" style="width: 75px;" value = "<?php echo (string)$form_Arr['0']['HRStipendType']; ?>" required>
			</div>
			<div style="width: 7%;" class="lfloat text-italic text-right">
				Hourly&nbsp;
			</div>
			<div style="width: 15%;" class="lfloat bottomborder">
				<input type="text" name="copStipendHourly" style="width: 75px;" value = "<?php echo (string)$form_Arr['0']['HRStipendHourly']; ?>" required>
			</div>
			<div style="width: 7%;" class="lfloat text-italic text-right">
				Monthly&nbsp;
			</div>
			<div style="width: 15%;" class="lfloat bottomborder">
				<input type="text" name="copStipendMonthly" style="width: 75px;" value = "<?php echo (string)$form_Arr['0']['HRStipendMonthly']; ?>" required>
			</div>
			<div style="width: 7%;" class="lfloat text-italic text-right">
				Yearly&nbsp;
			</div>
			<div style="width: 15%;" class="lfloat bottomborder">
				<input type="text" name="copStipendYearly" style="width: 75px;" value = "<?php echo (string)$form_Arr['0']['HRStipendYearly']; ?>" required>
			</div>
			<div class="cleardivbreak">
			</div>
			<div style="width: 20%;" class="lfloat text-bold text-italic">
				Insurance Stipend
			</div>
			<div style="width: 7%;" class="lfloat text-italic text-right">
				Monthly&nbsp;
			</div>
			<div style="width: 20%;" class="lfloat bottomborder">
				<input type="text" name="copInsuranceStipendHourly" style="width: 75px;" value = "<?php echo (string)$form_Arr['0']['HRInsuranceStipendMonthly']; ?>" required>
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
				<select name = "copHR1">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "copHR2">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "copHR3">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "copHR4">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "copHR5">
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
			</div>
			<div style="width: 5%;" class="lfloat text-underline f12">
				<select name = "copHR6">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "copHR7">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "copHR8">
					<option value = "1">Y</option>
					<option value = "0">NA</option>
				</select>
				<br>
				<select name = "copHR9">
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
			<select name = "copApprove">
				<option value = "1">Approved</option>
				<option value = "0">Denied</option>
		</div>
		<div class= "wrapper">
			<input type="submit" name="submit"></input>
		</div>
	</form>
</div>
<script>
	var success = <?php echo $success; ?>;
	if (success){
		alert ("Successfully submitted");
		location.href = "/BRMH/form_review.php";
	}
</script>
