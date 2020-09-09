
//show text box if other option is selected
function showtxtbox(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	if(s1.value == "Others"){
		s2.style.visibility = 'visible';
		s2.style.display = 'block';
	}else{
		s2.style.visibility = 'hidden';
		s2.style.display = 'none';
	}
	
}

// show elements on the basis o checked item

function showsiblings(s1,s2,s3,s4){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	var s4 = document.getElementById(s4);
	var x = s1.checked;
	var y = s2.checked;
	if(x == true){
		s3.style.visibility = 'visible';
		s3.style.display = 'block';
		s4.style.visibility = 'visible';
		s4.style.display = 'block';
	}else if(y == true){
		s3.style.visibility = 'hidden';
		s3.style.display = 'none';
		s4.style.visibility = 'hidden';
		s4.style.display = 'none';
	}
	
}

// show elements on the basis of selected option.
function showSpouseDetails(s1,s2,s3){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	var s3 = document.getElementById(s3);
	if(s1.value == "Engaged"||s1.value == "Married"||s1.value == "Separated"||s1.value == "Divorced"||s1.value == "Widowed" ){
		s2.style.visibility = 'visible';
		s2.style.display = 'block';
		s3.style.visibility = 'visible';
		s3.style.display = 'block';
	}else{
		s2.style.visibility = 'hidden';
		s2.style.display = 'none';
		s3.style.visibility = 'hidden';
		s3.style.display = 'none';
	}
}

//show the child element on the basis of radio input.

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
		s3.style.display = 'block';
		s4.style.visibility = 'visible';
		s4.style.display = 'block';
		s5.style.visibility = 'hidden';
		s5.style.display = 'none';
	}else if(y == true){
		s3.style.visibility = 'hidden';
		s3.style.display = 'none';
		s4.style.visibility = 'hidden';
		s4.style.display = 'none';
		s5.style.visibility = 'visible';
		s5.style.display = 'block';
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
		s3.style.display = 'block';
		
	}else if(y == true){
		s3.style.visibility = 'hidden';
		s3.style.display = 'none';
		
	}	
	
}

 // hide displayed row
function hideDisplayedRow(s1){
	var s1 = document.getElementById(s1);
	s1.style.visibility = 'hidden';
	s1.style.display = 'none';
}

// show hidden row

function showHiddenRow(s1){
	var s1 = document.getElementById(s1);
	s1.style.visibility = 'visible';
	s1.style.display = 'table-row';
}

 
 // show and hide a row on the basis of selected option of select element.
function showAndHideRowOnOption(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	if(s1.value == "Married"||s1.value == "Separated"||s1.value == "Divorced"||s1.value == "Widowed" ){
		s2.style.visibility = 'visible';
		s2.style.display = 'table-row';
	}else{
		s2.style.visibility = 'hidden';
		s2.style.display = 'none';
	}
	
}

 // show and hide a row on the basis of selected option of select element.
function show(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	if(s1.checked == true){
		s2.style.visibility = 'visible';
		s2.style.display = 'block';
	}else{
		s2.style.visibility = 'hidden';
		s2.style.display = 'none';
	}
	
}



// 
var i = 1;
function display(){
	
	var a = document.getElementById("ca_container");
	var div = document.createElement("div");
	var txtBox = document.createElement("input");
	var selectBox = document.createElement("select");
	var removeBtn = document.createElement("input");
	var lineBreak = document.createElement("br");
	
	populateSelectBox(selectBox);
	div.setAttribute("id","div"+i);
	txtBox.setAttribute("type","text");
	txtBox.setAttribute("id","family_member_ca_qualification"+i);
	txtBox.setAttribute("name","family_member_ca_qualification"+i)
	txtBox.setAttribute("size","34")
	txtBox.setAttribute("placeholder","Enter Qualification")
	selectBox.setAttribute("id","familymember"+i);
	selectBox.setAttribute("name","familymember"+i)
	removeBtn.setAttribute("type","button");
	removeBtn.setAttribute("id","removebtn"+i);
	removeBtn.setAttribute("name","removebtn"+i)
	removeBtn.setAttribute("value","DEL");
	removeBtn.setAttribute("onclick","removeDiv('div'+i)");
	
	div.appendChild(selectBox);
	div.innerHTML += ' ' ;	
	div.appendChild(txtBox);
	div.innerHTML += ' ' ;
	div.appendChild(removeBtn);
	div.appendChild(lineBreak);
	a.appendChild(div);
	i++;

	
}

// display brother and sister qualification dynamically.
var j;
function display(s1,s2,str){
	
	var s1 = document.getElementById(s1);
	s1.innerHTML = "";
	var s2 = document.getElementById(s2);
	var count = document.createElement("input");
	if(s2.value <= 5){
		for(j=1;j<=s2.value;j++){
			var div = document.createElement("div");
			var txtBox = document.createElement("input");
			div.setAttribute("id","div"+str+j);
			txtBox.setAttribute("type","text");
			txtBox.setAttribute("id",str+j);
			txtBox.setAttribute("name",str+j);
			txtBox.setAttribute("size","34");
			txtBox.setAttribute("placeholder",str + j + ": Qualification");
			txtBox.setAttribute("oninput","changeFont(this.id)");	
			div.appendChild(txtBox);
			div.innerHTML += ' ' ;
			s1.appendChild(div);
		}
	}
	count.setAttribute("type","number");
	count.setAttribute("id",str+"_count");
	count.setAttribute("name",str+"_count");
	count.setAttribute("value",j-1);
	count.setAttribute("style","display:none");
	s1.appendChild(count)
}

// display number of input for entering the child age.

var k;
function displayNoOfChildren(s1,s2,str){
	
	var s1 = document.getElementById(s1);
	s1.innerHTML = "";
	var s2 = document.getElementById(s2);
	
	if(s2.value < 0){
		alert("Enter a positive number");
		s2.value = "";
		
	}else if(s2.value > 5){
		alert("Maximum Limit is 5");
		s2.value = 0;
		
	}else if(s2.value <= 5){
		for(k=1;k<=s2.value;k++){
			var spn = document.createElement("span");
			var txtBox = document.createElement("input");
			var count = document.createElement("input");
			spn.setAttribute("id","div"+str+k);
			txtBox.setAttribute("type","number");
			txtBox.setAttribute("id",str+k);
			txtBox.setAttribute("name",str+k);
			txtBox.setAttribute("style","width:70px");
			txtBox.setAttribute("placeholder","age :"+k);
			txtBox.setAttribute("onclick","isPositive(this.id);changeFont(this.id)");	
			spn.appendChild(txtBox);
			spn.innerHTML += ' ' ;
			s1.appendChild(spn);
		}
	}
	
	count.setAttribute("type","number");
	count.setAttribute("id",str+"_count");
	count.setAttribute("name",str+"_count");
	count.setAttribute("value",k-1);
	count.setAttribute("style","display:none");
	s1.appendChild(count)
}

// add and delete family mamber qualification dynamically.

var i = 1;
$(document).ready(function(){
	
	var count = document.createElement("input");
	$('#add_ca').click(function(){
		i++;
		var div = document.createElement("div");
		var txtBox = document.createElement("select");
		var selectBox = document.createElement("select");
		var removeBtn = document.createElement("input");
		var lineBreak = document.createElement("br");
												
		populateSelectBox(selectBox);
		populateTxtBox(txtBox);
		div.setAttribute("id","div"+i);
		//txtBox.setAttribute("type","text");
		txtBox.setAttribute("id","family_member_ca_qualification"+i);
		txtBox.setAttribute("name","family_member_ca_qualification"+i);
		//txtBox.setAttribute("size","34");
		//txtBox.setAttribute("placeholder","Enter Qualification");
		txtBox.setAttribute("onchange","changeFont(this.id)");
		selectBox.setAttribute("id","familymember"+i);
		selectBox.setAttribute("name","familymember"+i)
		selectBox.setAttribute("onchange","changeFont(this.id)");
		removeBtn.setAttribute("class","btn_remove");
		removeBtn.setAttribute("type","button");
		removeBtn.setAttribute("id","removebtn"+i);
		removeBtn.setAttribute("name","removebtn"+i)
		removeBtn.setAttribute("value","DEL");
		removeBtn.setAttribute("onclick","removeDiv('div'+i)");
		div.appendChild(selectBox);
		div.innerHTML += ' ' ;	
		div.appendChild(txtBox);
		div.innerHTML += ' ' ;
		div.appendChild(removeBtn);
		div.appendChild(lineBreak);
		count.setAttribute("type","number");
		count.setAttribute("id","ca_count");
		count.setAttribute("name","ca_count");
		count.setAttribute("value",i);
		count.setAttribute("style","display:none");
		$('#ca_container').append(div);
		$('#ca_container').append(count);
		//$('#ca_container').append(div);
	});
											
	$(document).on('click','.btn_remove',function(){
		$("#div"+i).remove();
		
		i--;
		count.setAttribute("value",i);
	});
});

/*
var i = 5;
$(document).ready(function(){
	var count = document.createElement("input");
	$('#add_ca').click(function(){
		
		var div = document.createElement("div");
		var txtBox = document.createElement("select");
		var selectBox = document.createElement("select");
		var removeBtn = document.createElement("input");
		var lineBreak = document.createElement("br");
												
		populateSelectBox(selectBox);
		populateTxtBox(txtBox);
		div.setAttribute("id","div"+i);
		//txtBox.setAttribute("type","text");
		txtBox.setAttribute("id","family_member_ca_qualification"+i);
		txtBox.setAttribute("name","family_member_ca_qualification"+i);
		//txtBox.setAttribute("size","34");
		//txtBox.setAttribute("placeholder","Enter Qualification");
		txtBox.setAttribute("onchange","changeFont(this.id)");
		selectBox.setAttribute("id","familymember"+i);
		selectBox.setAttribute("name","familymember"+i)
		selectBox.setAttribute("onchange","changeFont(this.id)");
		removeBtn.setAttribute("class","btn_remove");
		removeBtn.setAttribute("type","button");
		removeBtn.setAttribute("id","removebtn"+i);
		removeBtn.setAttribute("name","removebtn"+i)
		removeBtn.setAttribute("value","DEL");
		removeBtn.setAttribute("onclick","removeDiv('div'+i)");
		div.appendChild(selectBox);
		div.innerHTML += ' ' ;	
		div.appendChild(txtBox);
		div.innerHTML += ' ' ;
		div.appendChild(removeBtn);
		div.appendChild(lineBreak);
		count.setAttribute("type","number");
		count.setAttribute("id","ca_count");
		count.setAttribute("name","ca_count");
		count.setAttribute("value",i);
		$('#ca_container').append(div);
		$('#ca_container').append(count);
		
		i++;
	});
	
											
	$(document).on('click','.btn_remove',function(){
		$("#div"+i-1).remove();
		
		count.setAttribute("value",i);
		i--;
	});
});

*/

//populate select box.
function populateSelectBox(s1){
	s1.innerHTML = "";
	var optionArray = ["|","Father|Father","Mother|Mother","Brother|Brother","Sister|Sister","Spouse|Spouse","Others|Other"];
	for(var opt in optionArray){
		var pair = optionArray[opt].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s1.options.add(newOption);
	}
}

// populate the selectbox s1.

function populateTxtBox(s1){
	s1.innerHTML = "";
	var optionArray = ["|","CA|CA","MBA|MBA"];
	for(var opt in optionArray){
		var pair = optionArray[opt].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s1.options.add(newOption);
	}
}

// make input and div element empty.
function makeInputAndDivEmpty(s1,s2,s3,s4){
	s1 = document.getElementById(s1);	
	s2 = document.getElementById(s2);
	s3 = document.getElementById(s3);
	s4 = document.getElementById(s4);
	s1.value = "";
	s2.value = "";
	s3.innerHTML = "";
	s4.innerHTML = "";
	
}	

// make the div element empty.
function makeDivEmpty(s1){
	s1 = document.getElementById(s1);
	s1.innerHTML = "";
	i = 1;
	
}									



										
// remove the whole div element.
function removeDiv(s1){
	s1 = document.getElementById(s1);
	s1.parentNode.removeChild(s1);
}



 
 
 // check entered value is positive or not
function isPositive(s1){
	var s1= document.getElementById(s1);
	if(s1.value < 0){
		alert("Enter a positive number");
		s1.value = "";
		
	}
}

// check the max limit.
function isMaxLimit(s1){
	var s1= document.getElementById(s1);
	if(s1.value > 5){
		alert("Maximum Limit is 5");
		s1.value = 0;
		
	}
}


//change font of value entered in s1.

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
