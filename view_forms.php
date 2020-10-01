<?php 
  /**
   * Khaleb O'Brien (Weird_Coder)
   * ebukauche52@gmail.com
   * https://khaleb.dev
   * Wed, 2nd October, 2020
  */
    @session_start();
    require_once "processor.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>List of your forms</title>
    <style type="text/css">
        tr td {
            border: 1px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>
    <p>Here is a list of forms created by you.</p>
    <table class="table table-striped">
        <thead>
            <th>S/N</th>
            <th>Form Title</th>
            <th>URL</th>
            <th>Created On</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                $userId = 1; // you should have a way of keeping the user details after login (maybe in a session variable).
                $processManager = new Manager();
                $forms = $processManager->fetchFormsByUserId($userId);
                
                $counter = 1;
                foreach ($forms as $form) :
            ?>
                <tr>
                    <td ><?= $counter++ ?></td>
                    <td><?= $form['form_title'] ?></td>
                    <td>http://domain/register.php?form=<?= $form['slug'] ?></td>
                    <td><?= $form['created_at'] ?></td>
                    <td>Edit Delete View</td>
                </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</body>
</html>