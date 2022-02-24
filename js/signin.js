$(document).ready(function() {

    const inName = document.getElementById("inName");
    const inUsername = document.getElementById("inUsername");
    const inEmail = document.getElementById("inEmail");
    const btSignin= document.getElementById("btSignin");
    const inPassword = document.getElementById("inPassword");
    const inCpassword = document.getElementById("inCpassword");

    const validateSpace = (text) => /\s/g.test(text);

    const validateEmail = (email) => /\S+@\S+\.\S+/.test(email);

    function signin() {

        if (inName.value == "" 
        || inUsername.value == "" 
        || inEmail.value == "" 
        || inPassword.value == "" 
        || inCpassword.value == "" 
        || inName.value == null 
        || inUsername.value == null 
        || inEmail.value == null 
        || inPassword.value == null 
        || inCpassword.value == null
        ){
            outAlert.innerHTML = "Preencha todos os campos";

        } else if (inName.value.length > 100) {

            outAlert.innerHTML = "Nome inválido";

        } else if (inUsername.value .length> 50 || validateSpace(inUsername.value) == true) {

            outAlert.innerHTML = "Nome de usuário inválido";

        } else if (inEmail.value.length > 100 || validateEmail(inEmail.value) == false) {

            outAlert.innerHTML = "Email inválido";

        } else if (inPassword.value .length> 32 || inCpassword.value.length > 32) {

            outAlert.innerHTML = "Senha inválida";

        } else if (inPassword.value != inCpassword.value) {
            
            outAlert.innerHTML = "As senhas não condizem";

        } else {
            $.ajax({
                method: "POST",
                url: "php/signin.php",
                data: {
                    name: inName.value,
                    username: inUsername.value,
                    email: inEmail.value,
                    password: inPassword.value,
                },
                success: function(response) {
                    outAlert.innerHTML = response;
                    if (response == "signin") {
                        window.location.href = "private.php";
                    }
                }
            });

        }

    }

    function listen(e) {
        if (e.key == "Enter") {
            if (e.target.id == "inName") {
                inUsername.focus();
                inUsername.select();
            } else if (e.target.id == "inUsername") {
                inEmail.focus();
                inEmail.select();
            } else if (e.target.id == "inEmail") {
                inPassword.focus();
                inPassword.select();
            } else if (e.target.id == "inPassword") {
                inCpassword.focus();
                inCpassword.select();
            } else if (e.target.id == "inCpassword") {
                signin();
            }
        }
    }
    
    inName.addEventListener("keyup", listen);
    inUsername.addEventListener("keyup", listen);
    inEmail.addEventListener("keyup", listen);
    inPassword.addEventListener("keyup", listen);
    inCpassword.addEventListener("keyup", listen);
    btSignin.addEventListener("keyup", listen);
    btSignin.addEventListener("click", signin);

});