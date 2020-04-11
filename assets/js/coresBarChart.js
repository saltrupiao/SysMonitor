var ctx = document.getElementById('coresBarChart');

Chart.defaults.global.defaultFontColor = '#fff';

var dts = [
    {
        label : "Client 1",
        data : [3, 6.9, 3, 1, 7.8, 5.1, 4.2, 12.1],
        backgroundColor : [
            'rgba(250, 128, 114, 0.5)',  /* Salmon */
            'rgba(250, 128, 114, 0.5)',
            'rgba(250, 128, 114, 0.5)',
            'rgba(250, 128, 114, 0.5)',
            'rgba(250, 128, 114, 0.5)',
            'rgba(250, 128, 114, 0.5)',
            'rgba(250, 128, 114, 0.5)',
            'rgba(250, 128, 114, 0.5)',
            'rgba(250, 128, 114, 0.5)'
        ],
        borderColor : [
            'rgba(250, 128, 114, 1)',
            'rgba(250, 128, 114, 1)',
            'rgba(250, 128, 114, 1)',
            'rgba(250, 128, 114, 1)',
            'rgba(250, 128, 114, 1)',
            'rgba(250, 128, 114, 1)',
            'rgba(250, 128, 114, 1)',
            'rgba(250, 128, 114, 1)',
            'rgba(250, 128, 114, 1)'
        ],
        borderWidth : 1
    },
    {
        label : "Client 2",
        data : [3, 6.9, 3, 1, 7.8, 5.1, 4.2, 12.1],
        backgroundColor : [
            'rgba(205, 92, 92, 0.5)',  /* Indian-red */
            'rgba(205, 92, 92, 0.5)',
            'rgba(205, 92, 92, 0.5)',
            'rgba(205, 92, 92, 0.5)',
            'rgba(205, 92, 92, 0.5)',
            'rgba(205, 92, 92, 0.5)',
            'rgba(205, 92, 92, 0.5)',
            'rgba(205, 92, 92, 0.5)',
            'rgba(205, 92, 92, 0.5)'
        ],
        borderColor : [
            'rgba(205, 92, 92, 1)',
            'rgba(205, 92, 92, 1)',
            'rgba(205, 92, 92, 1)',
            'rgba(205, 92, 92, 1)',
            'rgba(205, 92, 92, 1)',
            'rgba(205, 92, 92, 1)',
            'rgba(205, 92, 92, 1)',
            'rgba(205, 92, 92, 1)',
            'rgba(205, 92, 92, 1)'
        ],
        borderWidth : 1
    },
    {
        label : "Client 3",
        data : [3, 6.9, 3, 1, 7.8, 5.1, 4.2, 12.1],
        backgroundColor : [
            'rgba(178, 34, 34, 0.5)',  /* Firebrick */
            'rgba(178, 34, 34, 0.5)',
            'rgba(178, 34, 34, 0.5)',
            'rgba(178, 34, 34, 0.5)',
            'rgba(178, 34, 34, 0.5)',
            'rgba(178, 34, 34, 0.5)',
            'rgba(178, 34, 34, 0.5)',
            'rgba(178, 34, 34, 0.5)',
            'rgba(178, 34, 34, 0.5)'
        ],
        borderColor : [
            'rgba(178, 34, 34, 1)',
            'rgba(178, 34, 34, 1)',
            'rgba(178, 34, 34, 1)',
            'rgba(178, 34, 34, 1)',
            'rgba(178, 34, 34, 1)',
            'rgba(178, 34, 34, 1)',
            'rgba(178, 34, 34, 1)',
            'rgba(178, 34, 34, 1)',
            'rgba(178, 34, 34, 1)'
        ],
        borderWidth : 1
    },
    {
        label : "Client 4",
        data : [3, 6.9, 3, 1, 7.8, 5.1, 4.2, 12.1],
        backgroundColor : [
            'rgba(255, 0, 0, 0.5)',  /* red */
            'rgba(255, 0, 0, 0.5)',
            'rgba(255, 0, 0, 0.5)',
            'rgba(255, 0, 0, 0.5)',
            'rgba(255, 0, 0, 0.5)',
            'rgba(255, 0, 0, 0.5)',
            'rgba(255, 0, 0, 0.5)',
            'rgba(255, 0, 0, 0.5)',
            'rgba(255, 0, 0, 0.5)'
        ],
        borderColor : [
            'rgba(255, 0, 0, 1)',
            'rgba(255, 0, 0, 1)',
            'rgba(255, 0, 0, 1)',
            'rgba(255, 0, 0, 1)',
            'rgba(255, 0, 0, 1)',
            'rgba(255, 0, 0, 1)',
            'rgba(255, 0, 0, 1)',
            'rgba(255, 0, 0, 1)',
            'rgba(255, 0, 0, 1)'
        ],
        borderWidth : 1
    },
        {
        label : "Client 5",
        data : [3, 6.9, 3, 1, 7.8, 5.1, 4.2, 12.1],
        backgroundColor : [
            'rgba(128, 0, 0, 0.5)',  /* Maroon */
            'rgba(128, 0, 0, 0.5)',
            'rgba(128, 0, 0, 0.5)',
            'rgba(128, 0, 0, 0.5)',
            'rgba(128, 0, 0, 0.5)',
            'rgba(128, 0, 0, 0.5)',
            'rgba(128, 0, 0, 0.5)',
            'rgba(128, 0, 0, 0.5)',
            'rgba(128, 0, 0, 0.5)'
        ],
        borderColor : [
            'rgba(128, 0, 0, 1)',
            'rgba(128, 0, 0, 1)',
            'rgba(128, 0, 0, 1)',
            'rgba(128, 0, 0, 1)',
            'rgba(128, 0, 0, 1)',
            'rgba(128, 0, 0, 1)',
            'rgba(128, 0, 0, 1)',
            'rgba(128, 0, 0, 1)',
            'rgba(128, 0, 0, 1)'
        ],
        borderWidth : 1
    }
];

var data = {
    labels: ["Core 0", "Core 1", "Core 2", "Core 3", "Core 4", "Core 5", "Core 6", "Core 7"],
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