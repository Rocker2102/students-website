$('.tab-link').click( function() {	// when element with class 'tab-link' is clicked, function is executed
	var tabID = $(this).attr('data-tab');	// variable 'tabID' is assigned the value assigned to the attribute 'data-tab' of the clicked 'tab-link'
	$(this).addClass('active').siblings().removeClass('active');	// class 'active' is added to the clicked 'tab-link' and class 'active' is removed from all its siblings
	$('#tab-'+tabID).addClass('active').siblings().removeClass('active');	// class 'active' is added to the div with id = 'tabID' and class 'active' is removed from all other sibling divs
});

// the functions 'attr()', 'addClass()', 'removeClass()', 'siblings()', ... and variable 'this' (is it a variable?) are probably pre-defined in the jQuery library.

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
		beforeSend : function(){
			$("#logout_btn").html('<i class="material-icons header-icon">query_builder</i>Logging Out ...');
			},
		success : function(response) {
			var recieve = response.split(",");
			if(recieve[0] == "logout_confirmed"){
				$("#logout_btn").html('<i class="material-icons header-icon">query_builder</i>Login');
				setTimeout('window.location.href = "?loggedout";', 2000);
				alert_message = "User '" + recieve[1] + "' successfully logged out.";
				alert(alert_message);
			} else {
				alert("An unexpected error occurred!");
			}
		}
	});
	return false;
}

function menu_show() {
	$("#menu_hide").css({'display': 'none'});
	$("#menu_show").css({'display': 'block'});
	
}

function menu_hide() {
	$("#menu_hide").css({'display': 'block'});
	$("#menu_show").css({'display': 'none'});
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
					var img_loc = "images/profile_images/" + recieve[1] + ".png";
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

function edit(data) {
	var a = "p_data_" + data;
	var b = data + "_change";
	$("#" + a).css({'display': 'none'});
	$("#" + b).removeClass('profile_form');
}

function close_form(data) {
	var a = "p_data_" + data;
	var b = data + "_change";
	$("#" + a).css({'display': 'block'});
	$("#" + b).addClass('profile_form');
}

// AJAX Query for 'profile.php' using jQuery
function update(data) {
	var form_id = data + "_change";
	var a = data + "_submit_btn";
	var infoText = "<i class='material-icons header-icon' style='padding-right: 5px'>info</i>Some changes have been made to the profile. Please <b><a href='javascript:document.location.reload()'>REFRESH</a></b> to see updated information.";
	var errorText = "An error occurred. Please try again later !";
	
	if (form_id == "username_check_change") {
		form_id = "username_change";
	}

	var update_data = $("#" + form_id).serialize();
	var page_url = "includes/profile_update.php?update=" + data;
	var check = data;

	if(check == "password") {
		if($("#password_new").val() !== $("#password_conf").val()) {
			alert("Passwords do not match !");
			return;
		}
	}
	else {
		if(check == "username_check") {
			check = "username";
		}

		if($("#" + check).val().length === 0) {
			alert("Please fill the form fields !");
			return;
		}

		if(check == "sem") {
			if($("#sem").val() > 8 || $("#sem").val() < 1) {
				alert("Invalid value !");
				return;
			}
		}
	}
	
	$.ajax({
		type : 'POST',
		url : page_url,
		data : update_data,
		beforeSend : function(){
			if(data == "username_check") {
				$("#username_check_btn").html('<img src="images/loading.gif" class="loading_anim" style="width: 40px; height: 40px">');
			}
			else {
				$("#" + a).html('<i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>updating...');
			}
		},
		success : function(recieve) {
			var response = recieve.split(",");
			if(response[1] == undefined) {
				response[1] = "";
			}

			if(data == "username_check") {
				$("#username_check_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">update</i>check availability');
			}
			else {
				$("#" + a).html('<i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change');
			}

			if (response[0] == "error") {
				alert(errorText);
			}
			else if (response[0] == "nochange") {
				alert("No change in " + response[1]);
			}
			else if (response[0] == "updated") {
				alert(response[1] + " updated");
				showRefreshText();
			}
			else if (response[0] == "username_available") {
				$("#username_check_btn").removeClass('gradient-2');
				$("#username_check_btn").addClass('btn-available');
				$("#username_check_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">done</i>Available');
				setTimeout(function () {$("#username_check_btn").removeClass('btn-available');$("#username_check_btn").removeClass('btn-na');$("#username_check_btn").addClass('gradient-2');$("#username_check_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">update</i>check availability');}, 2000);

			}
			else if (response[0] == "username_na") {
				$("#username_check_btn").removeClass('gradient-2');
				$("#username_check_btn").addClass('btn-na');
				$("#username_check_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">close</i>Not Available');
				setTimeout(function () {$("#username_check_btn").removeClass('btn-available');$("#username_check_btn").removeClass('btn-na');$("#username_check_btn").addClass('gradient-2');$("#username_check_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">update</i>check availability');}, 2000);
			}
			else if (response[0] == "incorrect") {
				alert("Entered password is not correct !");
			}
			else {
				alert(response[0]);
			}

			function showRefreshText() {
				$("#update_info_text").css({'display': 'block'});
				$("#update_info_text").html(infoText);	
			}
		}
	});
}