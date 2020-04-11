var ctx = document.getElementById('diskBarChart');

Chart.defaults.global.defaultFontColor = '#fff';

function client_data(jsonResponse) {
        let d = jsonResponse;

        let data = d.system_performance_data

	var disk_free = []
	disk_free.push(data.disk_free)

	var disk_usage = []
	disk_usage.push(data.disk_percent)

	var disk_total = []
	disk_total.push(data.disk_total)

	var disk_used = []
	disk_used.push(data.disk_used)

	console.log("Testing....")
	console.log(d)
	console.log(data)
	console.log(disk_free)
	console.log(disk_used)
	console.log(disk_usage)
	console.log(disk_total)

        let dts = [
          {
              label : "Disk Free (GB)",
              data : disk_free,
              backgroundColor : [
                  'rgba(255, 255, 0, 0.5)',   /*Yellow*/
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
              data : disk_usage,
              backgroundColor : [
                  'rgba(204, 204, 0, 0.5)',  /*Dark-yellow1*/
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
              label : "Disk Usage (GB)",
              data : disk_total,
              backgroundColor : [
                  'rgba(153, 153, 0, 0.5)',  /* Dark-yellow2*/
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
              label : "Disk Used (GB)",
              data : disk_used,
              backgroundColor : [
                  'rgba(102, 102, 0, 0.5)',  /* Dark-yellow3*/
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
        ]
        console.log(dts)
        return dts
}

/*var chart_data = {
    labels: ["Client 1"],
    fontColor: '#fff',
    datasets: client_data()
}

var lineGraph = new Chart(ctx, {
    type: 'bar',
    data: chart_data,
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
})*/

function getData(url) {
    var file_name = url;
    console.log(file_name)
    var request = new XMLHttpRequest();
    request.open('GET', "../assets/js/perfData-"+file_name+".log", false);  // false makes the request synchronous
    request.send(null);

    if (request.status === 200) {
        return JSON.parse(request.responseText);
    }
}

var JSONfiles = ["client-instance-1"];
var clientDTS
function start() {
  console.log("This is a for each loop with 1 client and a LOG file and a bar chart")
  for (var item in JSONfiles) {
    console.log(item)
    var d = getData(item);
    console.log("I'm inside a loop. Like groundhog day "+d)
    clientDTS = client_data(d);
    console.log(clientDTS)
  }
}

/*
var chart_data = {
  labels: ["Client-1"],
  fontColor: '#fff',
  datasets: clientDTS
}

var lineGraph = new Chart(ctx, {
    type: 'bar',
    data: chart_data,
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
})
*/
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

start();
