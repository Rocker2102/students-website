function customAlert(timeout = 2000, line1 = "NULL", borderColor = "red", alertType = "alert", textColor = "#fff", line2 = "NULL", line3 = "NULL") {
	var icon = "";
	if (alertType == "info") {
		icon = "<i class='material-icons'>info</i>";
	}
	else if (alertType == "warning") {
		icon = "<i class='material-icons'>warning</i>";
	}
	else if (alertType == "success") {
		icon = "<i class='material-icons'>done_all</i>";
	}
	else if (alertType == "timer") {
		icon = "<i class='material-icons'>schedule</i>";
	}
	else if (alertType == "error") {
		icon = "<i class='material-icons'>highlight_off</i>";
	}
	else {
		icon = "<i class='material-icons'>error_outline</i>";
	}
    
    var text1 = icon + line1;
    var text2 = line2;
	var text3 = line3;
	$(".custom_alert").css({'border': '2px solid ' + borderColor, 'display': 'block'});
	$(".custom_alert p").css({'color': textColor});
    if (line1 != "NULL") {
        $("#alertline1").html(text1);
    }
    if (line2 != "NULL") {
        $("#alertline2").html(text2);
    }
    if (line3 != "NULL") {
        $("#alertline3").html(text3);
    }

	setTimeout(function(){$(".custom_alert").css({'display': 'none'});$(".custom_alert p").html('');}, timeout);
	return line1;
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
				alertMessage = "User '" + recieve[1] + "' successfully logged out.";
				customAlert(2000, alertMessage, "green", "success", "greenyellow");
			} else {
				$("#logout_btn").html('<i class="material-icons header-icon">power_settings_new</i>Logout');
				customAlert(2500, "An unexpected error occurred", "red", "error", "red");
			}
		}
	});
}

function menu_show() {
	$("#menu_hide").css({'display': 'none'});
	$("#menu_show").css({'display': 'block'});
	
}

function menu_hide() {
	$("#menu_hide").css({'display': 'block'});
	$("#menu_show").css({'display': 'none'});
}

function login_pop () {
	$("#login_form").css({'display': 'block'});
	$("#login_blur").css({'filter': 'blur(2.5px)'});
}

function login_close () {
	$("#login_form").css({'display': 'none'});
	$("#login_blur").css({'filter': 'blur(0px)'});
	$("#user").val("");
	$("#pwd").val("");
}

// AJAX query for login (uses jQuery)  [copied from 'phpzag.com']
$("#login_submit").on('submit',(function(e) {
	e.preventDefault();

	if ($("#user").val().length === 0 || $("#pwd").val().length === 0) {
		customAlert(2000, "Enter Username and Password", "red", "info");
		return;
	}

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
				if(recieve[2] == "1") {
					var img_loc = "images/profile_images/" + recieve[1];
					$("#user_icon").attr("src",img_loc);	// Took help from 'w3 schools'
				}
				customAlert(3000, "LOGGED IN !", "green", "success", "greenyellow");
				$("#login_submit_btn").removeClass("gradient-2");
				$("#login_submit_btn").addClass("btn-available");
				$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">verified_user</i>LOGGED IN');
				setTimeout(function (){$("#login_submit_btn").addClass("gradient-2");$("#login_submit_btn").removeClass("btn-available");window.location.href = "?loggedin";}, 2000);
			}
			else if (recieve[0] == "login_failed") {
				customAlert(2500, "Incorrect username or password", "red", "alert");
				$("#login_submit_btn").removeClass("gradient-2");
				$("#login_submit_btn").addClass("btn-na");
				$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">close</i>UNABLE TO LOGIN');
				setTimeout(function () {$("#login_submit_btn").addClass("gradient-2");$("#login_submit_btn").removeClass("btn-na");$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">swap_horiz</i>LOGIN');}, 2000);
			}
			else {
				customAlert(2500, "An error occurred", "red", "info");
				$("#login_submit_btn").removeClass("gradient-2");
				$("#login_submit_btn").addClass("btn-na");
				$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">close</i>UNABLE TO LOGIN');
				setTimeout(function () {$("#login_submit_btn").addClass("gradient-2");$("#login_submit_btn").removeClass("btn-na");$("#login_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">swap_horiz</i>LOGIN');}, 2000);
			}
		}
	});
}));