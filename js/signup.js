$(".btn-next").click(function () {
    var formId = $(this).attr('form-index');
    var temp = Number(formId) + 1;
    if (temp > 2) {
        return;
    }
    else {
        $("div.active").addClass('hidden');
        $("#signup-tab-" + temp).removeClass('hidden').addClass('active');
    }
});

$(".btn-prev").click(function () {
    var formId = $(this).attr('form-index');
    var temp = Number(formId) - 1;
    if (temp < 1) {
        return;
    }
    else {
        $("div.active").addClass('hidden');
        $("#signup-tab-" + temp).removeClass('hidden').addClass('active');
    }
});