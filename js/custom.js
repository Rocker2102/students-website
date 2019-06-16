$('.tab-link').click( function() {	// when element with class 'tab-link' is clicked, function is executed
	var tabID = $(this).attr('data-tab');	// variable 'tabID' is assigned the value assigned to the attribute 'data-tab' of the clicked 'tab-link'
	$(this).addClass('active').siblings().removeClass('active');	// class 'active' is added to the clicked 'tab-link' and class 'active' is removed from all its siblings
	$('#tab-'+tabID).addClass('active').siblings().removeClass('active');	// class 'active' is added to the div with id = 'tabID' and class 'active' is removed from all other sibling divs
});

// the functions 'attr()', 'addClass()', 'removeClass()', 'siblings()', ... and variable 'this' (is it a variable?) are probably pre-defined in the jQuery library

function login_pop () {
	document.getElementById('login_form').style.display = "block";
	document.getElementById('login_blur').style.filter = "blur(2px)";
}

function login_close () {
	document.getElementById('login_form').style.display = "none";
	document.getElementById('login_blur').style.filter = "blur(0px)";
}

// AJAX query for login (uses jQuery)
$('document').ready(function() {
	$("#login_submit").validate({
		/*
		rules: {
			password: {
				required: true,
			},
			user_email: {
				required: true,
				email: true
			},
		},
		messages: {
			password:{
			  required: "please enter your password"
			 },
			user_email: "please enter your email address",
		},
		*/
		submitHandler: submitForm	
	});

	function submitForm() {
		var data = $("#login_submit").serialize();
		$.ajax({
			type : 'POST',
			url : 'includes/login_submit.php',
			data : data,
				beforeSend: function(){
					//$("#error").fadeOut();
					$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">verified_user</i>VERIFYING');
					},
				success : function(response) {
					if(response == "login_correct"){
						$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">verified_user</i>LOGIN');
						setTimeout(' window.location.href = "welcome.php"; ',4000);
					} else {
						$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">error</i>UNABLE TO LOGIN');
					}
				}
		});
		return false;
	}
});