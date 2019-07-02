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
    if (sem < 1 || sem > 8) {
        customAlert(2000, "Invalid value for Semester", "red", "warning");
        resetButtons();
        return;
    }
    if (adminStatus== "true" || adminStatus== "false") {

    }
    else {
        customAlert(2500, "Invalid value for Admin Status", "red", "warning", "#fff", "(true, false)");
        resetButtons();
        return;
    }
    if (verStatus== "verified" || verStatus== "not_verified" || verStatus == "verifying") {

    }
    else {
        customAlert(2500, "Invalid value for Verification Status", "red", "warning", "#fff", "(not_verified, verifying, verified)");
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
                $("#" + formId).html('<i class="material-icons btn-icon">save</i>SAVE');
                $(".btn-save").attr("disabled", false);
            }
            resetButtons();
            customAlert(3000, recieve, "red", "error", "orange");
        }
    });
}