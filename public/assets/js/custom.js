/** login */
$("#loginButton").on("click", function () {
    let siteKey = $("#siteKey").val();
    grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, {action: 'login'}).then(function(token) {
            $("#loginForm").prepend('<input type="hidden" name="gRecaptchaResponse" value="' + token + '">');
            $("#loginForm").submit();
        });;
    });    
});

$("#loginForm").on("keypress", function(e) {
    if ( e.which == 13 )
        $("#loginButton").click();
});


/** lostpassword */
$("#lostPasswordButton").on("click", function () {
    let siteKey = $("#siteKey").val();
    grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, {action: 'lostPassword'}).then(function(token) {
            $("#lostPasswordForm").prepend('<input type="hidden" name="gRecaptchaResponse" value="' + token + '">');
            $("#lostPasswordForm").submit();
        });;
    });    
});
