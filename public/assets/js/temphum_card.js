
var chart

document.addEventListener("DOMContentLoaded", function(event) {

    var dateTemp = {
        yAxisID:"temp",
        label: 'Temperature',
        borderWidth: 1,
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [],

    }
    var dataHum = {
        yAxisID:"hum",
        label: 'Humidity',
        borderWidth: 1,
        backgroundColor: 'rgb(132, 99, 255)',
        borderColor: 'rgb(132, 99, 255)',
        data: [],
    }

    var data = {
        labels: [],
        datasets: [dateTemp, dataHum]
    };

    const options ={
        responsive: true,
        /*
        interaction: {
          mode: 'index',
          intersect: false,
        },
        */
        scales: {
            temp: {
                type: 'linear',
                position: 'left',
                min: 10,
                max: 50,
                ticks: { beginAtZero: true, color: 'rgb(255, 99, 132)' },
                // Hide grid lines, otherwise you have separate grid lines for the 2 y axes
                grid: { display: false }
            },
            hum: {
                type: 'linear',
                position: 'right',
                min: 0,
                max: 100,
                ticks: { beginAtZero: true, color: 'rgb(132, 99, 255)' },
                // Hide grid lines, otherwise you have separate grid lines for the 2 y axes
                grid: { display: false }
            }
        }
        
    }
    
    var config = {
        type: 'line',
        data: data,
        options: options
    };

    chart = new Chart(
        document.getElementById('chart_temphum'),
        config
    );

});

function refreshChartInfo(status){
    moments = [];
    temps = [];
    hums = [];
    date = new Date();
    status.info.forEach(element => {
        date.setSeconds(date.getSeconds() + 5);
        moment = date.getHours() + ":" + String(date.getMinutes()).padStart(2, '0') + ":" + String(date.getSeconds()).padStart(2, '0');
        moments.push(moment); 
        temps.push(element.temperature);
        hums.push(element.humidity); 
    });
    chart.data.labels = moments;
    chart.data.datasets[0].data = temps;
    chart.data.datasets[1].data = hums;
    chart.update();

    last_measure = status.info.pop()
    document.getElementById('temp').innerHTML= last_measure.temperature;
    document.getElementById('hum').innerHTML =last_measure.humidity;
}



