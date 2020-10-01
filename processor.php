<?php 
  /**
   * Khaleb O'Brien (Weird_Coder)
   * ebukauche52@gmail.com
   * https://khaleb.dev
   * Thur, 1st October, 2020
  */

// !<haleb loves OOP thats why he uses class to work.
class Manager
{
	public $connect;
    private $response = "";
    private $userId = 1; // you should have a way of keeping the user details after login (maybe in a session variable).
    
    public function __construct() {
        $dbhost = "localhost";
        $dbname = "custom_form";
        $dbuser = "root";
        $dbpass = "";
        try {
            $this->connect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            $this->response = "Connection failed";
        }
        return TRUE;
    }

    // This is a private method for generating random characters. We will use it to generate random unique strings for our form slug
    private static function random_strings($length_of_string)
	{
		$str_result = 'LMNPQRSTUV234tuvwxyz56KWXYZabcdefghjk789ABCDEFGHJlmnpqrs';
		return substr(str_shuffle($str_result), 0, $length_of_string); 
	}


	// $form->setSholder(isset($setup['sholder']) ? $setup['sholder'] : false);

	public function createForm(array $formDetails)
	{
        try {

            $sql = "INSERT INTO form(created_by, slug, form_title, last_name, first_name, middle_name, gender, dob, address, likes_dislikes, created_at, updated_at)" . "VALUES (:userId, :slug, :formTitle, :lastName, :firstName, :middleName, :gender, :dob, :address, :liDis, NOW(), NOW())";
            $q = $this->connect->prepare($sql);
            $q->execute(array(
            	':userId' => $this->userId,
            	':slug' => $this->random_strings(8),
            	':formTitle' => $formDetails['title'],
            	':lastName' => $formDetails['lastname'],
            	':firstName' => $formDetails['firstname'],
            	':middleName' => $formDetails['middlename'],
            	':gender' => $formDetails['gender'],
            	':dob' => $formDetails['dob'],
            	':address' => $formDetails['address'],
            	':liDis' => $formDetails['liDis']
            ));
            
            $this->response = "<span style='color: green;'>New Form Created successfully.</span>";

        } catch (PDOException $e) {
            $this->response = "<span style='color: red;'>An error might have occurred in the System</span>";
        }
        return $this->response;
    }

    // This method will search the 'form' table for a record that matches the slug passed to it.
    public function findFormBySlug(string $slug)
    {
        try{
            $sql = "SELECT id, created_by, slug, form_title, last_name, first_name, middle_name, gender, dob, address, likes_dislikes, created_at, updated_at FROM form where slug = '".$slug."'";
            $smt = $this->connect->query($sql);
            $form = $smt->fetch(PDO::FETCH_OBJ);

            if ($form === false) {
                $this->response = "<span style='color: red;'>An error might have occurred in the System</span>";
            }
            else {
            	$this->response = $form;
            }
        } catch(PDOException $e) {
            $this->response = "<span style='color: red;'>You're kind of trying to hack our system. Nice try though</span>";
        }
        return $this->response;
    }

}