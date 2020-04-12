import psutil
import socket

hostName = socket.gethostname()
mem = psutil.virtual_memory()
memTot = str(mem.total >> 30)
memRemain = str(mem.available >> 30)
memPercent = str(mem.percent)
disk = psutil.disk_usage('/')
dskTot = str(disk.total >> 30)
dskUsed = str(disk.used >> 30)
dskAvail = str(disk.free >> 30)
dskPercent= str(disk.percent)
cpu = psutil.cpu_percent(percpu=True, interval=1)
cpuCore = str(cpu[0])
net = psutil.net_if_addrs()
global netCard
netCard = list(net.keys())[1]
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

#result = hostname,memTot
print(f'{hostName},{memTot},{memRemain},{memPercent},{dskTot},{dskUsed},{dskAvail},{dskPercent},{cpuCore},{netCard},{ipv4Address},{ipv6Address},{macAddress}')

