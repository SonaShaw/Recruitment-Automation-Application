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
		$query = $this->conn->query("select * from candidate_login where email='$email' and password='$pass' and (role = 'HOD' or role = 'CEO')");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			
			$_SESSION['hod_name'] = $row['name'];
			$_SESSION['hod_email'] = $email;
			$_SESSION['hod_password'] = $pass;
			$_SESSION['hod_designation'] = $row['role']; 			
 			return true;
		}else{
			return false;
		}
	}
	
	// fetch hr details.
	public function show_hr($email,$pass){
		$query = $this->conn->query("select * from candidate_login where email='$email' and password='$pass' and role = 'HR'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
 			$this->hr = $row;
		}
		return $this->hr;
	}
	
	
	// get score from final_score table
	public function get_marks($c_number){
		$query = $this->conn->query("select * from final_score where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
 			$this->marks = $row;
		}
		return $this->marks;
	}
	
	
	//get accounting marks
	public function get_accounting_marks($c_number){
		$query = $this->conn->query("select * from result where cnum = '$c_number' and cat_id = 1");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
 			$this->marks = $row;
		}
		return $this->marks;
	}
	
	
	//get english marks
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
	
	
	// get result of the candidate
	public function get_result($c_number){
		$query = $this->conn->query("select * from final_score where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->source = $row;
		}
		return $this->source;
	}
	
	// get receptionist time stamp
	public function get_receptionist_timestamp($c_number){
		$query = $this->conn->query("select * from candidate where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->source = $row;
		}
		return $this->source;
	}
	
	// check the data is already entered in database or not
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
	public function show_qualified_candidate(){
		// set the timezone first
		if(function_exists('date_default_timezone_set')) {
			date_default_timezone_set("Asia/Kolkata");
		}
		$date = date("Y-m-d");
		$query = $this->conn->query("select candidate.cnum, candidate.name, candidate.department, candidate.profile, candidate.register_time from candidate
		inner join interview
		on (candidate.cnum=interview.cnum and interview.recomendation = 'proceed' and candidate.register_date = '$date')");
		
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->candidate[] = $row;
			
		}
		return $this->candidate;
		
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
	
	
	// set session variables for candidate number, name, department, profile.
	public function set_session($cnumber,$name,$dept,$profile){
		$_SESSION["cnum"] = $cnumber;
		$_SESSION["candi_name"] = $name;
		$_SESSION["candi_department"] = $dept;
		$_SESSION["candi_profile"] = $profile;
		
		
		
	}
	
	/*
	
	// fetch question for basic, advance and professional levels.
	
	public function fetch_basic_question_set(){
		
		$query = $this->conn->query("select * from question_bank where cat_id = ".$_SESSION["cat"]." and level_id = ".$_SESSION["level"]." order by rand() limit 10");
		
		while($row = $query->fetch_array(MYSQLI_ASSOC)){
			$this->question[] = $row;
			
		}
		
		if($_SESSION["cat"] == 1){
			$query = $this->conn->query("select * from question_bank where cat_id = ".$_SESSION["cat"]." and level_id = 4 order by rand() limit 10");
			while($row = $query->fetch_array(MYSQLI_ASSOC)){
				$this->question[] = $row;
			
			}
		}
		shuffle($this->question);
		return $this->question;
		
	}
	
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
		unset($_SESSION['hod_name']);
		unset($_SESSION['hod_email']);
		unset($_SESSION['hod_password']);
		unset($_SESSION['hod_designation']);
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