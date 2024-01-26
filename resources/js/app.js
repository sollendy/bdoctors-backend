import './bootstrap';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const passwordValue = document.getElementById("password-confirm");
const confirmButton = document.getElementById("confirm-button");
const nameInput = document.getElementById("name");
const lastnameInput = document.getElementById("lastname");
let registerSwitch = false;

function checkPassword() {
    const secondPassword = document.getElementById("password-confirm").value;
    const firstPassword = document.getElementById("password").value;
    const nameValue = nameInput.value;
    const lastnameValue = lastnameInput.value;

    document.getElementById("password-error").innerHTML = "";
    document.getElementById("name-error").innerHTML = "";

    if (firstPassword !== secondPassword || firstPassword.length < 8) {
        document.getElementById("password-error").innerHTML = "Le password devono essere uguali e devono avere una lunghezza minima di 8 caratteri";
        document.getElementById("password-confirm").classList.add("is-invalid");
        registerSwitch = false;
    } else {
        passwordValue.classList.remove("is-invalid");
        registerSwitch = true;
    }

    if (nameValue.length > 250) {
        document.getElementById("name-error").innerHTML = "Il nome deve essere al massimo 250 caratteri";
        nameInput.classList.add("is-invalid");
        registerSwitch = false;
    } else {
        nameInput.classList.remove("is-invalid");
        registerSwitch = true;
    }

    if (lastnameValue.length > 10) {
        document.getElementById("lastname-error").innerHTML = "Il cognome deve essere al massimo 250 caratteri";
        lastnameInput.classList.add("is-invalid");
        registerSwitch = false;
    } else {
        lastnameInput.classList.remove("is-invalid");
        registerSwitch = true;
    }

    if (registerSwitch) {
        confirmButton.removeAttribute("disabled");
    } else {
        confirmButton.setAttribute("disabled", true);
    }
}

if (passwordValue) {
    passwordValue.addEventListener("keyup", checkPassword);
    nameInput.addEventListener("keyup", checkPassword);
    lastnameInput.addEventListener("keyup", checkPassword);
}
