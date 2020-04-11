document.getElementById("demo").innerHTML = perfdata;


var ctx = document.getElementById('diskBarChart');

Chart.defaults.global.defaultFontColor = '#fff';

var dts = [
    {
        label : "Disk Free (MB)",
        data : [20, 35, 40, 50, 60],
        backgroundColor : [
            'rgba(255, 255, 0, 0.5)',  /* Yellow */
            'rgba(255, 255, 0, 0.5)',
            'rgba(255, 255, 0, 0.5)',
            'rgba(255, 255, 0, 0.5)',
            'rgba(255, 255, 0, 0.5)',
            'rgba(255, 255, 0, 0.5)'
        ],
        borderColor : [
            'rgba(255, 255, 0, 1)',
            'rgba(255, 255, 0, 1)',
            'rgba(255, 255, 0, 11)',
            'rgba(255, 255, 0, 1)',
            'rgba(255, 255, 0, 1)',
            'rgba(255, 255, 0, 1)'
        ],
        borderWidth : 1
    },
    {
        label : "Disk Usage (%)",
        data : [20, 35, 40, 50, 60],
        backgroundColor : [
            'rgba(204, 204, 0, 0.5)',  /* Dark-yellow1 */
            'rgba(204, 204, 0, 0.5)',
            'rgba(204, 204, 0, 0.5)',
            'rgba(204, 204, 0, 0.5)',
            'rgba(204, 204, 0, 0.5)',
            'rgba(204, 204, 0, 0.5)'
        ],
        borderColor : [
            'rgba(204, 204, 0, 1)',
            'rgba(204, 204, 0, 1)',
            'rgba(204, 204, 0, 1)',
            'rgba(204, 204, 0, 1)',
            'rgba(204, 204, 0, 1)',
            'rgba(204, 204, 0, 1)'
        ],
        borderWidth : 1
    },
    {
        label : "Disk Usage (MB)",
        data : [20, 35, 40, 50, 60],
        backgroundColor : [
            'rgba(153, 153, 0, 0.5)',  /* Dark-yellow2 */
            'rgba(153, 153, 0, 0.5)',
            'rgba(153, 153, 0, 0.5)',
            'rgba(153, 153, 0, 0.5)',
            'rgba(153, 153, 0, 0.5)',
            'rgba(153, 153, 0, 0.5)'
        ],
        borderColor : [
            'rgba(153, 153, 0, 1)',
            'rgba(153, 153, 0, 1)',
            'rgba(153, 153, 0, 1)',
            'rgba(153, 153, 0, 1)',
            'rgba(153, 153, 0, 1)',
            'rgba(153, 153, 0, 1)'
        ],
        borderWidth : 1
    },
    {
        label : "Disk Used (MB)",
        data : [20, 35, 40, 50, 60],
        backgroundColor : [
            'rgba(102, 102, 0, 0.5)',  /* Dark-yellow3 */
            'rgba(102, 102, 0, 0.5)',
            'rgba(102, 102, 0, 0.5)',
            'rgba(102, 102, 0, 0.5)',
            'rgba(102, 102, 0, 0.5)',
            'rgba(102, 102, 0, 0.5)'
        ],
        borderColor : [
            'rgba(102, 102, 0, 1)',
            'rgba(102, 102, 0, 1)',
            'rgba(102, 102, 0, 1)',
            'rgba(102, 102, 0, 1)',
            'rgba(102, 102, 0, 1)',
            'rgba(102, 102, 0, 1)'
        ],
        borderWidth : 1
    }
];

var data = {
    labels: ["Client 1", "Client 2", "Client 3", "Client 4", "Client 5"],
    fontColor: '#fff',
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