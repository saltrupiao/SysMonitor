var ctx = document.getElementById('memoryBarChart');

Chart.defaults.global.defaultFontColor = '#fff';

var JSONfiles = ["client-instance-1", "client-instance-2"];
var clientDTS
var JSONcontents = []
function client_data(jsonResponse) {

    var available_memory = []
    var memory_percent = []
    var total_memory = []
    for (var i = 0; i < jsonResponse.length; i++) {
        let d = jsonResponse[i];
        let data = d.system_performance_data

        available_memory.push(data.available_memory)
        memory_percent.push(data.memory_percent)
        total_memory.push(data.total_memory)
    }
    /*
    console.log(available_memory)
    console.log(memory_percent)
    console.log(total_memory)
    */

    var dts = [
        {

            label: "Memory Usage (%)",
            data: memory_percent,
            backgroundColor: [
                'rgba(32, 178, 170, 0.5)', /* LightSeaGreen */
                'rgba(32, 178, 170, 0.5)',
                'rgba(32, 178, 170, 0.5)',
                'rgba(32, 178, 170, 0.5)',
                'rgba(32, 178, 170, 0.5)',
                'rgba(32, 178, 170, 0.5)'
            ],
            borderColor: [
                'rgba(32, 178, 170, 1)',
                'rgba(32, 178, 170, 1)',
                'rgba(32, 178, 170, 1)',
                'rgba(32, 178, 170, 1)',
                'rgba(32, 178, 170, 1)',
                'rgba(32, 178, 170, 1)'
            ],
            borderWidth: 1
        },
        {
            label: "Memory Available (%)",
            data: available_memory,
            backgroundColor: [
                'rgba(60, 179, 113, 0.5)', /* MediumSeaGreen */
                'rgba(60, 179, 113, 0.5)',
                'rgba(60, 179, 113, 0.5)',
                'rgba(60, 179, 113, 0.5)',
                'rgba(60, 179, 113, 0.5)',
                'rgba(60, 179, 113, 0.5)'
            ],
            borderColor: [
                'rgba(60, 179, 113, 1)',
                'rgba(60, 179, 113, 1)',
                'rgba(60, 179, 113, 1)',
                'rgba(60, 179, 113, 1)',
                'rgba(60, 179, 113, 1)',
                'rgba(60, 179, 113, 1)'
            ],
            borderWidth: 1
        },
        {
            label: "Total Memory (MB)",
            data: total_memory,
            backgroundColor: [
                'rgba(46, 139, 87, 0.5)', /* SeaGrean */
                'rgba(46, 139, 87, 0.5)',
                'rgba(46, 139, 87, 0.5)',
                'rgba(46, 139, 87, 0.5)',
                'rgba(46, 139, 87, 0.5)',
                'rgba(46, 139, 87, 0.5)'
            ],
            borderColor: [
                'rgba(46, 139, 87, 1)',
                'rgba(46, 139, 87, 1)',
                'rgba(46, 139, 87, 1)',
                'rgba(46, 139, 87, 1)',
                'rgba(46, 139, 87, 1)',
                'rgba(46, 139, 87, 1)'
            ],
            borderWidth: 1
        }
    ]
    return dts;
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

