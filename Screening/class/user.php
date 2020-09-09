<?php
session_start();



class user{
	public $host = "localhost";
	public $username = "root";
	public $pass = "";
	public $db_name = "reception1";
	public $conn;
	public $candidate;
	public $question;
	public $candidate_row;
	
	
	
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
		$query = $this->conn->query("select email, password from candidate_login where email='$email' and password='$pass' and role = 'user'");
		$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$_SESSION['email'] = $email;
			
 			return true;
		}else{
			return false;
		}
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
		
		// select 10 questions from journal entry set.
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
	
	// get row from candidate table
	
	public function get_candidate($c_number){
		$query = $this->conn->query("select * from candidate where cnum = '$c_number'");
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$this->candidate_row = $row;
		}
		return $this->candidate_row;
	}
	
	// check if the entry exixts or not.
	public function check_entry($data){
		$query = $this->conn->query($data);
		$row = $query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
 			return 1;
		}
		return 0;
	}
	
	
	
	
	// clear the session variables.
	public function clear_session(){
		//session_destroy();
		unset($_SESSION['email']);
		unset($_SESSION['cat']);
		unset($_SESSION['level']);
		unset($_SESSION['cnum']);
		unset($_SESSION['name']);
		unset($_SESSION['department']);
		unset($_SESSION['profile']);
		unset($_SESSION['qset']);
	}
	
	// decide next url.
	public function url($url){
		header("location:".$url);
	}
}
?>