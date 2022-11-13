const websocket = new WebSocket("ws://192.168.1.20:8766/");

document.addEventListener("DOMContentLoaded", function(event) {

    websocket.onopen = function (event) {
        console.log("CONECTED WS");
    }

    websocket.onmessage = ({ data }) => {
        let status = JSON.parse(data);
        console.log(status);
        if(status.sucess)
        {
            switch (status.sensor) {
            case 'DHT11':
                refreshChartInfo(status);
                break;
            default:
                break;
            }
        }

    };


});