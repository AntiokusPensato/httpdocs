var loggedIn = false;

document.getElementById('login').addEventListener('click', function() {

    if (loggedIn) {
        document.getElementById('welcome').innerHTML = "Welcome!";
        document.getElementById('login').innerHTML = "Log In";
        loggedIn = false;
    } else {
        document.getElementById('welcome').innerHTML = "Welcome, Trevor!";
        document.getElementById('login').innerHTML = "Log Out";
        loggedIn = true;
    }
});