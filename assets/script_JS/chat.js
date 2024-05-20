$(document).ready(function () {


    // Function to load messages
    function loadMessages() {
        $.ajax({
            type: "POST",
            url: "../../script.php",
            data: {
                action: "chat",
                recup: 1,
                message: "",
            },
            dataType: "json",

            success: function (response) {

                var all_msgs = response.message.split('\n');

                //afficher les messages dans la div 
                var div_msg = document.getElementById("chat_messages");
                div_msg.innerHTML = "";

                for(var i = 0; i < all_msgs.length; i++){
                    var p = document.createElement("p");
                    p.textContent = all_msgs[i];

                    div_msg.appendChild(p);
                }

            },
            error: function (response) {
                console.log("erreur " + response.message);
            }
        })

    }


    // Load messages initially
    loadMessages();


    // Set an interval to reload messages every 5 seconds
    setInterval(loadMessages, 5000);



    
    // Send message on button click
    $('#send_chat_msg').click(function () {
        var message = $('#chat_input').val();
        if (message.trim() !== '') {

            $.ajax({
                type: "POST",
                url: "../../script.php",
                data: {
                    action: "chat",
                    recup: 0,
                    message: message,
                },
                dataType: "json",

                success: function (response) {
                    console.log(response.message);

                    $('#chat_input').val('');

                    loadMessages();
                },
                error: function (response) {
                    console.log("erreur : " + response.message);
                }
            })
        }
    });
    
});