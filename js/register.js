$(document).ready(function() {
	$("#submit").click(function() {
	  var values = {
	'username': document.getElementById('username').value,
	'password': document.getElementById('password').value,
	'email': document.getElementById('email').value,
	'dob': document.getElementById('dob').value,
	'mobile': document.getElementById('mobile').value,
  };
  
  $.ajax({
	url: "register.php",
	type: "POST",
	
	data:values,
	success: function(result){
  alert(result);
  }
  });
  
	})
  });