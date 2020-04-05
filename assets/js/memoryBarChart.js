var ctx = document.getElementById('memoryBarChart');

Chart.defaults.global.defaultFontColor = '#fff';

var dts = [
    {
        label : "Memory Usage (%)",
        data : [10, 40, 60, 80, 100],
        backgroundColor : [
            'rgba(32, 178, 170, 0.5)', /* LightSeaGreen */
            'rgba(32, 178, 170, 0.5)',
            'rgba(32, 178, 170, 0.5)',
            'rgba(32, 178, 170, 0.5)',
            'rgba(32, 178, 170, 0.5)',
            'rgba(32, 178, 170, 0.5)'
        ],
        borderColor : [
            'rgba(32, 178, 170, 1)',
            'rgba(32, 178, 170, 1)',
            'rgba(32, 178, 170, 1)',
            'rgba(32, 178, 170, 1)',
            'rgba(32, 178, 170, 1)',
            'rgba(32, 178, 170, 1)'
        ],
        borderWidth : 1
      },
      {
        label : "Memory Available (%)",
        data : [20, 35, 40, 60, 50],
        backgroundColor : [
            'rgba(60, 179, 113, 0.5)', /* MediumSeaGreen */
            'rgba(60, 179, 113, 0.5)',
            'rgba(60, 179, 113, 0.5)',
            'rgba(60, 179, 113, 0.5)',
            'rgba(60, 179, 113, 0.5)',
            'rgba(60, 179, 113, 0.5)'
        ],
        borderColor : [
            'rgba(60, 179, 113, 1)',
            'rgba(60, 179, 113, 1)',
            'rgba(60, 179, 113, 1)',
            'rgba(60, 179, 113, 1)',
            'rgba(60, 179, 113, 1)',
            'rgba(60, 179, 113, 1)'
        ],
        borderWidth : 1
    },
    {
        label : "Total Memory (MB)",
        data : [25, 40, 45, 65, 55],
        backgroundColor : [
            'rgba(46, 139, 87, 0.5)', /* SeaGrean */
            'rgba(46, 139, 87, 0.5)',
            'rgba(46, 139, 87, 0.5)',
            'rgba(46, 139, 87, 0.5)',
            'rgba(46, 139, 87, 0.5)',
            'rgba(46, 139, 87, 0.5)'
        ],
        borderColor : [
            'rgba(46, 139, 87, 1)',
            'rgba(46, 139, 87, 1)',
            'rgba(46, 139, 87, 1)',
            'rgba(46, 139, 87, 1)',
            'rgba(46, 139, 87, 1)',
            'rgba(46, 139, 87, 1)'
        ],
        borderWidth : 1
    }
];

var data = {
    labels: ["Client 1", "Client 2", "Client 3", "Client 4", "Client 5"],
    datasets: dts
};

var lineGraph = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
        scales: {
            yAxes : [{
                ticks : {
                    min : 0,
                    stacked : false
                }
            }]
        }
    }
});

function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}