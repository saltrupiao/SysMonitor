/*
    Overview Doughnut Chart
*/
var ctxP = document.getElementById("doughnutChart").getContext('2d');
var myPieChart = new Chart(ctxP, {
    type: 'doughnut',
    data: {
        labels: ["Memory Usage (%)", "Disk Usage (%)", "CPU Usage (%)"],
        datasets: [{
            data: [50, 80, 30],
            /* Colors: Green, Yellow, Red */
            backgroundColor: ["rgba(32, 178, 170, 0.5)", "rgba(255, 255, 0, 0.5)", "rgba(255, 0, 0, 0.5)"],
            hoverBackgroundColor: ["rgba(32, 178, 170, 0.4)", "rgba(255, 255, 0, 0.4)", "rgba(255, 0, 0, 0.4)"],
            borderColor: ["rgba(32, 178, 170, 1)", "rgba(255, 255, 0, 1)", "rgba(255, 0, 0, 1)"]
        }]
    },
    options: {
        responsive: true,
            legend: {
                display: true,
                position: 'left',
                labels: {
                    fontColor: '#fff',
                    padding: 20
                }
            },
        elements: {
            arc: {
                borderWidth: 1
            }
        }
    }
});
