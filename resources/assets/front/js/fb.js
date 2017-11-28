window.fbLoaded = false;
window.response = null;
window.user = [];

function statusChangeCallback(response) {
  if (response.status === 'connected') {
    getUserDetails();
  } else if (response.status === 'not_authorized') {} else {}
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

window.fbAsyncInit = function() {
  FB.init({
    appId: facebook,
    status: true,
    cookie: true,
    xfbml: true,
    version: 'v2.5'
  });

  FB.Canvas.setSize();
  FB.Canvas.scrollTo(0, 0);
  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });


};

// Load the SDK asynchronously
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s);
  js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function getUserDetails() {
  FB.api('/me', {
    locale: 'en_US',
    fields: 'name, email'
  }, function(response) {
    $.each(response, function(index, value) {
      window.user[index] = value;
    });
    initialized();
  });
}

function fb_login() {
  FB.login(function(response) {
    if (response.authResponse) {
      getUserDetails();
    } else {
      //user hit cancel button
    }
  }, {
    scope: 'email,public_profile'
  });
}