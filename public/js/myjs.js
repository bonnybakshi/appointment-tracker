window.addEventListener("load", validate);
function validate(){
	var phone = document.getElementById("phone");
	/*waiting until the user has finished typing in the field (onchange) and then 
	reformat the string to xxx-xxx-xxxx */
	/*  \D? - match any character that's not a digit
	 *	\d{3} - match a digit [0-9]
	*/
	phone.addEventListener("change", function(evt){
		var value = evt.target.value;
		var pattern = /^\D?(\d{3})\D?(\d{3})\D?(\d{4})$/
		if(pattern.test(value)){
			// $1-$2-$3 - [parenthesized substring matches] (\d{3})-(\d{3})-(\d{4})
			evt.target.value = value.replace(pattern, "$1-$2-$3");
		} 
	});
}