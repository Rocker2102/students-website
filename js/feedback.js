if ($('#anonymous_btn_about_hide').click( function() {
    $("#anonymous_btn_about_hide").addClass('btn-hidden');
    $("#anonymous_btn_about_show").removeClass('btn-hidden');
    $("#feedback_about_hide").addClass('profile_form');
}));

if ($('#anonymous_btn_about_show').click( function() {
    $("#anonymous_btn_about_show").addClass('btn-hidden');
    $("#anonymous_btn_about_hide").removeClass('btn-hidden');
    $("#feedback_about_hide").removeClass('profile_form');
}));

if ($('#anonymous_btn_bug_hide').click( function() {
    $("#anonymous_btn_bug_hide").addClass('btn-hidden');
    $("#anonymous_btn_bug_show").removeClass('btn-hidden');
    $("#feedback_bug_hide").addClass('profile_form');
}));

if ($('#anonymous_btn_bug_show').click( function() {
    $("#anonymous_btn_bug_show").addClass('btn-hidden');
    $("#anonymous_btn_bug_hide").removeClass('btn-hidden');
    $("#feedback_bug_hide").removeClass('profile_form');
}));

$("#feedback_form_about").on('submit',(function(e) {
    e.preventDefault();
    var feed_data = $("#feedback_form_about").serializeArray();
    feed_data.push({ name: "type", value: "about"});
    if($("#anonymous_btn_about_hide").hasClass('btn-hidden')) {
        feed_data.push({ name: "anonymity", value: "true"});
    }
    else {
        feed_data.push({ name: "anonymity", value: "false"});
    }

    $.ajax({
		type : 'POST',
		url : 'includes/feedback_submit.php',
		data : feed_data,
		beforeSend : function(){
            $("#btn_about_submit").removeClass('gradient-2');
            $("#btn_about_submit").addClass('btn-nc');
            $("#btn_about_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>submitting...');
            $("#btn_about_submit").attr("disabled", true);
        },
        success : function(recieve) {
            var response = recieve.split(",");
            if (response[0] == "submitted") {
                $("#btn_about_submit").removeClass('btn-nc');
                $("#btn_about_submit").addClass('btn-available');
                $("#btn_about_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">done_all</i>submitted');
                setTimeout(function(){$("#btn_about_submit").attr("disabled", false);$("#btn_about_submit").removeClass('btn-available');$("#btn_about_submit").addClass('gradient-2');$("#btn_about_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">check</i>submit');}, 5000);
            }
            else if (response[0] == "empty") {
                $("#btn_about_submit").removeClass('btn-nc');
                $("#btn_about_submit").addClass('btn-na');
                $("#btn_about_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">error</i>Fill the fields completely !');
                setTimeout(function(){$("#btn_about_submit").attr("disabled", false);$("#btn_about_submit").removeClass('btn-na');$("#btn_about_submit").addClass('gradient-2');$("#btn_about_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">check</i>submit');}, 3000);
            }
            else {
                $("#btn_about_submit").removeClass('btn-nc');
                $("#btn_about_submit").addClass('btn-na');
                $("#btn_about_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">close</i>an error occurred');
                setTimeout(function(){$("#btn_about_submit").attr("disabled", false);$("#btn_about_submit").removeClass('btn-na');$("#btn_about_submit").addClass('gradient-2');$("#btn_about_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">check</i>submit');}, 3000);
            }
        }
    });
}));

$("#feedback_form_bug").on('submit',(function(e) {
    e.preventDefault();
    var feed_data = $("#feedback_form_bug").serializeArray();
    feed_data.push({ name: "type", value: "bug"});
    if($("#btn_bug_hide").hasClass('btn-hidden')) {
        feed_data.push({ name: "anonymity", value: "true"});
    }
    else {
        feed_data.push({ name: "anonymity", value: "false"});
    }
    $.ajax({
		type : 'POST',
		url : 'includes/feedback_submit.php',
		data : feed_data,
		beforeSend : function(){
			$("#btn_bug_submit").removeClass('gradient-2');
            $("#btn_bug_submit").addClass('btn-nc');
            $("#btn_bug_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">autorenew</i>submitting...');
            $("#btn_bug_submit").attr("disabled", true);
        },
        success : function(recieve) {
            var response = recieve.split(",");
            if (response[0] == "submitted") {
                $("#btn_bug_submit").removeClass('btn-nc');
                $("#btn_bug_submit").addClass('btn-available');
                $("#btn_bug_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">done_all</i>submitted');
                setTimeout(function(){$("#btn_bug_submit").attr("disabled", false);$("#btn_bug_submit").removeClass('btn-available');$("#btn_bug_submit").addClass('gradient-2');$("#btn_bug_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">check</i>submit');}, 5000);
            }
            else if (response[0] == "empty") {
                $("#btn_bug_submit").removeClass('btn-nc');
                $("#btn_bug_submit").addClass('btn-na');
                $("#btn_bug_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">error</i>Fill the fields completely !');
                setTimeout(function(){$("#btn_bug_submit").attr("disabled", false);$("#btn_bug_submit").removeClass('btn-na');$("#btn_bug_submit").addClass('gradient-2');$("#btn_bug_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">check</i>submit');}, 3000);
            }
            else {
                $("#btn_bug_submit").removeClass('btn-nc');
                $("#btn_bug_submit").addClass('btn-na');
                $("#btn_bug_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">close</i>an error occurred');
                setTimeout(function(){$("#btn_bug_submit").attr("disabled", false);$("#btn_bug_submit").removeClass('btn-na');$("#btn_bug_submit").addClass('gradient-2');$("#btn_bug_submit").html('<i class="material-icons btn-icon" style="padding-right: 10px">check</i>submit');}, 3000);
            }
        }
    });
}));