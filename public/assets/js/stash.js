//Fade in dashboard box
$(document).ready(function(){
  $('.box').hide().fadeIn(1000);
});

function basic_auth_logout(secUrl, redirUrl) {
  if (bowser.msie) {
      document.execCommand('ClearAuthenticationCache', 'false');
  } else if (bowser.gecko) {
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