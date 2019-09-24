document.addEventListener("DOMContentLoaded", navbar);
let httpRequest;

function navbar() {

    var logoutButton = document.getElementById("navLogout");

    if (logoutButton)
        logoutButton.addEventListener("click", logout);
}

function logout() {
	document.location.href = "./index.php";
}
