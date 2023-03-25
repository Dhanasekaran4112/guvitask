
		$(document).ready(function(){
			$("#login-form").submit(function(event){
				// Prevent the form from submitting normally
				event.preventDefault();
				// Perform password validation
				var password = $("#password").val();
				if (!isValidPassword(password)) {
					alert("Invalid password! Your password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.");
					return;
				}
				// Submit the form
				this.submit();
			});

			function isValidPassword(password) {
				var uppercaseRegex = new RegExp(/[A-Z]/);
				var lowercaseRegex = new RegExp(/[a-z]/);
				var numberRegex = new RegExp(/[0-9]/);
				return password.length >= 8 && uppercaseRegex.test(password) && lowercaseRegex.test(password) && numberRegex.test(password);
			}
		});