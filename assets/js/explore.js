/* fires when semester value is changed (to change the subjects menu) */
$("#search-sem").on("change", function(e){
    let currentSemValue = Number($(this).val());
    let currentMenu = "";
    let allOption = "<option value='' selected>All</option>";
    let sem1Menu = "<option value='cs11101'>Computer Science (CS11101)</option><option value='cs11102'>Introduction to Computer Systems (CS11102)</option><option value='ee11101'>Electrical Engineering (EE11101)</option><option value='hs11101'>Human Values & Effective Communication (HS11101)</option><option value='ma11101'>Mathematics (MA11101)</option><option value='ph11101'>Engineering Physics (PH11101)</option>";
    let sem2Menu = "<option value='cs12101'>Foundation of Computing (CS12101)</option><option value='cy12101'>Chemistry (CY12101)</option><option value='cy12102'>Environmental Studies (CY12102)</option><option value='ec12101'>Electronics and Communication (EC12101)</option><option value='hs12101'>Human Values & Effective Communication (HS12101)</option><option value='ma12101'>Mathematics (MA12101)</option>";
    let sem3Menu = "<option value='cs13101'>Data Structures & Algorithms (CS13101)</option><option value='cs13102'>Data Communication (CS13102)</option><option value='cs13103'>Digital Logic Design (CS13103)</option><option value='cs13104'>Object Oriented System Design (CS13104)</option><option value='cs13105'>Computational Mathematics (CS13105)</option><option value='cs13106'>Logic for Computer Science (CS13106)</option>";
    let sem4Menu = "<option value='cs14101'>Computer Networks (CS14101)</option><option value='cs14102'>Operating Systems (CS14102)</option><option value='cs14103'>Design & Analysis of Algorithms (CS14103)</option><option value='cs14104'>Computer Organization & Architecture (CS14104)</option><option value='cs14105'>Software Engineering (CS14105)</option><option value='cs14106'>Microprocessors & Microcontrollers (CS14106)</option>";
    let sem5Menu = "";
    let sem6Menu = "<option value='cs16101'>Cloud Computing (CS16101)</option><option value='cs16102'>Image Processing (CS16102)</option><option value='cs16103'>Cryptography and Network Security (CS16103)</option><option value='cs16104'>Machine Learning [Open Elective] (CS16104)</option><option value='cs16105'>Data Analytics (CS16105)</option><option value='hs16101'>Principles of Management (HS16101)</option>";
    let sem7Menu = "";
    let sem8Menu = "";

    switch(currentSemValue){
        case 1: currentMenu = allOption + sem1Menu; break;
        case 2: currentMenu = allOption + sem2Menu; break;
        case 3: currentMenu = allOption + sem3Menu; break;
        case 4: currentMenu = allOption + sem4Menu; break;
        case 6: currentMenu = allOption + sem6Menu; break;
        default: currentMenu = allOption; break;
    }

    $("#search-sub").html(currentMenu);
    $('select').formSelect();   /* re-initialize the materialize select menu to show updated '<select>' menu */
});

/* fires when search form is submitted */
$("#new-search").on("submit", function(e){
    e.preventDefault();

    $("#search-result-set").html("");
    $("#search-result-name").attr("data-badge-caption", "").html("-");
    $("#search-result-name").removeClass("orange green red blue black-text").addClass("orange");

    /* 'loaderData' is the minified version of a multi-color preloader */
    let loaderData = "<div class='preloader-wrapper active'><div class='spinner-layer spinner-blue'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div><div class='spinner-layer spinner-red'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div><div class='spinner-layer spinner-yellow'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div><div class='spinner-layer spinner-green'><div class='circle-clipper left'><div class='circle'></div></div><div class='gap-patch'><div class='circle'></div></div><div class='circle-clipper right'><div class='circle'></div></div></div></div>";

    /* 'formData' variable is used to store all the formdata collected (data is manually collected) */
    let formData = Array();
    formData.push({name: "sem", value: $("#search-sem").val()});
    formData.push({name: "batch", value: $("#search-batch").val()});
    formData.push({name: "subject", value: $("#search-sub").val()});
    formData.push({name: "type", value: $("#search-type").val()});
    formData.push({name: "name", value: $("#search-hint").val()});

    /* ajax request to search resources according to given search criteria */
    $.ajax({
        url: "db/searchResources.php",
        method: "POST",
        data: formData,
        timeout: 60000,
        beforeSend: function(){
            $("#result-preloader").html(loaderData);
            $("#result-preloader").fadeIn().removeClass("hide");
        },
        success: function(receive){
            $("#result-preloader").fadeOut();
            try {
                JSON.parse(receive);
            }
            catch(e) {
                showToast("Data Error!", "red white-text", "warning");
                return;
            }

            let data = JSON.parse(receive);

            if(Number(data.error) == 0){
                $("#search-result-set").html(data.collection);
                $("#search-result-name").attr("data-badge-caption", "Result(s)").html(data.numRows);
                $("#search-result-name").removeClass("orange green red blue black-text").addClass("green");
                showToast("Search query returned " + data.numRows + " result(s)", "green", "done_all");
            }
            else{
                $("#search-result-name").attr("data-badge-caption", "Result(s)").html("0");
                $("#search-result-name").removeClass("orange green red blue black-text").addClass("red");
                showToast(data.errorInfo, "red", "clear");
            }
        },
        error: function(){
            $("#result-preloader").fadeOut();
            $("#search-result-name").removeClass("orange green red blue black-text").addClass("red");
            showToast("Weak Connection", "red", "signal_wifi_off");
        }
    });
});