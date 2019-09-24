document.addEventListener("DOMContentLoaded", navbar);
let httpRequest;

function navbar() {

    var homeButton = document.getElementById("navHome");
    var uploadButton = document.getElementById("navUpload");
    var logoutButton = document.getElementById("navLogout");
    var loginButton = document.getElementById("navLogin");
    var signinButton = document.getElementById("navSignin");
    var settingsButton = document.getElementById("navSettings");

	if (homeButton)
        homeButton.addEventListener("click", goToHome);
    if (homeButton)
        homeButton.addEventListener("click", goToHome);
    if (homeButton)
        homeButton.addEventListener("click", goToHome);
    if (homeButton)
        homeButton.addEventListener("click", goToHome);
}