#!/bin/env python
#Following examples from 
#https://www.programcreek.com/python/example/53878/psutil.disk_usage
#https://stackoverflow.com/questions/30589571/insert-data-into-mssql-server-using-python
import time
import psutil
import socket
import os
import pymysql.cursors
import pymysql

def gatherInfo():
    #Hostname
    global hostName
    hostName = socket.gethostname()
    #Memory Variables
    mem = psutil.virtual_memory()
    global memTot 
    memTot = str(mem.total >> 30)
    global memRemain
    memRemain = str(mem.available >> 30)
    global memPercent
    memPercent = str(mem.percent)

    #Storage
    disk = psutil.disk_usage('/')
    global dskTot 
    dskTot = str(disk.total >> 30)
    global dskUsed
    dskUsed = str(disk.used >> 30)
    global dskAvail 
    dskAvail = str(disk.free >> 30)
    global dskPercent
    dskPercent= str(disk.percent)

    #CPUs
    cpu = psutil.cpu_percent(percpu=True, interval=1)
    global cpuCore
    cpuCore = str(cpu[0])

   # print("\nNetwork info\n------------")

    net = psutil.net_if_addrs()
    if len(net.keys()) > 1:
        global netCard 
        netCard = net.keys()[1]
        count = 0
        for interface in net[netCard]: 
            if count == 0:
                global ipv4Address
                ipv4Address = str(interface[1])
            elif count == 1:
                global ipv6Address
                ipv6Address = str(interface[1])
            elif count == 2:
                global macAddress
                macAddress= str(interface[1])
            count = count + 1
    else:
        print("Only loopback interface available")

def insert():
    with open('passwd.txt', 'r') as my_file:
        password = my_file.read().rstrip()

    connection = pymysql.connect(host="35.237.92.151", 
                                 user="root", 
                                 passwd = password, 
                                 db="sysmonitor",
                                 charset='utf8mb4',
                                 cursoclass=pymysql.cursors.DictCursor)
    sql = "INSERT INTO 'sysmonitor' () VALUES (%s, %s)" 
    cursor.execute(sql, (memTot, memRemain, memPercent, dskAvail, dskUsed,))
    try:
        with connection.cursor() as cursor:
            #Create a new record
            sql = "INSERT INTO 'sysmonitor' () VALUES (%s, %s)"
            cursor.execute(sql, (memTot, memRemain, memPercent, dskAvail, dskUsed,))
        cursor.commit()
    finally:
        connection.close()

def printInfo():
    global info
    info = "Hostname: " + hostName +"\nMemory\n------\nMemory Total: " + memTot  + "Gb\nMemory Remaining: " + memRemain + "Gb\nMemory Percentage: " + memPercent + "%\n" + "Disk Usage\n----------\nDisk Total: " + dskTot + "Gb\nDisk Available: " + dskAvail + "Gb\nDisk Used: " + dskUsed + "Gb\nPercent Used: " + dskPercent + "%\n" + "CPU\n---\nCPU Percentage: " + cpuCore + "%\n" +"Networking Info\n---------------\nInterface: " + netCard + "\nIPv4 address: " + ipv4Address + "\nIPv6 Address: " + ipv6Address + "\nMAC Address: " + macAddress
    print(info)

def createLog():
    timestamp = time.strftime("%Y-%m-%dT%H-%M")
    destFile = hostName + timestamp + ".log"
    my_file = open(destFile, 'ab')
    my_file.writelines(info)
    my_file.close()

def main():
    gatherInfo()
    printInfo()
    createLog()

main()
