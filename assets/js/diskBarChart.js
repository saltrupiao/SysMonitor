var ctx = document.getElementById('diskBarChart');

Chart.defaults.global.defaultFontColor = '#fff';

function client_data() {
  data = {}
  getClientPerfData()
      .then(data => {
        data = data.system_performance_data
      })
      .catch(error => {
        console.error(error)
      })

  disk_free = []
  data.forEach(c => disk_free.append(c.disk_free))

  disk_usage = []
  data.forEach(c => disk_usage.append(c.disk_used))

  disk_total = []
  data.forEach(c => disk_used.append(c.disk_total))

  var dts = [
    {
        label : "Disk Free (MB)",
        data : disk_free,
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
        data : disk_usage,
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
        data : disk_total, // TODO: FIX THIS :)
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
        data : disk_used,
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
}

const getClientPerfData = async () => {
  const response = await fetch("http://35.196.30.1:8080/perfdata")
  const newData = await response.json()

  return newData
}

var data = {
    labels: ["Client 1", "Client 2", "Client 3", "Client 4", "Client 5"],
    fontColor: '#fff',
    datasets: client_data()
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
