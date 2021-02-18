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
                equalTo: "#newpass"
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
                equalTo: "password does not match."
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
                minlength: 5,
            }
        },
        // Specify validation error messages
        messages: {
            domain_userid: {
                required: "Please enter domain or user ID",
                minlength: "Your password must be at least 5 characters long",
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

    // For Domain Homepage
    $("form[id='domain-homepage']").validate({
        rules: {
            url: {
                required: true,
            },
            site_name: {
                required: true,
            },
            username: {
                required: true,
                maxlength: 255,
            },
            email: {
                required: true,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            },
            db_name: {
                required: true,
            },
            db_username: {
                required: true,
            },
            db_password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            url: {
                required: "Please enter URL link",

            },
            site_name: {
                required: "Please enter site name",

            },
            username: {
                required: "Please enter user name",
                maxlength: "Usernamr must be maximum 255 characters long",
            },
            email: {
                required: "Please enter email address",
            },
            password: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            },
            db_name: {
                required: "Please enter database name",

            },
            db_username: {
                required: "Please enter database username",
            },
            db_password: {
                required: "Please enter database password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("form[id='db-page']").validate({
        rules: {
            db_name: {
                required: true,
                minlength: 8,
                maxlength: 70,
            },
            user_name: {
                required: true,
                minlength: 8,
                maxlength: 70,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            db_name: {
                required: "Please enter database name",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Usernamr must be maximum 70 characters long",
            },
            username: {
                required: "Please enter user name",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Usernamr must be maximum 70 characters long",
            },
            password: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // For Free SSl
    $("form[id='free-ssl']").validate({
        rules: {
            common_name: {
                required: true,
            },
            prefecture: {
                required: true,
            },
            municipality: {
                required: true,
                maxlength: 255,
            },
            organization: {
                required: true,
            },
            department: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            common_name: {
                required: "Please enter common name",

            },
            prefecture: {
                required: "Please enter prefecture",
            },
            municipality: {
                required: "Please enter municipality",
            },
            organization: {
                required: "Please enter organization name",

            },
            department: {
                required: "Please enter department",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // For Add Directory
    $("form[id='add-directory']").validate({
        rules: {
            dir_path: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            dir_path: {
                required: "Please enter directory path",

            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    // For Dir Information
    $("form[id='dir-information']").validate({
        rules: {
            user: {
                required: true,
                maxlength: 14,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 70,
            }
        },
        // Specify validation error messages
        messages: {
            user: {
                required: "Please enter user name",
                maxlength: "Your name must be maximum 14 characters long",
            },
            password: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long",
                maxlength: "Your password must be maximum 70 characters long",
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});


$(document).ready(function(){
  $("#data-dropdown").click(function(){
    $("#data-item").toggle();
  });
});