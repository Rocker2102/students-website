// submit/save profile data
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
                $("#admin_refresh").css({'visibility': 'visible'});
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

// delete profile
function deleteProfile(id) {
    $(".delete_confirm").css({'display': 'block'});
    $("#del_uid").html('(uid = ' + id + ') profile?');

    $("#deleteClose").click(function(){
        $(".delete_confirm").css({'display': 'none'});
        $("#del_pass_conf").val("");
    });

    $("#delete_confirmed").click(function () {
        if ($("#del_pass_conf").val().length === 0) {
            customAlert(2500, "Please type Administrator Password", "orange", "warning", "orange");
        }
        else {
            function resetButton() {
                setTimeout(function () {
                    $("#delete_confirmed").html('<i class="material-icons btn-icon" style="padding-right: 10px">delete_sweep</i>confirm');
                    $("#delete_confirmed").attr("disabled", false);
                }, 3500);
            }

            $.ajax({
                url: "includes/admin_process.php?request=authenticate",
                type: 'POST',
                async: false,
                data: {'del_pass_conf': $("#del_pass_conf").val()},
                beforeSend: function(){
                    $("#delete_confirmed").html('<i class="material-icons btn-icon" style="padding-right: 10px">delete</i>deleting ...');
                    $("#delete_confirmed").attr("disabled", true);
                },
                success: function(recieve) {
                    response = recieve.split(",");
                    if (response[0] == "success" && response[1] != undefined){
                        $.ajax({
                            url: "includes/admin_process.php?request=delete&pid=" + id,
                            type: 'POST',
                            data: {'authid': response[1]},
                            success: function (data) {
                                text = data.split(",");
                                if (text[0] == "deleted") {
                                    customAlert(4000, "Account successfully deleted! Please wait...", "red", "success", "greenyellow");
                                    setTimeout(function(){location.reload(true);}, 3500);
                                }
                                else {
                                    customAlert(2500, "Error (Token/Session expired)", "red", "error", "red");
                                    resetButton();
                                }
                            }
                        });
                        return;
                    }
                    else if (response[0] == "incorrect") {
                        customAlert(2500, "Incorrect Password", "red", "error");
                        resetButton();
                    }
                    else if (response[0] == "invalid") {
                        customAlert(2500, "Invalid request", "red", "alert");
                        resetButton();
                    }
                    else if (response[0] == "empty") {
                        customAlert(2500, "Incomplete data", "red", "error", "red");
                        resetButton();
                    }
                    else {
                        customAlert(2500, "Error (Authentication Failed)", "red", "error", "red");
                        resetButton();
                    }
                }
            });
        }
    });  
}

function submitFForm(id) {
    //$(".btn-save").attr("disabled", true);
    var update_data = $("#f-form" + id).serialize();
    var send = "includes/admin_process.php?request=updatestatus&fid=" + id;

    function resetButtons() {
        $("#f-s" + id).html('<i class="material-icons btn-icon">save</i>SAVE');
        $(".btn-save").attr("disabled", false);
    }

    var fStatus = $("#f-status" + id).val();
    if (fStatus == "unsolved" || fStatus == "seen" || fStatus == "solved") {

    }
    else {
        customAlert(2500, "Invalid value for Status", "red", "warning", "#fff", "(unsolved, seen, solved)");
        resetButtons();
        return;
    }
    
    $.ajax({
        url: send,
        data: update_data,
        type: 'POST',
        beforeSend: function () {
            $("#f-s" + id).html('<img src="images/loading.gif" class="loading_anim_admin" style="width: 36px; height: 36px">');
            $(".btn-save").attr("disabled", true);
        },
        success: function (recieve) {
            var response = recieve.split(",");
            function resetButtons() {
                setTimeout(function() {
                    $("#f-s" + id).html('<i class="material-icons btn-icon">save</i>SAVE');$(".btn-save").attr("disabled", false);
                }, 1500);
            }
            
            if (response[0] == "updated") {
                customAlert(3000, "Status updated (id = " + response[1] + ")", "green", "success", "greenyellow");
                $("#admin_refresh").css({'visibility': 'visible'});
                resetButtons();
                return;
            }
            else if (response[0] == "no_change") {
                customAlert(2500,"No Change", "orange", "warning");
                resetButtons();
                return;
            }
            else if (response[0] == "invalid") {
                customAlert(2500, "An invalid value was sent", "red", "alert");
                resetButtons();
                return;
            }
            else if (response[0] == "empty") {
                customAlert(2500, "Complete information not recieved !", "red", "error");
                resetButtons();
                return;
            }
            else if (response[0] == "error") {
                customAlert(2500, "An error occurred", "red", "error");
                resetButtons();
                return;
            }
            else {
                customAlert(2500, recieve, "red", "error");
                resetButtons();
                return;
            }
        }
    });
}