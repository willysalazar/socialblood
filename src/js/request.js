window.fbAsyncInit = function () {
    FB.init({
        appId: '953016768062580',
        xfbml: true,
        version: 'v2.3'
    });
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

var processaLogin = function () {
    FB.api('/me', function (response) {
        console.log('Successful login for: ' + response.name);
        $("#fb-name").html('Olá, ' + response.name + '!');
    });
};

var doLoginFB = function (force) {
    FB.getLoginStatus(function (response) {
        if (response.status === 'connected') {
            processaLogin();
            $("img").first().attr("src", "https://graph.facebook.com/" + response.authResponse.userID + "/picture")
        }
        else {
            FB.login();
        }
    });
};

$(document).ready(function () {
    $("#btn-share").click(function () {
        doLoginFB();
        
        FB.ui({
            method: 'share',
            display: 'dialog',
            href: 'http://socialblood.jacksonf.com.br/link.php?name=Jackson',
        }, function (response) {
            JSON.stringify(response)
        }
        );
    });

    $("#btn-login").click(function () {
        doLoginFB();
    })



})