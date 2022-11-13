let statusLed = false;

document.addEventListener("DOMContentLoaded", function(event) {




    document.getElementById("btn-toggle-led").addEventListener('click', function() {
        if (statusLed) {
            websocket.send('{"status":true,"actor":"simpleled","value":1}');
            this.textContent = "Apagar";
        } else {
            websocket.send('{"status":true,"actor":"simpleled","value":0}');
            this.textContent ="Endencer";
        }
        statusLed = !statusLed;
      });

});




