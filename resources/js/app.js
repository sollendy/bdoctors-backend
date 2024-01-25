import './bootstrap';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const passwordValue = document.getElementById("password-confirm");
const confirmButton = document.getElementById("confirm-button");

function checkPassword() {
    const secondPassword = document.getElementById("password-confirm").value;
    const firstPassword = document.getElementById("password").value;

    if (firstPassword !== secondPassword || firstPassword.length < 8) {
        document.getElementById("password-error").innerHTML = "Le password devono essere uguali e devono avere una lunghezza minima di 8 caratteri";
        document.getElementById("password-confirm").classList.add("is-invalid");
        document.getElementById("submit-button").setAttribute("disabled", true);
    } else {
        document.getElementById("password-error").innerHTML = "";
        passwordValue.classList.remove("is-invalid");
        confirmButton.removeAttribute("disabled");
    }

}

if (passwordValue) {
    passwordValue.addEventListener("keyup", checkPassword);
}
