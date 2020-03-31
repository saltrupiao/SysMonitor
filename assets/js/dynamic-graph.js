var ctx = document.getElementById('myChart');




var dts = [
    {
        label: "Memory Usage",
        fillColor: "rgba(220,220,220,0.5)",
        strokeColor: "rgba(220,220,220,1)",
        data: [1, 2, 3, 4, 5]
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
            yAxes: [{
                stacked: true
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