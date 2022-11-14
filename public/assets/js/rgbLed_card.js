let statusRgbLed = false;

document.addEventListener("DOMContentLoaded", function(event) {

    document.getElementById("btn-toggle-rgb-led").addEventListener('click', function() {
        if (statusRgbLed) {
            websocket.send('{"status":true,"actor":"rgbled","value":"#FFFFFF"}');
            this.textContent = "Apagar";
        } else {
            websocket.send('{"status":true,"actor":"rgbled","value":"#000000"}');
            this.textContent ="Endencer";
            
        }
        this.classList.toggle("btn-danger");
        this.classList.toggle("btn-success");
        statusRgbLed = !statusRgbLed;
      });

    document.getElementById("input-rgb-led-color").addEventListener('change', function(e) {
        regbValue = this.value;
        websocket.send('{"status":true,"actor":"rgbled","value":"'+regbValue+'"}')
        this.textContent = "Apagar";
      });

});




