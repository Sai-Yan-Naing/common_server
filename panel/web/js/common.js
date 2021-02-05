// new password reset popup

// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[id='new_pass_confirm']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      newpass: {
        required: true,
        minlength: 5
      },
      newpass_con: {
        required: true,
        minlength: 5,
        equalTo : "#newpass"
      }
    },
    // Specify validation error messages
    messages: {
      newpass: {
        required: "Please enter a password",
        minlength: "Your password must be at least 5 characters long"
      },
      newpass_con: {
        required: "Please enter confirm password",
        minlength: "Your confirm password must be at least 5 characters long",
        equalTo : "password does not match."
      },
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
    	var cf = confirm("パスワードが初期化されますがよろしいですか");
	// var r = confirm("パスワードが初期化されますがよろしいですか");
	if (cf) {
		form.submit();
	}
	event.preventDefault();
    }
  });

  // for login page
  $("form[id='login_confirm']").validate({
    rules: {
      domain_userid: {
        required: true,
      },
      password: {
        required: true,
        minlength: 5,      }
    },
    // Specify validation error messages
    messages: {
      domain_userid: {
        required: "Please enter domain or user ID",
        minlength: "Your password must be at least 5 characters long"
      },
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 5 characters long",
      },
    },
    submitHandler: function(form) {
		form.submit();
    }
  });

});