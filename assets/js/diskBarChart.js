var ctx = document.getElementById('diskBarChart');

Chart.defaults.global.defaultFontColor = '#fff';
var JSONfiles = ["client-instance-1", "client-instance-2"];
var clientDTS
var JSONcontents = []

function client_data(jsonResponse) {

    var disk_free = []
    var disk_usage = []
    var disk_total = []
    var disk_used = []
    for (var i = 0; i < jsonResponse.length; i++) {
        let d = jsonResponse[i];
        let data = d.system_performance_data

        disk_free.push(data.disk_free)
        disk_usage.push(data.disk_percent)
        disk_total.push(data.disk_total)
        disk_used.push(data.disk_used)
    }


    let dts = [
        {
            label: "Disk Free (GB)",
            data: disk_free,
            backgroundColor: [
                'rgba(255, 255, 0, 0.5)',   /*Yellow*/
                'rgba(255, 255, 0, 0.5)',
                'rgba(255, 255, 0, 0.5)',
                'rgba(255, 255, 0, 0.5)',
                'rgba(255, 255, 0, 0.5)',
                'rgba(255, 255, 0, 0.5)'
            ],
            borderColor: [
                'rgba(255, 255, 0, 1)',
                'rgba(255, 255, 0, 1)',
                'rgba(255, 255, 0, 11)',
                'rgba(255, 255, 0, 1)',
                'rgba(255, 255, 0, 1)',
                'rgba(255, 255, 0, 1)'
            ],
            borderWidth: 1
        },
        {
            label: "Disk Usage (%)",
            data: disk_usage,
            backgroundColor: [
                'rgba(204, 204, 0, 0.5)',  /*Dark-yellow1*/
                'rgba(204, 204, 0, 0.5)',
                'rgba(204, 204, 0, 0.5)',
                'rgba(204, 204, 0, 0.5)',
                'rgba(204, 204, 0, 0.5)',
                'rgba(204, 204, 0, 0.5)'
            ],
            borderColor: [
                'rgba(204, 204, 0, 1)',
                'rgba(204, 204, 0, 1)',
                'rgba(204, 204, 0, 1)',
                'rgba(204, 204, 0, 1)',
                'rgba(204, 204, 0, 1)',
                'rgba(204, 204, 0, 1)'
            ],
            borderWidth: 1
        },
        {
            label: "Disk Usage (GB)",
            data: disk_total,
            backgroundColor: [
                'rgba(153, 153, 0, 0.5)',  /* Dark-yellow2*/
                'rgba(153, 153, 0, 0.5)',
                'rgba(153, 153, 0, 0.5)',
                'rgba(153, 153, 0, 0.5)',
                'rgba(153, 153, 0, 0.5)',
                'rgba(153, 153, 0, 0.5)'
            ],
            borderColor: [
                'rgba(153, 153, 0, 1)',
                'rgba(153, 153, 0, 1)',
                'rgba(153, 153, 0, 1)',
                'rgba(153, 153, 0, 1)',
                'rgba(153, 153, 0, 1)',
                'rgba(153, 153, 0, 1)'
            ],
            borderWidth: 1
        },
        {
            label: "Disk Used (GB)",
            data: disk_used,
            backgroundColor: [
                'rgba(102, 102, 0, 0.5)',  /* Dark-yellow3*/
                'rgba(102, 102, 0, 0.5)',
                'rgba(102, 102, 0, 0.5)',
                'rgba(102, 102, 0, 0.5)',
                'rgba(102, 102, 0, 0.5)',
                'rgba(102, 102, 0, 0.5)'
            ],
            borderColor: [
                'rgba(102, 102, 0, 1)',
                'rgba(102, 102, 0, 1)',
                'rgba(102, 102, 0, 1)',
                'rgba(102, 102, 0, 1)',
                'rgba(102, 102, 0, 1)',
                'rgba(102, 102, 0, 1)'
            ],
            borderWidth: 1
        }
    ]
    return dts
}

function getData(url) {
    var file_name = url;
    var request = new XMLHttpRequest();
    request.open('GET', "../assets/js/perfData-" + file_name + ".log", false);  // false makes the request synchronous
    request.send(null);

    if (request.status === 200) {
        return JSON.parse(request.responseText);
    }
}

function start() {
    for (var i = 0; i < JSONfiles.length; i++) {
        var d = getData(JSONfiles[i]);
        JSONcontents.push(d);
    }
    clientDTS = client_data(JSONcontents);
}
start();

var chart_data = {
    labels: JSONfiles,
    fontColor: '#fff',
    datasets: clientDTS
}

var lineGraph = new Chart(ctx, {
    type: 'bar',
    data: chart_data,
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    stacked: false
                }
            }]
        }
    }
})
/*
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

*/
