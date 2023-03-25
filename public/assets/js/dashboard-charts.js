var trafficchart = document.getElementById("trafficflow");

// new
var myChart1 = new Chart(trafficchart, {
    type: 'line',
    data: {
        labels: chartKeys,
        datasets: [{
            // data: ['', '', '', '', '', '', '', '', '', '9.56', '', ''],
            data: chartValues,
            backgroundColor: "rgba(48, 164, 255, 0.2)",
            borderColor: "rgba(48, 164, 255, 0.8)",
            fill: true,
            borderWidth: 1
        }]
    },
    options: {
        animation: {
            duration: 2000,
            easing: 'easeOutQuart',
        },
        plugins: {
            legend: {
                display: false,
                position: 'right',
            },
            title: {
                display: false,
                text: 'Points History',
                position: 'left',
            },
        },
    }
});
