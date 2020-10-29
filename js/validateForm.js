function validateRequest(){

var subject = document.getElementById('formSubject');
var name = document.getElementById('formName');
var company = document.getElementById('formCompany');
var address = document.getElementById("formAddress");
var city = document.getElementById('formCity');
var state = document.getElementById('formState');
var zip = document.getElementById('formZip');
var AC = document.getElementById('formAC');
var exch = document.getElementById('formExch');
var num = document.getElementById('formNum');
var email = document.getElementById('formEmail');
var details = document.getElementById('formDetails');

	if(madeSelection(subject, "Please choose an area of interest")){
		if(isAlphabet(name, "Please enter only letters for your name")){
				if(isAlphanumeric(address, "Numbers and letters only for address")){
					if(isAlphanumeric(city, "Please enter a correct city")){
						if(isAlphanumeric(state, "Please enter a correct state")){
							if(isNumeric(zip, "Please enter a valid zip code")){
								if(emailValidator(email, "Please enter a valid email address")){
									return true;
								}
							}
						}
					}
				}
			
		}
	}
	
	
	return false;
	
}

function notEmpty(elem, helperMsg){
	if(elem.value == ""){
		alert(helperMsg);
		elem.focus(); // set the focus to this input
		return false;
	}
	return true;
}

function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function lengthRestriction(elem, min, max){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter between " +min+ " and " +max+ " characters");
		elem.focus();
		return false;
	}
}

function madeSelection(elem, helperMsg){
	if(elem.selectedIndex == "0"){
		alert(helperMsg);
		elem.focus();
		return false;
	}else{
		return true;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
