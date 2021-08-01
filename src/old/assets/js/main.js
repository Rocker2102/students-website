$(window).on("load", function() {
    loadBreadcrumb();
    updateVisitorData();
});

/* (Materialize) JS Init. */
$(document).ready(function() {
    $('textarea#textarea2').characterCounter();
    $('select').formSelect();
    $('.sidenav').sidenav();
    $('.modal').modal();
    $('.datepicker').datepicker();
    $('.fixed-action-btn').floatingActionButton();
    $('.tabs').tabs();
    $('.collapsible').collapsible();
});

/* to restore 'div' to default state according to given parameters */
function resetDiv(id, defIcon, defText, timeout = 1500) {
    return setTimeout(function() {
        $(id).removeClass("green red orange");
        $(id).html(defIcon + defText);
    }, timeout);
}

/* set values to given id's */
function setVal(ids, customVal = "") {
    ids = ids.split(" ");
    for (i = 0; i < ids.length; i++)
        $(ids[i]).val(customVal);

    M.updateTextFields();
}

/* loads breadcrumb data stored in html page */
function loadBreadcrumb() {
    let len = breadcrumbData.name.length;
    let insertData = "";
    for (i = 0; i < len; i++) {
        if (breadcrumbData.link[i] == "#!")
            linkData = "";
        else
            linkData = " href='" + breadcrumbData.link[i];
        insertData += "<a class='breadcrumb'" + linkData + "'><i class='material-icons left'></i>" + breadcrumbData.name[i] + "</a>"
    }
    $("#breadcrumbs").html(insertData);
}

/* simplifies usage of toasts */
function showToast(htmlData, classData = "blue white-text", icon = "info") {
    let toastIcon = "<i class='material-icons left'>" + icon + "</i>";
    return M.toast({html: toastIcon + htmlData, classes: classData});
}

/* controls feedback modal */
$("#select-feedback").on("change", function () {
	if ($(this).val() == "1") {
        $("#textarea-bug, #url-bug").attr("required", false);
        $("#textarea-website").attr("required", true);
		$(".feedback-website").css({"display": "block"});
		$(".feedback-bug").css({"display": "none"});
	} else if ($(this).val() == "2") {
        $("#textarea-website").attr("required", false);
        $("#textarea-bug, #url-bug").attr("required", true);
		$(".feedback-bug").css({"display": "block"});
		$(".feedback-website").css({"display": "none"});
    } else {
        showToast("JavaScript Error!", "red whte-text", "warning");
        return;
    }
});

/* validates and collects feedback data according to the chosen feedback type */
function getFeedbackData(type) {
    let name = "";
    let email = "";
    let url = "";
    let feedback = "";
    let obj = {};

    if ($("#feedback-name").val() != "" && $("#feedback-name").val().length != 0) {
        name = $("#feedback-name").val();
    }
    if ($("#feedback-email").val() != "" && $("#feedback-email").val().length != 0) {
        email = $("#feedback-email").val();
    }

    if (type == 1) {
        if ($("#textarea-website").val() != "" && $("#textarea-website").val().length != 0) {
            feedback = $("#textarea-website").val();
            obj = {
                type: type,
                name: name,
                email: email,
                feedback: feedback
            }
        } else {
            return false;
        }
    } else if (type == 2) {
        if (($("#url-bug").val() != "" && $("#url-bug").val().length != 0) && ($("#textarea-bug").val() != "" && $("#textarea-bug").val().length != 0)) {
            url = $("#url-bug").val();
            feedback = $("#textarea-bug").val();
            obj = {
                type: type,
                name: name,
                email: email,
                url: url,
                feedback: feedback
            }
        } else {
            return false;
        }
    } else {
        return false;
    }

    return obj;
}

/* fires when the feedback form is submitted */
$("#new-feedback").on("submit", function(e) {
    e.preventDefault();
    let type = $("#select-feedback").val();
    let formData = "";
    if (type == "1" || type == 1) {
        if (formData = getFeedbackData(1)) {

        } else {
            showToast("Invalid data!", "red white-text");
            return;
        }
    } else if (type == "2" || type == 2) {
        if (formData = getFeedbackData(2)) {

        } else {
            showToast("Invalid data!", "red white-text");
            return;
        }
    }
    else {
        showToast("JavaScript Error! Please refresh the page");
        return;
    }

    let submitBtn = $("#feedback-submit-btn");

    $.ajax({
        url: "db/submitFeedback.php",
        type: "POST",
        data: {"feedbackData": JSON.stringify(formData)},
        timeout: 30000,
        beforeSend: function() {
            submitBtn.attr("disabled", true);
        },
        success: function(receive) {
            submitBtn.attr("disabled", false);
            let data = "";
            try {
                JSON.parse(receive);
            } catch(e) {
                showToast("Data error!", "red white-text", "close");
                return;
            }

            data = JSON.parse(receive);
            if (data.error == 0) {
                showToast("Feedback submitted!", "green", "done_all");
                setVal("#feedback-name #feedback-email #textarea-website #url-bug #textarea-bug");
                return;
            } else {
                showToast(data.errorInfo, "red", "error");
                return;
            }
        },
        error: function() {
            submitBtn.attr("disabled", false);
            showToast("Server Error!", "red white-text", "close");
        }
    })
});