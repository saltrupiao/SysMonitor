import subprocess
import time
import os
import signal
import json
import pymysql
from argparse import Action, ArgumentParser

def createConnection():
    with open('/usr/local/bin/passwd.txt', 'r') as my_file:
        password = my_file.read().rstrip()
    global connection
    connection = pymysql.connect(host="localhost",
                                 user="user",
                                 passwd = password,
                                 db="sysmonitor",
                                 charset='utf8mb4',
                                 cursorclass=pymysql.cursors.DictCursor)
def create_parser():
    parser = ArgumentParser(description="""
    Used to pull data from clients. Option to insert/update the database
    """)
    parser.add_argument("--method", default="json", choices=['ssh', 'json'], help="Choose between REST API or SSH")
    parser.add_argument("--firstTime", type=bool, help="If the first time it will insert a record instead of updating one")
    parser.add_argument("--newHost", help="Provide the IP address for a new client")

    return parser
def testOutput():
        output = str(subprocess.check_output(['curl', host + '/perfdata']))
        print(output)
<<<<<<< .merge_file_CniZLE

=======
    
>>>>>>> .merge_file_Esj28p

def gatherInfo(mode):
    global info
    if mode == 'ssh':
        print("Using SSH")
        #for json data use netinfo.py for readable data use grabData.py
        ps = subprocess.Popen(('cat', '/usr/local/bin/grabData.py'), stdout=subprocess.PIPE)
        output = subprocess.check_output(['ssh', 'frozenpizzas4567@34.71.205.185', ' python3 -'], stdin=ps.stdout)
        newList = list(output.split(','))
    elif mode == 'json':
        print("Using JSON/REST")
        output = subprocess.check_output(['curl', host + '/perfdata'])
        info = output
        data = json.loads(output)
        net = data["system_performance_data"]["network_addresses"][list(data["system_performance_data"]["network_addresses"])[0]]
        newList = (data["system_performance_data"]["host_name"],data["system_performance_data"]["total_memory"],data["system_performance_data"]["available_memory"],data["system_performance_data"]["memory_percent"],data["system_performance_data"]["disk_total"],data["system_performance_data"]["disk_used"],data["system_performance_data"]["disk_free"],data["system_performance_data"]["disk_percent"],data["system_performance_data"]["cpus"],str(list(data["system_performance_data"]["network_addresses"])[0]),net["ipv4"],net["ipv6"],net["mac"])

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
<<<<<<< .merge_file_CniZLE

=======
    
>>>>>>> .merge_file_Esj28p
    hostName = str(newList[0])
    memTot = str(newList[1])
    memRemain = str(newList[2])
    memPercent = str(newList[3])
    dskTot = str(newList[4])
    dskUsed = str(newList[5])
    dskAvail = str(newList[6])
    dskPercent = str(newList[7])
    cpuCore = str(newList[8])
    netCard = str(newList[9])
    ipv4Address = str(newList[10])
    ipv6Address = str(newList[11])
    macAddress = str(newList[12]).rstrip()

    if mode == 'ssh':
        info = str("Hostname: " + hostName +"\nMemory\n------\nMemory Total: " + memTot  + "Gb\nMemory Remai    ning: " + memRemain + "Gb\nMemory Percentage: " + memPercent + "%\n" + "Disk Usage\n----------\nDisk     Total: " + dskTot + "Gb\nDisk Available: " + dskAvail + "Gb\nDisk Used: " + dskUsed + "Gb\nPercentUsed: " + dskPercent + "%\n" + "CPU\n---\nCPU Percentage: " + cpuCore + "%\n" +"Networking Info\n---------------\nInterface: " + netCard + "\nIPv4 address: " + ipv4Address + "\nIPv6 Address: " + ipv6Address + "\nMAC Address: " + macAddress)


def update():
    try:
        with connection.cursor() as cursor:
        #Update record
            sql = "UPDATE `client` set `cli_disk_avil` = %s, `cli_disk_pctg` = %s, `cli_disk_total` = %s, `cli_disk_used` = %s, `cli_mem_total` = %s, `cli_mem_remaining` = %s, `cli_mem_pctg` = %s, `cli_cpu_cores` = %s, `cli_nic_name` = %s, `cli_nic_addrv4` = %s, `cli_nic_addrv6` = %s, `cli_nic_mac` = %s, `cli_timestamp` = %s where `cli_hostname` = %s"
            cursor.execute(sql, (dskAvail, dskPercent, dskTot, dskUsed, memTot, memRemain, memPercent, cpuCore, netCard, ipv4Address, ipv6Address, macAddress, timestamp, hostName))
        connection.commit()
        print("Record updated")
    finally:
        connection.close()

def insert():
    try:
        with connection.cursor() as cursor:
        #Create a new record

            sql = "INSERT INTO `client` (`cli_hostname`, `cli_disk_avil`, `cli_disk_pctg`, `cli_disk_total`, `cli_disk_used`, `cli_mem_total`, `cli_mem_remaining`, `cli_mem_pctg`, `cli_cpu_cores`, `cli_nic_name`, `cli_nic_addrv4`, `cli_nic_addrv6`, `cli_nic_mac`, `cli_timestamp`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
            cursor.execute(sql, (hostName, dskAvail, dskPercent, dskTot, dskUsed, memTot, memRemain, memPercent, cpuCore, netCard, ipv4Address, ipv6Address, macAddress, timestamp))
        connection.commit()
        print("New record inserted")
    finally:
        connection.close()

def printInfo():
        info = str("Hostname: " + hostName +"\nMemory\n------\nMemory Total: " + memTot  + "Gb\nMemory Remai    ning: " + memRemain + "Gb\nMemory Percentage: " + memPercent + "%\n" + "Disk Usage\n----------\nDisk     Total: " + dskTot + "Gb\nDisk Available: " + dskAvail + "Gb\nDisk Used: " + dskUsed + "Gb\nPercentUsed: " + dskPercent + "%\n" + "CPU\n---\nCPU Percentage: " + cpuCore + "%\n" +"Networking Info\n---------------\nInterface: " + netCard + "\nIPv4 address: " + ipv4Address + "\nIPv6 Address: " + ipv6Address + "\nMAC Address: " + macAddress)

def writeLog():
        destFiles = ["/opt/bitnami/apache2/htdocs/logfiles/perfData-" + hostName + ".log"]
        for destFile in destFiles:
            my_file = open(destFile, 'w')
            my_file.writelines(info)
            my_file.close()


def main():
    import subprocess
    import os
    import signal
    import json
    import pymysql
    global timestamp
    timestamp = time.strftime("%Y-%m-%dT%H-%M", time.localtime())
#Example from https://stackoverflow.com/questions/3277503/how-to-read-a-file-line-by-line-into-a-list
    with open('/usr/local/bin/inventory.txt') as f:
        hostsLines = f.readlines()
    #hosts = ['34.71.205.185', '35.193.185.213']
    newHost = ""
    hosts = [x.strip() for x in hostsLines]
    args = create_parser().parse_args()
    if args.newHost==None:
        pass
    elif args.newHost in hosts:
        print("New host is already in inventory")
    else:
        newHost = args.newHost
        hosts.append(newHost)
    i = 0
    for IP in hosts:
        global host
        host = IP
        gatherInfo(args.method.lower())
 #       printInfo()
        writeLog()
        createConnection()
        if host == newHost:
            insert()
            with open("inventory.txt", "a") as f:
                f.write(host)
        else:
            update()

<<<<<<< .merge_file_CniZLE
main()
=======
main()
>>>>>>> .merge_file_Esj28p
