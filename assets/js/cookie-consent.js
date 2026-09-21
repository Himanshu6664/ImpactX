document.addEventListener("DOMContentLoaded", function () {

    const banner = document.getElementById("cookie-banner");
    const acceptButton = document.getElementById("accept-cookies");
    const rejectButton = document.getElementById("reject-cookies");

    const cookieConsent = localStorage.getItem("cookieConsent");

    // Hide banner if the user has already made a choice
    if (cookieConsent !== null) {
        banner.style.display = "none";
    }

    // Accept cookies
    acceptButton.addEventListener("click", function () {
        localStorage.setItem("cookieConsent", "accepted");
        banner.style.display = "none";
    });

    // Reject cookies
    rejectButton.addEventListener("click", function () {
        localStorage.setItem("cookieConsent", "rejected");
        banner.style.display = "none";
    });

});