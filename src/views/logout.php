<html>
    <head><title>Sign Out</title></head>
    <body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bowser/1.9.4/bowser.min.js" type="text/javascript"></script>
    <script>
    document.onload = basic_auth_logout("https://stash.rakwireless.com/files/", "https://stash.rakwireless.com/");
    function basic_auth_logout(secUrl, redirUrl) {
    if (bowser.msie) {
        document.execCommand('ClearAuthenticationCache', 'false');
    } else if (bowser.gecko || bowser.blink) {
        $.ajax({
            async: false,
            url: secUrl,
            type: 'GET',
            username: 'logout'
        });
    } else if (bowser.webkit) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", secUrl, true);
        xmlhttp.setRequestHeader("Authorization", "Basic logout");
        xmlhttp.send();
    } else {
        alert("Logging out automatically is unsupported for " + bowser.name
            + "\nYou must close the browser to log out.");
    }
    setTimeout(function () {
        window.location.href = redirUrl;
    }, 200);
    }
</script>
    </body>
</html>