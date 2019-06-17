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
	$("#login_submit").validate().resetForm();
}

function logout () {
	$.ajax({
		type : 'POST',
		url : 'includes/logout_process.php',
		success : function(response) {
			if(response == "logout_confirmed"){
				$("#logout_btn").html('<i class="material-icons header-icon">power_settings_new</i>Logging Out...');
				setTimeout('window.location.href = "?loggedout";', 1000);
			} else {
				
			}
		}
	});
	return false;
}

// AJAX query for login (uses jQuery)  [copied from 'phpzag.com']
$('document').ready(function() {
	$("#login_submit").validate({
		rules: {
			pwd: {
				required: true,
			},
			user: {
				required: true,
			},
		},
		messages: {
			pwd:{
			  required: "REQUIRED"
			 },
			user: "REQUIRED",
		},
		submitHandler: submitForm
	});

	function submitForm() {
		var data = $("#login_submit").serialize();
		$.ajax({
			type : 'POST',
			url : 'includes/login_submit.php',
			data : data,
			beforeSend : function(){
				$("#login_submit_btn").html('<img src="images/loading.gif" class="loading_anim" style="width: 46px; height: 46px">');
				},
			success : function(response) {
				var recieve = response.split(",");
				if(recieve[0] == "login_confirmed"){
					var img_loc = "images/profile_images/" + recieve[2] + ".png";
					$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">verified_user</i>LOGGED IN');
					$("#user_icon").attr("src",img_loc);	// Took help from 'w3 schools'
					setTimeout('window.location.href = "?loggedin";', 2000);
				} else {
					alert("Invalid Username or Password !");
					$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">swap_horiz</i>LOGIN');
				}
			}
		});
		return false;
	}
});