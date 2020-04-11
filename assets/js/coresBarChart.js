var ctx = document.getElementById('coresBarChart');

Chart.defaults.global.defaultFontColor = '#fff';
var JSONfiles = ["client-instance-1", "client-instance-2"];
var clientDTS
var JSONcontents = []

function client_data(jsonResponse) {


    var avg_cpu = []


    for (var i = 0; i < jsonResponse.length; i++) {
        let d = jsonResponse[i];
        let data = d.system_performance_data

        avg_cpu.push(data.cpus)

    }

    var dts = [
	{
	    label : ["Average CPU (%)"],
	    data : avg_cpu,
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
	}
    ]
    return dts
}

function getData(url) {
    var file_name = url;
    var request = new XMLHttpRequest();
    request.open('GET', "../../logfiles/perfData-" + file_name + ".log", false);  // false makes the request synchronous
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
    datasets: clientDTS
};

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
});
