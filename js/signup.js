$(".btn-next").click(function () {
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
        $("div.active").addClass('hidden');
        $("#signup-tab-" + temp).removeClass('hidden').addClass('active');
    }

    var formId = $(this).attr('next-index');
    var temp = Number(formId) + 1;
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
        if(validate == 1) {
            success();
       }
       else {
            customAlert(3000, "Please fill the details completely", "red", "alert");
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