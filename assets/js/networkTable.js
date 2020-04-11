var JSONfiles = ["client-instance-1","client-instance-2","client-instance-3"];
var JSONcontents = []

function client_data(jsonResponse) {

    var networkTableData = []
    for (var i = 0; i < jsonResponse.length; i++) {
        let d = jsonResponse[i];
        let data = d.system_performance_data
        data = data.network_addresses
        data = data.eth0
        networkTableData.push({"interface":JSONfiles[i],"ipv4":data.ipv4,"ipv6":data.ipv6,"mac":data.mac})
    }
    return networkTableData;
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
    var tableData = client_data(JSONcontents);
    generateTable(tableData);
}

start();

function generateTable(tableData){
    var table = document.getElementById("networkTable")
    for (let element of tableData) {
        let row = table.insertRow();
        for (key in element) {
          let cell = row.insertCell();
          let text = document.createTextNode(element[key]);
          cell.appendChild(text);
        }
    }
}
