
// populate s2 on the basis of value selected from s1.

function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	
	if(s1.value == "Accounting"){
		var optionArray = ["|","Accountant|Accountant","Junior Accountant|Junior Accountant","Assistant Accountant|Assistant Accountant","Associate Accountant|Associate Accountant","Senior Accountant|Senior Accountant","Team Lead|Team Lead","Client Supervisor|Client Supervisor","Manager|Manager"];
		//var optionArray = ["|","Accountant|Accountant","Junior Accountant|Junior Accountant","Assistant Accountant|Assistant Accountant"];
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


// show textbox s2 on the basis of value of s1.
function showtxtbox(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	if(s1.value == "Others"){
		s2.style.visibility = 'visible';
	}else{
		s2.style.visibility = 'hidden';
	}
	
}

// transfer value of s1 to s2.
function transferValue(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	
	s2.value = s1.value;
}

// show sibling on the basis of checkbox checked.
function showsiblings(s1,s2,s3,s4){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	var s4 = document.getElementById(s4);
	var x = s1.checked;
	var y = s2.checked;
	if(x == true){
		s3.style.visibility = 'visible';
		s4.style.visibility = 'visible';
	}else if(y == true){
		s3.style.visibility = 'hidden';
		s4.style.visibility = 'hidden';
	}
	
}

// show options for spouse.
function showSpouseDetails(s1,s2,s3){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	if(s1.value == "Married"||s1.value == "Separated"||s1.value == "Divorced"||s1.value == "Widowed" ){
		s2.style.visibility = 'visible';
		s3.style.visibility = 'visible';
	}else{
		s2.style.visibility = 'hidden';
		s3.style.visibility = 'hidden';
	}
}

//show child element if candidate is not single.

function showChild(s1,s2,s3,s4,s5){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	var s4 = document.getElementById(s4);
	var s5 = document.getElementById(s5);
	var x = s1.checked;
	var y = s2.checked;
	if(x == true){
		s3.style.visibility = 'visible';
		s4.style.visibility = 'visible';
		s5.style.visibility = 'hidden';
	}else if(y == true){
		s3.style.visibility = 'hidden';
		s4.style.visibility = 'hidden';
		s5.style.visibility = 'visible';
	}	
}

// funtion for 2 radio button and one span

function showSpanOnRadio(s1,s2,s3){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	var x = s1.checked;
	var y = s2.checked;
	if(x == true){
		s3.style.visibility = 'visible';
		
	}else if(y == true){
		s3.style.visibility = 'hidden';
		
	}	
	
}


 // hide displayed row
function hideDisplayedRow(s1){
	var s1 = document.getElementById(s1);
	s1.style.visibility = 'hidden';
	s1.style.display = 'none';
}


// show hidden row

function showHiddenRow(s1,s2,s3,s4,s5,s6,s7,s8,s9){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	var s4 = document.getElementById(s4);
	var s5 = document.getElementById(s5);
	var s6 = document.getElementById(s6);
	var s7 = document.getElementById(s7);
	var s8 = document.getElementById(s8);
	var s9 = document.getElementById(s9);
	s9.value = s2.value;
	if(s2.value == ""){
		s1.style.visibility = 'hidden';
		s1.style.display = 'none';
	}else{
		var str = s2.value.split(" - ");
		//s2.value = str[0];
		s1.style.visibility = 'visible';
		s1.style.display = 'table-row';
		s3.value = str[1];
		s4.value = str[2];
		s5.value = str[3];
		s6.value = str[4];
		s7.value = str[0];
		s8.value = str[5];
	}

}

// change the font size .
function changeFont(s1){
	
	s1 = document.getElementById(s1);
	s1.style.fontFamily = "Times New Roman";
}

const start = getElementById("start");
const quiz = getElementById("quiz");
const question = getElementById("question");
const choiceA = getElementById("A");
const choiceB = getElementById("B");
const choiceC = getElementById("C");
const choiceD = getElementById("D");
const nextButton = getElementById("next");
