//we create a function to validate our form
//we will call the function when the form is submitted

function validateForm(){
	var fname=document.forms["user_details"]["first_name"].value;
	var lname=document.forms["user_details"]["last_name"].value;
	var city=document.forms["user_details"]["city_name"].value;

	//note: user_details is the name of our form
	if (fname==null || lname=="" || city=="") {
		alert("all details required were not supplied");
		return false;
	}
	return true;
}