#!/bin/env python
#Following examples from 
#https://www.programcreek.com/python/example/53878/psutil.disk_usage

import psutil
import os

mem = psutil.virtual_memory()
disk = psutil.disk_usage('/')
cpu = psutil.cpu_percent(percpu=True, interval=1)
print("Memory\n------\nMemory Total: " + str(mem.total >> 30)  + "Gb\nMemory Remaining: " + str(mem.available >> 30) + "Gb\nMemory Percentage: " + str(mem.percent) + "%\n" )
print("Disk Usage\n----------")
print("Disk Total: " + str(disk.total >> 30) + "Gb\nDisk Available: " + str(disk.free >> 30) + "Gb\nDisk Used: " + str(disk.used >> 30) + "Gb\nPercent Used: " + str(disk.percent) + "%\n")
print("CPU\n---")
i = 0
for core in cpu:
    print("cpu core " + str(i) + ": " + str(cpu[i]) + "%")
    i = i + 1
i = 0
print("\nNetwork info\n------------")
netInterfaces = os.listdir('/sys/class/net')
for interface in netInterfaces:
    #print("Interface: " + netInterfaces[i])
    i = i + 1
i = 0
net = psutil.net_if_addrs()

for nic in net.keys():
    print(nic)
    count = 0
    for interface in net[nic]: 
        if count == 0:
            print("     IPv4 address: " + str(interface[1]))
        elif count == 1:
            print("     IPv6 address: " + str(interface[1]))
        elif count == 2:
            print("     MAC address:  " + str(interface[1]))
        count = count + 1
i = 0
count = 0
