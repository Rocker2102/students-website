$(window).on("load", function(){
    renderButton();
});

// modifies navbar according to status
function changeNav(status){
    if(status == 1){
        $("#d-logout-btn, #m-logout-btn").addClass("hide");
        $("#d-login-btn, #m-login-btn").removeClass("hide");
    }
    else{
        $("#d-login-btn, #m-login-btn").addClass("hide");
        $("#d-logout-btn, #m-logout-btn").removeClass("hide");
    }
}

// renders google-signin button
function renderButton() {
    gapi.load('auth2', function(){
        auth2 = gapi.auth2.init({
          client_id: '1044377424754-3kufvak79dlve75nasb9lo87i3t8p09n.apps.googleusercontent.com',
          cookiepolicy: 'single_host_origin'
        });
        attachSignin(document.getElementById('google-signin-btn'));
    });
}

// attaches the google-signin functionality with the button
function attachSignin(element){
    $("#g-signin-text").html("Sign-in with Google");
    auth2.attachClickHandler(element, {},
        function(googleUser){
            onSignIn(googleUser);
        },
        function(error){
            onFailure(error);
        }
    );
}

// fires when user signs in via google
function onSignIn(googleUser){
    var profile = googleUser.getBasicProfile();
    var id_token = googleUser.getAuthResponse().id_token;
    var profileId = profile.getId();
    let profileImg = profile.getImageUrl();
    let profileName = profile.getName();

    $.ajax({
        type: "POST",
        url: "db/oauth_login.php",
        timeout: 30000,
        data: {"id_token": id_token, "profile_id": profileId, "img": profileImg},
        timeout: 30000,
        beforeSend: function(){
            $("#g-signin-text").html("Signing in...");
        },
        success: function(receive){
            let data = "";
            try{
                JSON.parse(receive)
            }
            catch(e){
                $("#g-signin-text").html("Sign in with Google");
                showToast("Data Retrieve Error", "yellow black-text");
                return;
            }

            data = JSON.parse(receive);

            if(data.error == 0){
                userChip(profileImg, profileName);
                changeNav(0);
                $("#g-signin-text").html("Signed In");
                showToast("Signed in with Google", "green", "done_outline");
                $("#login-popup").modal("close");
            }
            else{
                $("#g-signin-text").html("Sign in with Google");
                showToast(data.info, "red");
            }
        },
        error: function(){
            showToast("Sign in failed!", "red");
            console.log(error);
        }
    });
}

// fires when google-signin fails
function onFailure(error){
    showToast("Sign in failed!", "red");
    console.log(error);
}

// fires when user signs-out (google)
function googleSignOut(){
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function(){
        showToast("Logged Out!", "yellow lighten-2 black-text", "error_outline");
    });
}

// initiates logout
function logout(){
    userChip("", "", -1);
    changeNav(1);
    $.getJSON(
        'db/logout.php',
        function(receive){
            if(receive.gStat == 1){
                googleSignOut();
            }
        }
    );
    $("#g-signin-text").html("Sign in with Google");
}

// fires when login form is submitted
$("#student-login").on("submit", function(e){
    e.preventDefault();

    if($("#login-username").val().length === 0){
        showToast("Enter Username", "red darken-4", "info");
        return;
    }
    if($("#login-password").val().length === 0){
        showToast("Enter password", "red darken-4", "info");
        return;
    }

    let loadingIcon = "<i class='material-icons left'>query_builder</i>";
    let errorIcon = "<i class='material-icons left'>close</i>";
    let origIcon = "<i class='material-icons left'>exit_to_app</i>"
    let submitBtn = "#student-login-submit-btn";
    let formData = Array();
    formData.push({name: "type", value: $("#login-type").val()});
    formData.push({name: "username", value: $("#login-username").val()});
    formData.push({name: "pwd", value: $("#login-password").val()});

    $.ajax({
        url: "db/login.php",
        method: "POST",
        data: formData,
        timeout: 30000,
        beforeSend: function(){
            $(submitBtn).removeClass("green red orange").addClass("orange").attr("disabled", true);
            $(submitBtn).html(loadingIcon + "Validating ...");
        },
        success: function(receive){
            $(submitBtn).attr("disabled", false);
            let data = "";
            try{
                JSON.parse(receive)
            }
            catch(e){
                $(submitBtn).removeClass("green red orange").addClass("red").attr("disabled", false);
                $(submitBtn).html(errorIcon + "Data Error");
                resetDiv(submitBtn, origIcon, "Login");
                return;
            }

            data = JSON.parse(receive);

            if(Number(data.error) == 0){
                userChip(data.imgData, data.name);
                changeNav(0);
                $(submitBtn).removeClass("green red orange").addClass("green");
                $(submitBtn).html(origIcon + "Login");
                resetDiv(submitBtn, origIcon, "Login");
                setVal("#login-username #login-password");
                if(data.admin = undefined)
                    showToast(data.info, "green", "done_all");
                else
                    showToast("Admin Login successfull", "green", "done_all");
                $("#login-popup").modal("close");
            }
            else{
                showToast(data.info, "red darken-1", "close");
                $(submitBtn).removeClass("green red orange").addClass("red");
                $(submitBtn).html(errorIcon + "Login Error");
                resetDiv(submitBtn, origIcon, "Login");
            }
        },
        error: function(){
            $(submitBtn).removeClass("green red orange").addClass("red").attr("disabled", false);
            $(submitBtn).html(errorIcon + "Login Error");
            resetDiv(submitBtn, origIcon, "Login");
        }
    });
});

// shows/hides user chips
function userChip(img, name, mode = 1){
    switch(mode){
        case 1: $("#user-img").attr("src", img); $("#user-name").html(name); $("#user-info").removeClass("hide"); break;
        default: $("#user-img").attr("src", ""); $("#user-name").html(""); $("#user-info").addClass("hide");
    }
}