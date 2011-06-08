$(document).ready(function() {
	
	/* Add contact page validation */
	$("form#addContact").validate({
		rules: {
			firstname: "required",
			lastname: "required",
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				email: true
			},
			agree: "required"
		},
		messages: {
			firstname: "Please enter your firstname",
			lastname: "Please enter your lastname",
			username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			agree: "Please accept our policy"
		},
			errorPlacement: function(error, element) {
         if ( element.is(":radio") )
	             error.appendTo( element.parent().next().next() );
	     else if ( element.is(":checkbox") )
	             error.appendTo ( element.next() );
	     else
				error.appendTo( element.parent().next() );
		}
	});
	
	
	/* Profile page validation */
	$("form#updateProfile").validate({
		rules: {
			password: {
				minlength: 5
			},
			confirm_password: {
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				email: true
			}
		},
		messages: {
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address"
		},
		errorPlacement: function(error, element) {
         if ( element.is(":radio") )
	             error.appendTo( element.parent().next().next() );
	     else if ( element.is(":checkbox") )
	             error.appendTo ( element.next() );
	     else
				error.appendTo( element.parent().next() );
		}
	});

});
