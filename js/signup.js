$(".btn-next").click(function () {
    var formId = $(this).attr('next-index');
    var skipAttr = $(this).attr('skip-index');
    var temp = Number(formId) + 1;
    var skip = "false";

    if (skipAttr !== undefined && skipAttr !== false) {
        skip = 'true';
    }
    
    function validateForm(a = "0", b = "0", c = "0", d = "0") {
        if (a != "0"){
            if ($("#" + a).val().length === 0) {
                return 0;
            }
        }
        if (b != "0"){
            if ($("#" + b).val().length === 0) {
                return 0;
            }
        }
        if (c != "0"){
            if ($("#" + c).val().length === 0) {
                return 0;
            }
        }
        if (d != "0"){
            if ($("#" + d).val().length === 0) {
                return 0;
            }
        }
        return 1;
    }

    function validateServer(request, a = "0") {
        var check = 0;
        var send = 'includes/signup_process.php?request=' + request + "&" + a + "=" + $("#" + a).val();
        $.ajax({
            url: send,
            async: false,
            success: function(recieve){
                var response = recieve.split(",");
                if (response[0] == "available") {
                    check = 1;
                }
                else {
                    check = 0;
                }
            }
        });
        return check;
    }

    function success() {
        if (temp == 4) {
            var info = ["name", "contact", "email", "dob", "roll", "username", "password"];
            for (i = 0; i < info.length; i++) {
                var temp_info = info[i].toUpperCase();
                var hiddenIcon = "<a href='javascript:void(0)' onclick='javascript:showPassword()'><i class='show-icon material-icons'>visibility</i></a>";
                if (temp_info == "ROLL") {
                    temp_info = "ROLL NUMBER";
                }
                if (temp_info == "PASSWORD") {
                    $("#s_" + info[i]).html(Number(i+1) + ". " + temp_info + ": " + hiddenIcon);
                }
                else {
                    $("#s_" + info[i]).html(Number(i+1) + ". " + temp_info + ": " + $("#" + info[i]).val());
                }   
            }
            if ($("#pp").val().length === 0) {
                $("#s_pp").html(Number(i+1) + ". PROFILE PICTURE: [NONE]");
            }
            else {
                $("#s_pp").html(Number(i+1) + ". PROFILE PICTURE: [SET]");
            }
        }
        $("div.active").addClass('hidden');
        $("#signup-tab-" + temp).removeClass('hidden').addClass('active');
    }

    if (temp == 2) {
        var validate = validateForm('name', 'contact', 'email', 'dob');
        
        if(validate == 1) {
            if (validateServer('emailCheck','email') == 1 && validateServer('contactCheck','contact') == 1) {
                success();
            }
            else {
                customAlert(3000, "Duplicate entry for email or contact", "orange", "warning");
            }
        }
        else {
            customAlert(3000, "Please fill the details completely", "red", "alert");
            return;
        }
    }
    else if (temp == 3) {
        var validate = validateForm('roll', 'username', 'password');
        if(validate == 1) {
            if (validateServer('rollCheck','roll') == 1 && validateServer('usernameCheck','username') == 1) {
                success();
            }
            else {
                customAlert(3000, "Duplicate entry for username or roll number", "orange", "warning");
            }
        }
        else {
            customAlert(3000, "Please fill the details completely", "red", "alert");
            return;
        }
    }
    else if (temp == 4) {
        var validate = validateForm('pp');
        if (skip == 'true') {
            validate = 1;
        }
        
        if(validate == 1) {
            success();
        }
        else {
            customAlert(3000, "Upload a picture or skip this step", "red", "alert");
            return;
        }
    }
    else if (temp > 5) {
        return;
    }
    else {
        return;
    }
});

$(".btn-prev").click(function () {
    var formId = $(this).attr('prev-index');
    var temp = Number(formId) - 1;
    if (temp < 1) {
        return;
    }
    else {
        $("div.active").addClass('hidden');
        $("#signup-tab-" + temp).removeClass('hidden').addClass('active');
    }
});

function showPassword() {
    var showIcon = "<a href='javascript:void(0)' onclick='javascript:hidePassword()'><i class='show-icon material-icons'>visibility_off</i></a>";
    $("#s_password").html('7. PASSWORD: ' + $("#password").val() + showIcon);
}

function hidePassword() {
    var hiddenIcon = "<a href='javascript:void(0)' onclick='javascript:showPassword()'><i class='show-icon material-icons'>visibility</i></a>";
    $("#s_password").html('7. PASSWORD: ' + " " + hiddenIcon);
}

$("#signup_submit").on('submit',(function(e) {
    e.preventDefault();
    var send = 'includes/signup_process.php?request=complete';

    if ($("#pp").val().length === 0){
        send = send + "&pp=false";
    }
    else {
        send = send + "&pp=true";
    }

    $.ajax({
        url: send,
        type: 'POST',
        data:  new FormData(this),
		contentType: false,
		cache: false,
        processData: false,
        beforeSend: function() {
            $(".btn").attr("disabled", true);
            $("#signup_form_submit_btn").removeClass('gradient-2').addClass('btn-nc');
            $("#signup_form_submit_btn").html('<i class="material-icons btn-icon">autorenew</i>submitting ...');
        },
        success: function(recieve){
            function submitSuccess() {
                $("#signup_form_submit_btn").removeClass('btn-nc gradient-2').addClass('btn-available');
                $("#signup_form_submit_btn").html('<i class="material-icons btn-icon">done</i>submitted');
                setTimeout(function(){location.reload(true)}, 4000);
            }

            function submitFailure() {
                $("#signup_form_submit_btn").removeClass('btn-nc gradient-2').addClass('btn-na');
                $("#signup_form_submit_btn").html('<i class="material-icons btn-icon">close</i>unable to submit');
            }

            function resetButtons() {
                setTimeout(function(){
                    $(".btn").attr("disabled", false);
                    $("#signup_form_submit_btn").removeClass('btn-na btn-available').addClass('gradient-2');
                    $("#signup_form_submit_btn").html('<i class="material-icons btn-icon">done</i>submit');
                }, 4000);
            }

            var response = recieve.split(",");

            if (response[0] == "success") {
                submitSuccess();
                if (response[1] == -1) {
                    customAlert(4000, "Successfully signed up but failed to upload profile picture", "orange", "success", "greenyellow");
                }
                else if (response[1] == 0 || response[1] == 1) {
                    customAlert(4000, "Successfully signed up. Please wait...", "green", "success", "greenyellow");
                }
                else {
                    return;
                }
            }
            else if (response[0] == "error") {
                customAlert(4000, "An error occurred !", "red", "error", "red");
                submitFailure();
                resetButtons();
                console.log("error: " + response[0] + " " +  response[1] + " " + response[2]);
            }
            else if (response[0] == "invalid") {
                submitFailure();
                resetButtons();
                customAlert(4000, "Invalid profile picture of Size exceeds 1 MB", "warning", "error");
            }
            else {
                submitFailure();
                resetButtons();
                customAlert(4000, "An unknown error occurred !", "red", "error", "red");
                console.log(response[0] + response[1] + response[2]);
            }
        }
    });
}));