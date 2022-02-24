$(document).ready(function() {

    const outMessages = document.getElementById("outMessages")
    const inMessage= document.getElementById("inMessage");
    const letters = document.getElementById("letters");
    const btSend = document.getElementById("btSend");

    function send() {

        if (inMessage.value == "" 
        || inMessage.value == null 
        || inMessage.value.length == 0 
        || inMessage.value.trim() == "" 
        ) {

            inMessage.focus();
            inMessage.select();

        } else if (inMessage.value.length > 110) {

            outAlert.innerHTML = "Tente uma mensagem menor";

        } else {

            $.ajax({
                method: "POST",
                url: "php/send_private.php",
                data: {
                    message: inMessage.value,
                },

            });
            
            inMessage.value = "";
            count();

        }

    }
    
    function receive() {

        $.ajax({
            url: "./php/receive_private.php",
            success: function(response) {
                if (outMessages.innerHTML != response) {
                    outMessages.innerHTML = response;
                }
            },
            complete: function() {
                setTimeout(receive, 1000);
            }
        });
        
    }

    function listen(event) {
        if (event.key == "Enter") {
            send();
            event.preventDefault();
        }
        count();
    }

    function count() {
        letters.innerText = inMessage.value.length + "/110";
    }

    inMessage.addEventListener("keyup", listen);
    inMessage.addEventListener("keydown", listen);
    inMessage.addEventListener("cut", listen);
    inMessage.addEventListener("past", listen);
    btSend.addEventListener("click", send);

    inMessage.focus();
    inMessage.select();

    receive();

});