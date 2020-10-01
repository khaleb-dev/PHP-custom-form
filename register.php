<!DOCTYPE html>
<html>
<head>
	<title>Create A Form</title>
</head>
<body>
	<form method="POST" action="">
		<!-- First name -->
		<input type="hidden" name="ckFirstName" value="0">
        <input type="checkbox" name="ckFirstName" value="1">

		<!-- Middle name -->
		<input type="hidden" name="ckMiddleName" value="0">
        <input type="checkbox" name="ckMiddleName" value="1">

		<!-- Last name -->
		<input type="hidden" name="ckLastName" value="0">
        <input type="checkbox" name="ckLastName" value="1">

		<!-- gender -->
        <input type="hidden" name="chkGender" value="0">
        <input type="checkbox" name="chkGender" value="1">

        <!-- Date of Birth -->
        <input type="hidden" name="chkDoB" value="0">
        <input type="checkbox" name="chkDoB" value="1">

        <!-- address -->
        <input type="hidden" name="chkAddress" value="0">
        <input type="checkbox" name="chkAddress" value="1">

        <!-- Likes and Dislikes -->
        <input type="hidden" name="chkLiDis" value="0">
        <input type="checkbox" name="chkLiDis" value="1">
	</form>
</body>
</html>