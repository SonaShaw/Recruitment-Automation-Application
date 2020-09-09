function displayTimeAndDate(s1,s2){
	s1 = document.getElementById(s1);
	s2 = document.getElementById(s2);
	var d = new Date();
	var hr = d.getHours();
	var min = d.getMinutes();
	
	var day = d.getDate();
	var mon = d.getMonth();
	var year = d.getFullYear();
	var time = hr + ":" + min;
	var date = (mon+1) + "/" + day + "/" + year
	s1.innerHTML = time;
	s2.innerHTML = date
	
	
}

function evaluateResult(s1,s2,s3,s4,s5,s6,s7,s8){
	s1 = document.getElementById(s1);
	s2 = document.getElementById(s2);
	s3 = document.getElementById(s3);
	s4 = document.getElementById(s4);
	s5 = document.getElementById(s5);
	s6 = document.getElementById(s6);
	s7 = document.getElementById(s7);
	s8 = document.getElementById(s8);
	
	
	//s4.value=20;
	//s5.value=20;
	//s6.value=10;
	//s7.value=10;
	//s8.value=30;
	
	var passed = false,failed = true,considered = false;
	var accountingCuttof = 11,excelCuttof = 15,englishCuttof = 6,aptitudecuttof = 5,typingCuttof = 22;
	
	if(s4.value>=accountingCuttof && s5.value>=excelCuttof && s6.value>=englishCuttof&& s7.value>=aptitudecuttof&& s8.value>=typingCuttof){
		passed = true;
		s1.checked = passed;	
	}
	
	else if((s6.value==5 && s4.value>=accountingCuttof && s5.value>=excelCuttof && s7.value>=aptitudecuttof&& s8.value>=typingCuttof)||(s4.value==10 && s5.value>=excelCuttof && s6.value>=englishCuttof&& s7.value>=aptitudecuttof&& s8.value>=typingCuttof)||(s4.value>=accountingCuttof && s5.value==10 && s6.value>=englishCuttof&& s7.value>=aptitudecuttof&& s8.value>=typingCuttof)||(s4.value==10 && s5.value==10 && s6.value==5&& s7.value>=5&& s8.value>=typingCuttof)){
		considered = true;
		s2.checked = considered;
	}
		
	else
		s3.checked = failed;
}

function reasonForInterview(s1,s2,s3,s4,s5){
	s1 = document.getElementById(s1);
	s2 = document.getElementById(s2);
	s3 = document.getElementById(s3);
	s4 = document.getElementById(s4);
	s5 = document.getElementById(s5);
	
	if(((s1.checked == true) && (s4.checked == true)) || ((s2.checked == true) && (s3.checked == true))){
		s5.style.visibility = 'visible';
	}else{
		s5.style.visibility = 'hidden';
	}
	
}
function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == "Overseas"){
		var optionArray = ["|","Junior Accountant|Junior Accountant","Assistant Accountant|Assistant Accountant","Associate Accountant|Associate Accountant","Senior Accountant|Senior Accountant","Team Lead|Team Lead","Client Supervisor|Client Supervisor","Manager|Manager"];
		
	}else if(s1.value == "Indian"){
		var optionArray = ["|","Accountant|Accountant","Others|Others"];
	}else if(s1.value == "Admin"){
		var optionArray = ["|","Admin Head|Admin Head","Others|Others"];
	}else if(s1.value == "HR"){
		var optionArray = ["|","HR Head|HR Head","Others|Others"];
	}else if(s1.value == "Tech"){
		var optionArray = ["|","IT Manager|IT Manager","Others|Others"];
	}else if(s1.value == "Intern"){
		var optionArray = ["|","Intern|Intern","Others|Others"];
	}
	
	for(var opt in optionArray){
		var pair = optionArray[opt].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}
function showtxtbox(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	if(s1.value == "Others"){
		s2.style.visibility = 'visible';
	}else if(s1.value == "Select Date"){
		s2.style.visibility = 'visible';
	}else{
		s2.style.visibility = 'hidden';
	}
	
}

function showandpopulate(s1,s2,s3){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	s2.style.visibility = 'visible';
	s2.innerHTML = "";
	if(s1.value == "Online"){
		var optionArray = ["|","Naukri.com|Naukri.com","Indeed.com|Indeed.com","LinkedIn.com|LinkedIn.com","Internshala.com|Internshala.com","Others|Others"];
		s3.style.visibility = 'hidden';
	}else if(s1.value == "Consultancy"){
		var optionArray = ["|","Free|Free","Paid|Paid"];
		s3.style.visibility = 'hidden';
	}else if(s1.value == "Reference"){
		var optionArray = ["|","Internal|Internal","External|External"];
		s3.style.visibility = 'hidden';
	}else{
		var optionArray = ["|",];
		s2.style.visibility = 'hidden';
		s3.style.visibility = 'visible';
	}
	for(var opt in optionArray){
		var pair = optionArray[opt].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
	
}

function showFreeOrPaid(s1,s2,s3,s4,s5){
	
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	var s4 = document.getElementById(s4);
	var s5 = document.getElementById(s5);
	s2.style.visibility = 'visible';
	s4.style.visibility = 'hidden';
	s5.style.visibility = 'hidden';
	
	s2.innerHTML = "";
	if(s1.value == "Consultancy"){
		var optionArray = ["|","Free|Free","Paid|Paid"];	
		s3.style.visibility = 'hidden';
		
	}else{
		var optionArray = ["|",];
		s2.style.visibility = 'hidden';
		s3.style.visibility = 'visible';
		
	}
	for(var opt in optionArray){
		var pair = optionArray[opt].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}

function showFreeOrPaidConsultancy(s1,s2,s3){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	if(s1.value == "Free"){
		s2.style.visibility = 'visible';
		s3.style.visibility = 'hidden';
	}else if(s1.value == "Paid"){
		s2.style.visibility = 'visible';
		s3.style.visibility = 'visible';
	}else{
		s2.style.visibility = 'hidden';
		s3.style.visibility = 'hidden';
	}
	
}