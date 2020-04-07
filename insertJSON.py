import subprocess
import os
import signal
import paramiko
import pymysql
import json
def gatherInfo():
    output = subprocess.check_output(['curl', '34.71.205.185/perfdata'])
    data = json.loads(output)
    net = data["system_performance_data"]["network_addresses"][list(data["system_performance_data"]["network_addresses"])[0]]
    global hostName
    global memTot 
    global memRemain 
    global memPercent
    global dskTot
    global dskUsed
    global dskAvail
    global dskPercent
    global cpuCore
    global netCard
    global ipv4Address
    global ipv6Address
    global macAddress
   
    hostName = data["system_performance_data"]["host_name"]
    memTot = data["system_performance_data"]["total_memory"]
    memRemain = data["system_performance_data"]["available_memory"]
    memPercent = data["system_performance_data"]["memory_percent"]
    dskTot = data["system_performance_data"]["disk_usage"]
    dskUsed = data["system_performance_data"]["disk_used"]
    dskAvail = data["system_performance_data"]["disk_free"]
    dskPercent = data["system_performance_data"]["disk_percent"]
    cpuCore = data["system_performance_data"]["cpu_avg_percent"]
    netCard = str(list(data["system_performance_data"]["network_addresses"])[0])
    ipv4Address = net["ipv4"]
    ipv6Address = net["ipv6"]
    macAddress = net["mac"]

def insert():
    with open('passwd.txt', 'r') as my_file:
        password = my_file.read().rstrip()

    connection = pymysql.connect(host="localhost",
                                 user="user",
                                 passwd = password,
                                 db="sysmonitor",
                                 charset='utf8mb4',
                                 cursorclass=pymysql.cursors.DictCursor)
    try:
        with connection.cursor() as cursor:
        #Create a new record
            sql = "INSERT INTO `client` (`cli_hostname`, `cli_disk_avil`, `cli_disk_pctg`, `cli_disk_total`, `cli_disk_used`, `cli_mem_total`, `cli_mem_remaining`, `cli_mem_pctg`, `cli_cpu_cores`, `cli_nic_name`, `cli_nic_addrv4`, `cli_nic_addrv6`, `cli_nic_mac`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
            cursor.execute(sql, (hostName, dskAvail, dskPercent, dskTot, dskUsed, memTot, memRemain, memPercent, cpuCore, netCard, ipv4Address, ipv6Address, macAddress))
        connection.commit()
        print("New record inserted")
    finally:
        connection.close()
gatherInfo()
insert()
#print(hostName+ ',' + memTot + ',' + memRemain + ',' + memPercent + ',' + dskTot + ',' + dskUsed + ',' + dskAvail + ',' + dskPercent + ',' + cpuCore + ',' + netCard + ',' + ipv4Address + ',' + ipv6Address + ',' + macAddress)





