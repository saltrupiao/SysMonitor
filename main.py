import subprocess
import time
import os
import signal
import json
import pymysql
from argparse import Action, ArgumentParser
def create_parser():
    parser = ArgumentParser(description="""
    Used to pull data from clients and insert/update the database
    """)
    parser.add_argument("--method", default="ssh", choices=['ssh', 'json'], help="Choose between REST API or SSH")
    parser.add_argument("--firstTime", type=bool, help="If the first time it will insert a record instead of updating one")

    return parser

def gatherInfoJSON():
    print("Using JSON/REST")
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

def gatherInfoSSH():
    print("Using SSH")
    ps = subprocess.Popen(('cat', '/usr/local/bin/grabData.py'), stdout=subprocess.PIPE)
    output = subprocess.check_output(['ssh', 'frozenpizzas4567@34.71.205.185', ' python3 -'], stdin=ps.stdout)
    newList = list(output.split(','))
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


    
    hostName = newList[0]
    memTot = newList[1]
    memRemain = newList[2]
    memPercent = newList[3]
    dskTot = newList[4]
    dskUsed = newList[5]
    dskAvail = newList[6]
    dskPercent = newList[7]
    cpuCore = newList[8]
    netCard = newList[9]
    ipv4Address = newList[10]
    ipv6Address = newList[11]
    macAddress = str(newList[12]).rstrip()

def update():
    with open('/usr/local/bin/passwd.txt', 'r') as my_file:
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
            sql = "UPDATE `client` set `cli_disk_avil` = %s, `cli_disk_pctg` = %s, `cli_disk_total` = %s, `cli_disk_used` = %s, `cli_mem_total` = %s, `cli_mem_remaining` = %s, `cli_mem_pctg` = %s, `cli_cpu_cores` = %s, `cli_nic_name` = %s, `cli_nic_addrv4` = %s, `cli_nic_addrv6` = %s, `cli_nic_mac` = %s, `cli_timestamp` = %s where `cli_hostname` = %s"
            cursor.execute(sql, (dskAvail, dskPercent, dskTot, dskUsed, memTot, memRemain, memPercent, cpuCore, netCard, ipv4Address, ipv6Address, macAddress, timestamp, hostName))
        connection.commit()
        print("Record updated")
    finally:
        connection.close()

def insert():
    with open('/usr/local/bin/passwd.txt', 'r') as my_file:
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

            sql = "INSERT INTO `client` (`cli_hostname`, `cli_disk_avil`, `cli_disk_pctg`, `cli_disk_total`, `cli_disk_used`, `cli_mem_total`, `cli_mem_remaining`, `cli_mem_pctg`, `cli_cpu_cores`, `cli_nic_name`, `cli_nic_addrv4`, `cli_nic_addrv6`, `cli_nic_mac`, `cli_timestamp`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
            cursor.execute(sql, (hostName, dskAvail, dskPercent, dskTot, dskUsed, memTot, memRemain, memPercent, cpuCore, netCard, ipv4Address, ipv6Address, macAddress, timestamp))
        connection.commit()
        print("New record inserted")
    finally:
        connection.close()

def main():
    import subprocess
    import os
    import signal
    import json
    import pymysql
    global timestamp
    timestamp = time.strftime("%Y-%m-%dT%H-%M", time.localtime())
    args = create_parser().parse_args()
    if args.method.lower() == 'ssh':
        gatherInfoSSH()
    else:
        gatherInfoJSON()
    if args.firstTime:
        insert()
    else:
        update()

main()
#gatherInfoSSH()
#update()
#insert()




