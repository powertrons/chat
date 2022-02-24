$(document).ready(function() {

    const inEmail = document.getElementById("inEmail");
    const inPassword = document.getElementById("inPassword");
    const cbPassword = document.getElementById("cbPassword");
    const btLogin = document.getElementById("btLogin");

    function login(e) {

        if (inEmail.value == "" 
        || inPassword.value == "" 
        || inEmail.value == null 
        || inPassword.value == null 
        ){
            outAlert.innerHTML = "Preencha todos os campos";

        } else if (inEmail.value.length > 100) {

            outAlert.innerHTML = "Email inválido";

        } else if (inPassword.value.length > 32) {

            outAlert.innerHTML = "Senha inválida";

        } else {

        $.ajax({
            method: "POST",
            url: "php/login.php",
            data: {
                email: inEmail.value,
                password: inPassword.value,
            },
            success: function(response) {
                outAlert.innerHTML = response;
                if (response == "login") {
                    window.location.href = "private.php";
                }
            }
        });

        }

    }

    function showPassword(e) {
        if (e.target.checked == true) {
            inPassword.type = "text";
        } else if (e.target.checked == false) {
            inPassword.type = "password";
        }
    }

    function listen(e) {
        if (e.key == "Enter") {
            if (e.target.id == "inEmail") {
                inPassword.focus();
                inPassword.select();
            } else if (e.target.id == "inPassword") {
                login();
            }
        }
    }
    
    inEmail.addEventListener("keyup", listen);
    inPassword.addEventListener("keyup", listen);
    cbPassword.addEventListener("change", showPassword);
    btLogin.addEventListener("click", login);

});