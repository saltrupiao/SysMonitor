import subprocess
import os
import signal
import json
import pymysql
def gatherInfo():
    ps = subprocess.Popen(('cat', 'grabData.py'), stdout=subprocess.PIPE)
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
            #sql = "INSERT INTO `client` (`cli_hostname`, `cli_disk_avil`, `cli_disk_pctg`, `cli_disk_total`, `cli_disk_used`, `cli_mem_total`, `cli_mem_remaining`, `cli_mem_pctg`, `cli_cpu_cores`, `cli_nic_name`, `cli_nic_addrv4`, `cli_nic_addrv6`, `cli_nic_mac`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
            sql = "UPDATE `client` set `cli_disk_avil` = %s, `cli_disk_pctg` = %s, `cli_disk_total` = %s, `cli_disk_used` = %s, `cli_mem_total` = %s, `cli_mem_remaining` = %s, `cli_mem_pctg` = %s, `cli_cpu_cores` = %s, `cli_nic_name` = %s, `cli_nic_addrv4` = %s, `cli_nic_addrv6` = %s, `cli_nic_mac` = %s where `cli_hostname` = %s"
            cursor.execute(sql, (dskAvail, dskPercent, dskTot, dskUsed, memTot, memRemain, memPercent, cpuCore, netCard, ipv4Address, ipv6Address, macAddress, hostName))
        connection.commit()
        print("New record inserted")
    finally:
        connection.close()
                                                                                                        
gatherInfo()
insert()
#print(hostName+ ',' + memTot + ',' + memRemain + ',' + memPercent + ',' + dskTot + ',' + dskUsed + ',' + dskAvail + ',' + dskPercent + ',' + cpuCore + ',' + netCard + ',' + ipv4Address + ',' + ipv6Address + ',' + macAddress)


