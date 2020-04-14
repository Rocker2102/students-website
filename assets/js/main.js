$(window).on("load", function(){
    loadBreadcrumb();
});

/* JS Init. */
$(document).ready(function(){
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
function resetDiv(id, defIcon, defText, timeout = 1500){
    return setTimeout(function(){
        $(id).removeClass("green red orange");
        $(id).html(defIcon + defText);
    }, timeout);
}

/* set values to given ids */
function setVal(ids, customVal = ""){
    ids = ids.split(" ");
    for(i = 0; i < ids.length; i++)
        $(ids[i]).val(customVal);

    M.updateTextFields();
}

/* loads breadcrumb data stored in html page */
function loadBreadcrumb(){
    let len = breadcrumbData.name.length;
    let insertData = "";
    for(i = 0; i < len; i++){
        if(breadcrumbData.link[i] == "#!")
            linkData = "";
        else
            linkData = " href='" + breadcrumbData.link[i];
        insertData += "<a class='breadcrumb'" + linkData + "'><i class='material-icons left'></i>" + breadcrumbData.name[i] + "</a>"
    }
    $("#breadcrumbs").html(insertData);
}

/* simplifies usage of toasts */
function showToast(htmlData, classData, icon = "info"){
    let toastIcon = "<i class='material-icons left'>" + icon + "</i>";
    return M.toast({html: toastIcon + htmlData, classes: classData});
}

/* controls feedback modal */
$("#select-feedback").on("change", function (){
	if($(this).val() == "1"){
		$(".feedback-main").css({"display": "block"});
		$(".feedback-website").css({"display": "block"});
		$(".feedback-bug").css({"display": "none"});
	}
	else if($(this).val() == "2"){
		$(".feedback-main").css({"display": "block"});
		$(".feedback-bug").css({"display": "block"});
		$(".feedback-website").css({"display": "none"});
	}
});