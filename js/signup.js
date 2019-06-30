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
        }
        $("div.active").addClass('hidden');
        $("#signup-tab-" + temp).removeClass('hidden').addClass('active');
    }

    if (temp == 2) {
        var validate = validateForm('name', 'contact', 'email', 'dob');
        if(validate == 1) {
            success();
        }
        else {
            customAlert(3000, "Please fill the details completely", "red", "alert");
            return;
        }
    }
    else if (temp == 3) {
        var validate = validateForm('roll', 'username', 'password');
        if(validate == 1) {
            success();
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
        console.log(skip);
        console.log(validate);
        if(validate == 1) {
            success();
        }
        else {
            customAlert(3000, "Upload a picture or skip", "red", "alert");
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
    $.ajax({
        url: 'includes/signup_process.php',
        type: 'POST',
        data:  new FormData(this),
		contentType: false,
		cache: false,
        processData: false,
        beforeSend: function() {

        },
        success: function(recieve){
            var response = recieve.split(",");

        }
    });
}));