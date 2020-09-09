<?php
session_start();



class user{
	public $host = "localhost";
	public $username = "root";
	public $pass = "";
	public $db_name = "reception1";
	public $conn;
	public $hr;
	public $marks;
	public $source;
	public $candidate;
	public $question;
	
	public $ledTeam;
	public $professionalCourse;
	public $govtExam;
	public $managedClient;
	public $noFresher;
	public $currentEmloyment;
	public $lastEmployment;
	public $sibling;
	public $child;
	public $ca;
	
	
	// create connection to database when object of this constructor will be created.
	// this is basically a constructor for creating the connection to database.
	public function __construct(){
		$this->conn = new mysqli($this->host,$this->username,$this->pass,$this->db_name);
		mysqli_set_charset($this->conn,"utf8");
		
		if($this->conn->connect_errno){
			die("database connection failed".$this->conn->connect_errno);
		}
		
	}
	
	// insert data to the database. $data is query as parameter.
	public function register($data){
		
		$this->conn->query($data);
		return true;
	}
	
	
	
	
	// check login credential
	public function login($email,$pass){
		$query = $this->conn->query("select * from candidate_login where email='$email' and password='$pass' and role = 'HR-Head'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			
			$_SESSION['hr_name'] = $row['name'];
			$_SESSION['hr_email'] = $email;
			$_SESSION['hr_password'] = $pass;
			$_SESSION['hr_designation'] = $row['role']; 			
 			return true;
		}else{
			return false;
		}
	}
	
	// show hr details
	public function show_hr($email,$pass){
		$query = $this->conn->query("select * from candidate_login where email='$email' and password='$pass' and role = 'HR'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
 			$this->hr = $row;
		}
		return $this->hr;
	}
	
	// get accounting marks
	public function get_accounting_marks($c_number){
		$query = $this->conn->query("select * from result where cnum = '$c_number' and cat_id = 1");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
 			$this->marks = $row;
		}
		return $this->marks;
	}
	
	
	// get english marks
	public function get_english_marks($c_number){
		$query = $this->conn->query("select * from result where cnum = '$c_number' and cat_id = 3");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
 			$this->marks = $row;
		}
		return $this->marks;
		
	}
	
	// get aptitude marks
	public function get_aptitude_marks($c_number){
		$query = $this->conn->query("select * from result where cnum = '$c_number' and cat_id = 2");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
 			$this->marks = $row;
		}
		return $this->marks;
	}
	
	// get source of the candidate
	public function get_source($c_number){
		$query = $this->conn->query("select source, subsource, consultancy, other_source from candidate where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->source = $row;
		}
		return $this->source;
	}
	
	//get result of the candidate
	public function get_result($c_number){
		$query = $this->conn->query("select * from final_score where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->source = $row;
		}
		return $this->source;
	}
	
	// Get personal details
	
	public function get_personal_details($c_number){
		$query = $this->conn->query("select * from personal_details where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->source = $row;
		}
		return $this->source;
	}
	
	// Get professional details
	
	public function get_professional_details($c_number){
		$query = $this->conn->query("select * from professional_details where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->source = $row;
		}
		return $this->source;
	}
	
	// get siblings.
	
	public function get_siblings($c_number){
		
		$query = $this->conn->query("select * from siblings where cnum = '$c_number'");
		
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->sibling[] = $row;
			
		}
		
		return $this->sibling;
		
	}
	
	// get child.
	
	public function get_children($c_number){
		
		$query = $this->conn->query("select * from children where cnum = '$c_number'");
		
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->child[] = $row;
			
		}
		
		return $this->child;
		
	}
	
	// get ca.
	
	public function get_ca($c_number){
		
		$query = $this->conn->query("select * from ca where cnum = '$c_number'");
		
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->ca[] = $row;
			
		}
		
		return $this->ca;
		
	}
	
	//if candidate is not a fresher 
	
	public function get_no_fresher($c_number){
		$query = $this->conn->query("select * from no_fresher where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->noFresher = $row;
		}
		return $this->noFresher;
	}
	
	//Get current employment details 
	
	public function get_current_employment($c_number){
		$query = $this->conn->query("select * from current_emp where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->currentEmloyment = $row;
		}
		return $this->currentEmloyment;
	}
	
	//Get last employment details 
	
	public function get_last_employment($c_number){
		$query = $this->conn->query("select * from last_emp where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->lastEmployment = $row;
		}
		return $this->lastEmployment;
	}
	
	//get the information if the candidate has led team or not. 
	
	public function get_led_team($c_number){
		$query = $this->conn->query("select * from led_team where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->ledTeam = $row;
		}
		return $this->ledTeam;
	}
	
	//get the information if the candidate has managed client or not. 
	
	public function get_managed_client($c_number){
		$query = $this->conn->query("select * from managed_client where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->managedClient = $row;
		}
		return $this->managedClient;
	}
	
	//Get professional course
	
	public function get_professional_course($c_number){
		$query = $this->conn->query("select * from professional_course where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->professionalCourse = $row;
		}
		return $this->professionalCourse;
	}
	
	//Get govt course
	
	public function get_govt_exam($c_number){
		$query = $this->conn->query("select * from govt_exam where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->govtExam = $row;
		}
		return $this->govtExam;
	}
	
	
	// get receptionst time-stamp of the candidate
	public function get_receptionist_timestamp($c_number){
		$query = $this->conn->query("select * from candidate where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->source = $row;
		}
		return $this->source;
	}
	
	// check data is already exist in database or not.
	public function check_entry($data){
		$query = $this->conn->query($data);
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
 			return 1;
		}
		return 0;
	}
	
	


	
	// function to return array of candidate consisting all information from candidate table who were registered on the current date.
	public function show_candidate(){
		// set the timezone first
		if(function_exists('date_default_timezone_set')) {
			date_default_timezone_set("Asia/Kolkata");
		}
		$date = date("Y-m-d");
		$query = $this->conn->query("select * from candidate where register_date='$date'");
		
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->candidate[] = $row;
			
		}
		return $this->candidate;
		
	}
	
	// show only those candidate who are selected to take interview.
	public function show_interviewed_candidate(){
		// set the timezone first
		if(function_exists('date_default_timezone_set')) {
			date_default_timezone_set("Asia/Kolkata");
		}
		$date = date("Y-m-d");
		
		$query = $this->conn->query("select candidate.cnum, candidate.name, candidate.department, candidate.profile, candidate.register_time from candidate
		inner join final_score
		on (candidate.cnum=final_score.cnum and final_score.is_interviewed=('yes') and candidate.register_date = '$date')");
		
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->candidate[] = $row;
			
		}
		return $this->candidate;
		
	}
	
	
	
	public function apply_filter($data){
		// set the timezone first
		if(function_exists('date_default_timezone_set')) {
			date_default_timezone_set("Asia/Kolkata");
		}
		$date = date("Y-m-d");
		$query = $this->conn->query($data);
		
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->candidate[] = $row;
			
		}
		return $this->candidate;
		
	}
	
	
	// set session variables for candidate number, name, department, profile.
	public function set_session($cnumber,$name,$dept,$profile){
		$_SESSION["cnum"] = $cnumber;
		$_SESSION["candi_name"] = $name;
		$_SESSION["candi_department"] = $dept;
		$_SESSION["candi_profile"] = $profile;
		
		
		
	}
	
	
	
	// fetch question for basic, advance and professional levels.
	
	public function fetch_accounting_question_response($cnum,$cat){
		
		$query = $this->conn->query("select question_bank.qid, question_bank.statement, question_bank.answer1, question_bank.answer2, question_bank.answer3, question_bank.answer4,
			question_bank.correctanswer, responses.response from question_bank 
			inner join responses
			on (responses.cnum = '$cnum' and question_bank.qid = responses.qid and question_bank.cat_id = '$cat' and responses.cat_id = '$cat')");
		
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->question[] = $row;
			
		}
		
		
		//shuffle($this->question);
		return $this->question;
		
	}
	/*
	
	// match answer for basic, intermediate, advance and professional level.
	
	public function check_answer($id,$ans){
		
		$query = $this->conn->query("select qid, correctanswer from question_bank where qid='$id' and correctanswer='$ans'");
		$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){	
 			return true;
		}else{
			return false;
		}
		
	}
	
	// fetch question for intermediate level 
	
	public function fetch_intermediate_question_set($cat_id){
		
		// select 5 question from basic level
		
		$query = $this->conn->query("select * from question_bank where cat_id = '$cat_id' and level_id = 1 order by rand() limit 5 " );
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->question[] = $row;
			
		}
		
		// select 5 questions from intermediate level
		
		$query = $this->conn->query("select * from question_bank where cat_id = '$cat_id' and level_id = 2 order by rand() limit 5 " );
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->question[] = $row;
			
		}
		
		if($cat_id == 1){
			$query = $this->conn->query("select * from question_bank where cat_id = '$cat_id' and level_id = 4 order by rand() limit 10");
			while($row = $query->fetch_array(MYSQLI_ASSOC)){
				$this->question[] = $row;
			
			}
		}
		
		
		//shuffle all the 10 question fetched
		
		shuffle($this->question);
		
		return $this->question;
		
	}
	
	// set session variables for candidate number, name, department, profile and question set.
	public function set_session($cnumber,$name,$dept,$profile,$set){
		$_SESSION["cnum"] = $cnumber;
		$_SESSION["name"] = $name;
		$_SESSION["department"] = $dept;
		$_SESSION["profile"] = $profile;
		$_SESSION["qset"] = $set;
		
		
	}
	
	//set session for catagory id and level id , this will update accordingly when catagory id or level id changes.
	public function set_session_for_catagory_and_level($cat,$level){
		$_SESSION["cat"] = $cat;
		$_SESSION["level"] = $level;
	}
	
	*/
	// clear the session variables.
	public function clear_session(){
		unset($_SESSION['hr_name']);
		unset($_SESSION['hr_email']);
		unset($_SESSION['hr_password']);
		unset($_SESSION['hr_designation']);
		unset($_SESSION['cnum']);
		unset($_SESSION['candi_name']);
		unset($_SESSION['candi_department']);
		unset($_SESSION['candi_profile']);
	}
	
	
	// decide url.
	public function url($url){
		header("location:".$url);
	}
	
	
}
?>