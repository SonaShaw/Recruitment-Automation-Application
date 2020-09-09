	
// set time limit of 10 minutes.
var timeLeft = 10*60;
function timeOut(){
	
	var min_t = Math.floor(timeLeft/60);
	
	var sec_t = timeLeft%60;
	var min = check(min_t);
	var sec = check(sec_t);
	var leftTime = min + ":" + sec;
	if(timeLeft<=0){
		clearTimeout(tm);
		document.getElementById("submit-test").submit();
		
	}else{
			
		document.getElementById("demo").innerHTML = leftTime;
	}
	timeLeft--;
	var tm = setTimeout(function(){timeOut()},1000);
}
function check(t){
	if(t<10){
		t = "0"+t;
	}
	return t;
}
	