//supaya form tidak dikirim saat refresh page
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

//get date
const d = new Date();
document.getElementById("date").innerHTML = d;




