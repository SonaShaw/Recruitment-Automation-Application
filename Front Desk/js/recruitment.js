
// populate s2 on the basis of selected item from s1.

function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	
	if(s1.value == "Accounting"){
		//var optionArray = ["|","Accountant|Accountant","Junior Accountant|Junior Accountant","Assistant Accountant|Assistant Accountant","Associate Accountant|Associate Accountant","Senior Accountant|Senior Accountant","Team Lead|Team Lead","Client Supervisor|Client Supervisor","Manager|Manager","Intern|Intern","Articled Assistant|Articled Assistant"];
		var optionArray = ["|","Accountant|Accountant","Junior Accountant|Junior Accountant","Assistant Accountant|Assistant Accountant"];
	}else if(s1.value == "Admin"){
		var optionArray = ["|","Admin Head|Admin Head"];
	}else if(s1.value == "HR"){
		var optionArray = ["|","HR Head|HR Head"];
	}else if(s1.value == "Tech"){
		var optionArray = ["|","IT Manager|IT Manager","Intern|Intern","Digital Marketing|Digital Marketing"];
	}else if(s1.value == "Online"){
		var optionArray = ["|","Naukri.com|Naukri.com","Indeed.com|Indeed.com","LinkedIn.com|LinkedIn.com","Internshala.com|Internshala.com"];
		
	}else if(s1.value == "Consultancy"){
		var optionArray = ["|","Free|Free","Paid|Paid"];
		
	}else if(s1.value == "Reference"){
		var optionArray = ["|","Internal|Internal","External|External"];
	}else if(s1.value == "Free"){
		var optionArray = ["|","A|A","B|B"];
	}else if(s1.value == "Paid"){
		var optionArray = ["|","C|C","D|D"];
	}
	
	for(var opt in optionArray){
		var pair = optionArray[opt].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}

// Popolate profile option on the basis of chattered accountant(ca) and experience for accountiong deppartment only

function populateProfileByCaExperinceForAccounting(dept,prof,exp){
	//var ca = document.getElementById(ca);
	var dept = document.getElementById(dept);
	var prof = document.getElementById(prof);
	var exp = document.getElementById(exp);
	var noca = document.getElementById('noca');
	
	
	if(noca.checked == true && dept.value == "Accounting"){
		prof.innerHTML = "";
		if(dept.value == "Accounting" && (exp.value >= 0 && exp.value <=12)){
			var optionArray = ["|","Accountant|Accountant","Junior Accountant|Junior Accountant","Assistant Accountant|Assistant Accountant"];	
		}else if(dept.value == "Accounting" && (exp.value >= 13 && exp.value <25)){
			var optionArray = ["|","Accountant|Accountant","Assistant Accountant|Assistant Accountant","Associate Accountant|Associate Accountant","Senior Accountant|Senior Accountant"];	
		}else if(dept.value == "Accounting" && exp.value >= 25 && exp.value <60){
			var optionArray = ["|","Accountant|Accountant","Senior Accountant|Senior Accountant","Team Lead|Team Lead","Client Supervisor|Client Supervisor"];	
		}else if(dept.value == "Accounting" && exp.value >=60){
			var optionArray = ["|","Senior Accountant|Senior Accountant","Team Lead|Team Lead","Client Supervisor|Client Supervisor","Manager|Manager"];	
		}
	
		for(var opt in optionArray){
			var pair = optionArray[opt].split("|");
			var newOption = document.createElement("option");
			newOption.value = pair[0];
			newOption.innerHTML = pair[1];
			prof.options.add(newOption);
		}
	}
	
}

// set the department value = "Accounting" and and disable it, also set the profile accordingly.
function setDeptToAccounting(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s1.disabled = true;
	s1.value = "Accounting";
	
	// set profile options
	s2.options.length = 0;
	var optionArray = ["|","Team Lead|Team Lead","Client Supervisor|Client Supervisor","Manager|Manager"];
	if(s2.options.length == 0){
		for(var opt in optionArray){
			var pair = optionArray[opt].split("|");
			var newOption = document.createElement("option");
			newOption.value = pair[0];
			newOption.innerHTML = pair[1];
			s2.options.add(newOption);
		}
	}
		
}

// unset department value form Accounting and set length of option of s2(profile) to zero;
function unsetDeptToAccounting(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s1.value = "";
	s1.disabled = false;
	s2.options.length = 0;
	
		
}


// transfer the department(s1) value to hidden input (s2) as department is disabled and its value can't be push into database
function transferValue(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.value = s1.value;
}

// set the hidden department input value = "Accounting"
function setHiddenDepartment(s1){
	var s1 = document.getElementById(s1);
	s1.value = "Accounting";
}


// show the hidden span or other elements on the basis of choosen option from source.

function showSpanForSource(s1,s2,s3,s4){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	var s4 = document.getElementById(s4);
	s2.style.visibility = 'hidden';
	s3.style.visibility = 'hidden';
	s4.style.visibility = 'hidden';
	
	if(s1.value == "Online" ||s1.value == "Consultancy" || s1.value == "Reference"){
		s2.style.visibility = 'visible';
		s2.style.display = 'block';
		s3.style.visibility = 'hidden';
		s3.style.display = 'none';
		s4.style.visibility = 'hidden';
		s4.style.display = 'none';
	}else if(s1.value == "Other"){
		s2.style.visibility = 'hidden';
		s2.style.display = 'none';
		s3.style.visibility = 'hidden';
		s3.style.display = 'none';
		s4.style.visibility = 'visible';
		s4.style.display = 'block';
	}else{
		s2.style.display = 'none';
		s3.style.display = 'none';
		s4.style.display = 'none';
	}
	
}

// show the hidden span or other elements on the basis of selected option from subsource.

function showSpanForSubsource(s1,s2,s3){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	s2.style.visibility = 'hidden';
	s3.style.visibility = 'hidden';
	if(s1.value == "Internal"||s1.value == "External"){
		s2.style.visibility = 'hidden';
		s2.style.display = 'none';
		s3.style.visibility = 'visible';
		s3.style.display = 'block';		
	}else if(s1.value == "Free"||s1.value == "Paid"){
		s2.style.visibility = 'visible';
		s2.style.display = 'block';
		s3.style.visibility = 'hidden';
		s3.style.display = 'none';
	
	}else{
		s2.style.display = 'none';
		s3.style.display = 'none';
	}
}

// Find type of question set 

var qsSet = document.getElementById('qsset').value;

// Find type of question set on the basis of experience.

function identifyQsSetByExperience(s1,s2,s3,s4){
	s1 = document.getElementById(s1);
	s2 = document.getElementById(s2);
	s3 = document.getElementById(s3);
	s4 = document.getElementById(s4);
	
	if(s3.checked == false){
		if(s4.value=="Tech"){
			s2.value = "Technical";
			qsSet = "Technical";
		}else if(s1.value>=0 && s1.value <=12){
			s2.value = "Basic";
			qsSet = "Basic";
		}else if(s1.value>=13 && s1.value <25){
			s2.value = "Intermediate";
			qsSet = "Intermediate";
		}else if(s1.value>=25){
			s2.value = "Advanced";
			qsSet = "Advanced";
		}else{
			alert("Enter a positive month");
			s1.value = "";
			s2.value = "";
			qsSet = "Basic";
		}	
	}
	if(s1.value < 0){
		alert("Enter a positive month");
		s1.value = "";
		qsSet = "Basic";
		
		
	}
}

// Find type of question set on the basis of CA.

function identifyQsSetByCA(s1,s2){
	s1 = document.getElementById(s1);
	s2 = document.getElementById(s2);
	var exp = document.getElementById('experience');
	exp.value = "";
	if(s1.checked == true){
		s2.value = "Professional";
		
	}else{
		s2.value = "";
	}
}


//// Find type of question set on the basis of Department.

function setQsSetbyDept(s1,s2){
	s1 = document.getElementById(s1);
	s2 = document.getElementById(s2);
	
	if(s1.value == "Tech"){
		s2.value = "Technical";
	}else{
		s2.value = qsSet;
	}
	
}

// validate entered Full name.

function Validate(){
	var isValid = false;
	var fullName = document.getElementById("fullname").value;
	var regex = /^[A-Za-z ]*$/;
	isValid = regex.test(fullName);
	if(!isValid){
		alert("Enter a valid candidate name.");
	}
	
	return isValid;
}

//change font of value entered in s1.

function changeFont(s1){
	
	s1 = document.getElementById(s1);
	s1.style.fontFamily = "Times New Roman";
}
