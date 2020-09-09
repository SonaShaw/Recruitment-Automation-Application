
// show time and date.
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

// funtion for print the div s1.

function printPage(s1){
				var restore = document.body.innerHTML;
				var printContent = document.getElementById(s1).innerHTML;
				document.body.innerHTML = printContent;
				window.print();
				document.body.innerHTML = restore;
			}

// evaluate the result and chck the corresponding check box.

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
		s5.style.display = 'block';
	}else{
		s5.style.visibility = 'hidden';
		s5.style.display = 'none';
	}
	
}

// populate s2 on the basis of s1.

function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == "Accounting"){
		var optionArray = ["|","Accountant|Accountant","Junior Accountant|Junior Accountant","Assistant Accountant|Assistant Accountant","Associate Accountant|Associate Accountant","Senior Accountant|Senior Accountant","Team Lead|Team Lead","Client Supervisor|Client Supervisor","Manager|Manager"];
		
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

// show text box.
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


// show other select options and populate it.
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


// show consultancy.

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


// show free or paid consultancy.
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
/*

function sum(s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	var s4 = document.getElementById(s4);
	var s5 = document.getElementById(s5);
	var s6 = document.getElementById(s6);
	var s7 = document.getElementById(s7);
	var s8 = document.getElementById(s8);
	var s9 = document.getElementById(s9);
	var s10 = document.getElementById(s10);
	var s11 = document.getElementById(s11);
	s11.value = s1.value.s2.value//s3.value+s4.value+s5.value+s6.value+s7.value+s8.value+s9.value+s10.value;
}
*/

// calculate total marks by taking value of each select box. 
function total(s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	var s4 = document.getElementById(s4);
	var s5 = document.getElementById(s5);
	var s6 = document.getElementById(s6);
	var s7 = document.getElementById(s7);
	var s8 = document.getElementById(s8);
	var s9 = document.getElementById(s9);
	var s10 = document.getElementById(s10);
	var s11 = document.getElementById(s11);
	s11.value=parseFloat(s1.value,10)+parseFloat(s2.value,10)+parseFloat(s3.value,10)+parseFloat(s4.value,10)+parseFloat(s5.value,10)+parseFloat(s6.value,10)
		+parseFloat(s7.value,10)+parseFloat(s8.value,10)+parseFloat(s9.value,10)+parseFloat(s10.value,10);
	

}

// transfer value of s1 to s2(only) candidate number.
function transferValue(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var str = s1.value.split(" - ");
	s2.value = str[0];
}

//transfer the tolal value.
function transferAllValue(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	//var str = s1.value.split(" - ");
	s2.value = s1.value;
}
// change font size.
function changeFont(s1){
	
	s1 = document.getElementById(s1);
	s1.style.fontFamily = "Times New Roman";
}