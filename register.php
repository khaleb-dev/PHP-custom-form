<?php 
  /**
   * Khaleb O'Brien (Weird_Coder)
   * ebukauche52@gmail.com
   * https://khaleb.dev
   * Wed, 1st October, 2020
  */
    @session_start();
    $_SESSION['CSRF'] = "wwewl090lkHJzoopIOIUHghKH"; // This should be be generated dynamically
    $msg = "";

    require_once "processor.php";

    if (isset($_GET['form'])) {
        // validate the slug
        $slug = htmlentities(trim(isset($_GET['form']) ? $_GET['form'] : ""), ENT_QUOTES, 'UTF-8');
        if ($slug == "" || is_null($slug) || empty($slug) || $slug == false) {
            echo "<h3 style='color: red;'>Fatal error, slug not found</h3>";
            exit();
        }
        // create a new instance of the 'manager' class.
        $processManager = new Manager(); // This class is found in processor.php
        $form = $processManager->findFormBySlug($slug); // search for the form

        // check the value of what is 
        if (is_string($form)) {
            echo $form;
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
    <h1><?= $form->form_title ?></h1>
    <form method="POST" action="">
        <?php
            if ($form->first_name):
        ?>
            <!-- First name -->
            <p>First Name: </p>
            <input type="text" name="txtFirstName" style="width: 35em;">
        <?php
            endif;
            if ($form->middle_name):
        ?>
        <!-- Middle name -->
        <p>Middle Name: </p>
        <input type="text" name="txtMiddleName" style="width: 35em;">
        <?php
            endif;
            if ($form->last_name):
        ?>
            <!-- Last name -->
            <p>Last Name: </p>
            <input type="text" name="txtLastName" style="width: 35em;">
        <?php
            endif;
            if ($form->gender):
        ?>
            <!-- gender -->
            <p>Gender: </p>
            <input type="radio" id="rdGenderM" name="rdGender" value="male">
            <label for="rdGenderM">Male</label>

            <input type="radio" id="rdGenderF" name="rdGender" value="female">
            <label for="rdGenderF">Female</label>
        <?php
            endif;
            if ($form->dob):
        ?>
            <!-- Date of Birth -->
            <p>Date of Birth: </p>
            <input type="date" name="txtDob" style="width: 35em;">
        <?php
            endif;
            if ($form->address):
        ?>
            <!-- address -->
            <p>Address: </p>
            <input type="text" name="txtAddress" style="width: 35em;">
        <?php
            endif;
            if ($form->likes_dislikes):
        ?>
            <!-- Likes -->
            <p>Likes: </p>
            <input type="text" name="txtLikes" style="width: 35em;">

            <!-- Dislikes -->
            <p>Dislikes: </p>
            <input type="text" name="txtDislikes" style="width: 35em;">
        <?php
            endif;
        ?>
        <!-- CSRF -->
        <input type="hidden" name="csrf" value="<?=$_SESSION['CSRF']?>">

        <!-- Submit button -->
        <p><button type="submit" name="btnRegister" style="width: 35.5em;">Register</button></p>
    </form>
</body>
</html>