let statusRgbLed = false;

document.addEventListener("DOMContentLoaded", function(event) {

    document.getElementById("input-rgb-led-color").addEventListener('change', function(e) {
        regbValue = this.value;
        websocket.send('{"status":true,"actor":"rgbled","value":"'+regbValue+'"}')
        this.textContent = "Apagar";
      });

});





