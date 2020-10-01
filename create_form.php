<?php 
  /**
   * Khaleb O'Brien (Weird_Coder)
   * ebukauche52@gmail.com
   * https://khaleb.dev
   * Wed, 30th September, 2020
  */
    @session_start();
    $_SESSION['CSRF'] = "safka8g97afghauJHghKH"; // This should be be generated dynamically
    $msg = "";

    require_once "processor.php";

    if ((isset($_POST['csrf'])) && ($_POST['csrf'] === $_SESSION['CSRF'])) {
        // $formSetting[] because I love arrays :-)
        // perform backend validation for form feilds.
        $formSetting['title'] = htmlentities(trim($_POST['formTitle']), ENT_QUOTES, 'UTF-8');
        $formSetting['firstname'] = htmlentities(trim($_POST['chkFirstName']), ENT_QUOTES, 'UTF-8');
        $formSetting['middlename'] = htmlentities(trim($_POST['chkMiddleName']), ENT_QUOTES, 'UTF-8');
        $formSetting['lastname'] = htmlentities(trim($_POST['chkLastName']), ENT_QUOTES, 'UTF-8');
        $formSetting['gender'] = htmlentities(trim($_POST['chkGender']), ENT_QUOTES, 'UTF-8');
        $formSetting['dob'] = htmlentities(trim($_POST['chkDoB']), ENT_QUOTES, 'UTF-8');
        $formSetting['address'] = htmlentities(trim($_POST['chkAddress']), ENT_QUOTES, 'UTF-8');
        $formSetting['liDis'] = htmlentities(trim($_POST['chkLiDis']), ENT_QUOTES, 'UTF-8');

        // create a new instance of the 'manager' class.
        $processManager = new Manager(); // This class is found in processor.php
        $msg = $processManager->createForm($formSetting); // send the validated form data to "createForm" method in 'manager' class.
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create A Form</title>
</head>
<body>
	<form method="POST" action="">
        <span>Form Title : </span>
        <input type="text" name="formTitle" placeholder="Set a title for your form." style="width: 35em;" required="required">
        <p>Select the fields which will be presented to the User upon registration</p>
		<!-- First name -->
		<input type="hidden" name="chkFirstName" value="0">
        <input type="checkbox" name="chkFirstName" value="1">
        <span>First name</span>
        <br><br>

		<!-- Middle name -->
		<input type="hidden" name="chkMiddleName" value="0">
        <input type="checkbox" name="chkMiddleName" value="1">
        <span>Middle name</span>
        <br><br>

		<!-- Last name -->
		<input type="hidden" name="chkLastName" value="0">
        <input type="checkbox" name="chkLastName" value="1">
        <span>Last name</span>
        <br><br>

		<!-- gender -->
        <input type="hidden" name="chkGender" value="0">
        <input type="checkbox" name="chkGender" value="1">
        <span>Gender</span>
        <br><br>

        <!-- Date of Birth -->
        <input type="hidden" name="chkDoB" value="0">
        <input type="checkbox" name="chkDoB" value="1">
        <span>Date of Birth</span>
        <br><br>

        <!-- address -->
        <input type="hidden" name="chkAddress" value="0">
        <input type="checkbox" name="chkAddress" value="1">
        <span>Address</span>
        <br><br>

        <!-- Likes and Dislikes -->
        <input type="hidden" name="chkLiDis" value="0">
        <input type="checkbox" name="chkLiDis" value="1">
        <span>Likes and Dislikes</span>
        <br><br>

        <!-- CSRF -->
        <input type="hidden" name="csrf" value="<?=$_SESSION['CSRF']?>">

        <!-- Submit button -->
        <button type="submit" name="btnCreate" value="Create">Create</button>
	</form>

    <br><br><p><?= $msg ?></p>
</body>
</html>