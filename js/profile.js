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
			customAlert(3000, "Passwords do not match", "red", "error");
			return;
		}
	}
	else {
		if(check == "username_check") {
			check = "username";
		}

		if($("#" + check).val().length === 0) {
			customAlert(3000, "Please fill the details completely", "red", "alert");
			return;
		}

		if(check == "sem") {
			if($("#sem").val() > 8 || $("#sem").val() < 1) {
				customAlert(3000, "Invalid Value", "orange", "warning");
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
				customAlert(4000, errorText, "red", "error", "red");
			}
			else if (response[0] == "nochange") {
				customAlert(2000, "No change", "orange", "info", "orange");
				var c = response[1] + "_submit_btn";
				$("#" + c).removeClass('gradient-2');
				$("#" + c).addClass('btn-nc');
				$("#" + c).html('<i class="material-icons btn-icon" style="padding-right: 10px">info</i>no change');
				setTimeout(function () {$("#" + c).removeClass('btn-nc');$("#" + c).addClass('gradient-2');$("#" + c).html('<i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>change');}, 2000);
			}
			else if (response[0] == "updated") {
				customAlert(4000, response[1] + " updated", "greenyellow", "success", "greenyellow");
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
				customAlert(3000, "Entered password is not correct", "red", "info", "red");
			}
			else {
				customAlert(3000, response[0], "red", "error", "red");
			}

			function showRefreshText() {
				$("#update_info_text").css({'display': 'block'});
				$("#update_info_text").html(infoText);	
			}
		}
	});
}

$("#pp_change").on('submit',(function(e) {
	var infoText = "<i class='material-icons header-icon' style='padding-right: 5px'>info</i>Some changes have been made to the profile. Please <b><a href='javascript:document.location.reload()'>REFRESH</a></b> to see updated information.";
	e.preventDefault();
	$.ajax({
		url: "includes/upload.php?pp=upload",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		beforeSend: function(){
			$("#pp_submit_btn").removeClass('gradient-2');
			$("#pp_submit_btn").addClass('btn-nc');
			$("#pp_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">watch_later</i>uploading ...');
			$("#pp").attr("disabled", true);
			$("#pp_submit_btn").attr("disabled", true);
	 	},
		success: function(recieve) {
			var response = recieve.split(",");
			if(response[0] == "success") {
				customAlert(3000, "Profile picture updated", "greenyellow", "success", "greenyellow");
				$("#pp_submit_btn").removeClass('gradient-2');
				$("#pp_submit_btn").removeClass('btn-nc');
				$("#pp_submit_btn").addClass('btn-available');
				$("#pp_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">done_all</i>uploaded');
				showRefreshText();
				setTimeout(function () {$("#pp").attr("disabled", false);$("#pp_submit_btn").attr("disabled", false);$("#pp_submit_btn").removeClass('btn-available');$("#pp_submit_btn").addClass('gradient-2');$("#pp_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">cloud_upload</i>upload');}, 2000);
			}
			else {
				customAlert(4000, "Invalid file | Empty File | File Size > 1 MB", "red", "warning", "orange");
				$("#pp_submit_btn").removeClass('gradient-2');
				$("#pp_submit_btn").removeClass('btn-nc');
				$("#pp_submit_btn").addClass('btn-na');
				$("#pp_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">close</i>invalid | empty | size > 1 MB');
				setTimeout(function () {$("#pp").attr("disabled", false);$("#pp_submit_btn").attr("disabled", false);$("#pp_submit_btn").removeClass('btn-na');$("#pp_submit_btn").addClass('gradient-2');$("#pp_submit_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">cloud_upload</i>upload');}, 2000);
			}

			function showRefreshText() {
				$("#update_info_text").css({'display': 'block'});
				$("#update_info_text").html(infoText);	
			}
		}
	});
}));

$("#pp_delete_btn").click(function () {
	var infoText = "<i class='material-icons header-icon' style='padding-right: 5px'>info</i>Some changes have been made to the profile. Please <b><a href='javascript:document.location.reload()'>REFRESH</a></b> to see updated information.";
	$.ajax({
		url: "includes/upload.php?pp=delete",
		beforeSend: function(){
			$("#pp_delete_btn").addClass('btn-nc');
			$("#pp_delete_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">delete_sweep</i>deleting ...');
			$("#pp").attr("disabled", true);
			$("#pp_delete_btn").attr("disabled", true);
			$("#pp_submit_btn").attr("disabled", true);
	 	},
		success: function(recieve) {
			var response = recieve.split(",");
			if(response[0] == "deleted") {
				customAlert(2000, "Profile picture deleted", "red", "success", "greenyellow");
				$("#pp_delete_btn").removeClass('btn-na');
				$("#pp_delete_btn").removeClass('btn-nc');
				$("#pp_delete_btn").addClass('btn-available');
				$("#pp_delete_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">delete</i>Deleted');
				showRefreshText();
				setTimeout(function () {$("#pp").attr("disabled", false);$("#pp_submit_btn").attr("disabled", false);$("#pp_delete_btn").attr("disabled", false);$("#pp_delete_btn").removeClass('btn-available');$("#pp_delete_btn").addClass('btn-na');$("#pp_delete_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">delete_forever</i>delete profile picture');}, 2000);
			}
			else if (response[0] == "img_na") {
				customAlert(2000, "No profile picture", "red", "warning");
				$("#pp_delete_btn").removeClass('btn-na');
				$("#pp_delete_btn").addClass('btn-nc');
				$("#pp_delete_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">warning</i>no profile picture');
				setTimeout(function () {$("#pp").attr("disabled", false);$("#pp_submit_btn").attr("disabled", false);$("#pp_delete_btn").attr("disabled", false);$("#pp_delete_btn").removeClass('btn-nc');$("#pp_delete_btn").removeClass('btn-available');$("#pp_delete_btn").addClass('btn-na');$("#pp_delete_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">delete_forever</i>delete profile picture');}, 2000);
			}
			else {
				$("#pp_delete_btn").removeClass('btn-nc');
				$("#pp_delete_btn").addClass('btn-na');
				$("#pp_delete_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">close</i>error');
				setTimeout(function () {$("#pp").attr("disabled", false);$("#pp_submit_btn").attr("disabled", false);$("#pp_delete_btn").attr("disabled", false);$("#pp_delete_btn").removeClass('btn-available');$("#pp_delete_btn").addClass('btn-na');$("#pp_delete_btn").html('<i class="material-icons btn-icon" style="padding-right: 10px">delete_forever</i>delete profile picture');}, 2000);
			}

			function showRefreshText() {
				$("#update_info_text").css({'display': 'block'});
				$("#update_info_text").html(infoText);	
			}
		}
	});
});