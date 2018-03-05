$(document).ready(function() {

	comeca();

});

var timerI = null;
var timerR = false;

function para() {
	if(timerR) {
		clearTimeout(timerI);
		timerR = false;
	}
}

function comeca() {
	para();
	list();
}

function list() {

	var xhr = new XMLHttpRequest();
	xhr.open('GET','pages/sys/list.php', true);	

	xhr.onreadystatechange = function() {

	 if (xhr.readyState === 4 && xhr.status === 200) {
	 	var response = xhr.responseText;
       $("#list").html(response);
	 }
	  
	};

	xhr.send(null);

	timerI = setTimeout("list()", 2000);
	timerR = true;
}