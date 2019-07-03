function submitForm(id) {
    $(".btn-save").attr("disabled", true);
    var formId = id;
    var update_data = $("#form" + formId).serialize();
    var send = "includes/admin_process.php?uid=" + formId;

    function resetButtons() {
        $("#" + formId).html('<i class="material-icons btn-icon">save</i>SAVE');
        $(".btn-save").attr("disabled", false);
    }

    var info = ["name", "contact", "email", "dob", "roll", "user"];
    for (i = 0; i < info.length; i++) {
        if ($("#" + info[i] + id).val().length === 0) {
            customAlert(2000, "Fill the details completely", "red", "alert");
            resetButtons();
            return;
        }
    }

    // client-side validation
    var sem = Number($("#sem" + id).val());
    var adminStatus = $("#admin" + id).val();
    var verStatus = $("#ver" + id).val();
    var roll = $("#roll" + id).val().toUpperCase();
    var contact = $("#contact" + id).val();

    if (sem < 1 || sem > 8) {
        customAlert(2000, "Invalid value for Semester", "red", "warning");
        resetButtons();
        return;
    }
    if (adminStatus == "true" || adminStatus == "false") {

    }
    else {
        customAlert(2500, "Invalid value for Admin Status", "red", "warning", "#fff", "(true, false)");
        resetButtons();
        return;
    }
    if (verStatus == "verified" || verStatus == "not_verified" || verStatus == "verifying") {

    }
    else {
        customAlert(2500, "Invalid value for Verification Status", "red", "warning", "#fff", "(not_verified, verifying, verified)");
        resetButtons();
        return;
    }
    if(roll.length === 9) {
        if (roll[0] !== "B") {
            customAlert(3000, "First letter should be 'B'", "red", "info");
            resetButtons();
            return;
        }
        var branch = roll.substring(7);
        var branches = ["CS", "EC", "EE", "ME", "CE"];
        if (!branches.includes(branch)) {
            console.log(branch);
            customAlert(3000, "Invalid Branch", "orange", "warning");
            resetButtons();
            return;
        }
    }
    else {
        customAlert(3000, "Invalid Format for Roll Number", "orange", "warning");
        resetButtons();
        return;
    }
    if (contact.length !== 10) {
        customAlert(3000, "Invalid Contact", "orange", "warning");
        resetButtons();
        return;
    }

    $.ajax({
        url: send,
        data: update_data,
        type: 'POST',
        beforeSend: function () {
            $("#" + formId).html('<img src="images/loading.gif" class="loading_anim_admin" style="width: 36px; height: 36px">');
            $(".btn-save").attr("disabled", true);
        },
        success: function (recieve) {
            var response = recieve.split(",");
            function resetButtons() {
                setTimeout(function() {
                    $("#" + formId).html('<i class="material-icons btn-icon">save</i>SAVE');$(".btn-save").attr("disabled", false);
                }, 1500);
            }
            
            if (response[0] == "updated") {
                customAlert(3000, "Information updated (uid = " + response[1] + ")", "green", "success", "greenyellow");
                resetButtons();
                return;
            }
            else if (response[0] == "no_change") {
                customAlert(2500, response[1], "orange", "warning");
                resetButtons();
                return;
            }
            else if (response[0] == "invalid") {
                if (response[1] == "sem") {
                    response[1] = "semester";
                }
                else if (response[1] == "admin") {
                    response[1] = "'Admin Status'";
                }
                else if (response[1] == "ver") {
                    response[1] = "'Verification Status'";
                }

                customAlert(2500, "Value of " + response[1] + " was not accepted", "red", "alert");
                resetButtons();
                return;
            }
            else if (response[0] == "duplicate") {
                customAlert(2500, "Duplicate value for " + response[1], "red", "alert");
                resetButtons();
                return;
            }
            else if (response[0] == "empty") {
                customAlert(2500, "Complete information not recieved ! (uid = " + response[1] + ")", "red", "error");
                resetButtons();
                return;
            }
            else if (response[0] == "error") {
                if (response[1] == "uid") {
                    customAlert(2500, "An error occurred", "red", "error");
                    resetButtons();
                    return;
                }
                else if (response[1] == "unknown") {
                    customAlert(2500, "An unknown error occurred", "red", "error");
                    resetButtons();
                    return;
                }
                else {
                    customAlert(2500, "An error occurred (unknown reason)", "red", "error");
                    resetButtons();
                    return;
                }
            }
            else {
                customAlert(2500, "An unknown error occurred", "red", "error");
                resetButtons();
                return;
            }
        }
    });
}

function deleteProfile(id) {
    $(".delete_confirm").css({'display': 'block'});

    $("#deleteClose").click(function(){
        $(".delete_confirm").css({'display': 'none'});
    });

    $("#delete_confirmed").click(function () {
        console.log(id);
        if ($("#del_pass_conf").val().length === 0) {
            customAlert(2500, "Please type your password", "orange", "warning", "orange");
        }
        else {
            $.ajax({
                url: "includes/admin_process.php?request=delete&uid=" + id,
                type: 'POST',
                data: {'del_pass_conf': $("#del_pass_conf").val()},
                beforeSend: function(){
                    $("#del_pass_conf").attr("disabled", true);
                },
                success: function(recieve) {
                    response = recieve.split(",");
                    if (response[0] == "deleted"){
                        customAlert(4000, "Account successfully deleted! Please wait...", "red", "success", "greenyellow");
                        setTimeout(function(){location.reload(true);}, 4200);
                    }
                    else if (response[0] == "incorrect") {
                        customAlert(2500, "Incorrect Password", "red", "error");
                        setTimeout(function(){$("#del_pass_conf").attr("disabled", false);}, 2700);
                    }
                    else if (response[0] == "empty") {
                        customAlert(2500, "Please type your password", "orange", "warning", "orange");
                        setTimeout(function(){$("#del_pass_conf").attr("disabled", false);}, 2700);
                    }
                    else {
                        customAlert(2500, "An error occurred", "red", "error", "red");
                        setTimeout(function(){$("#del_pass_conf").attr("disabled", false);}, 2700);
                    }
                }
            });
        }
    });  
}