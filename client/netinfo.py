#Following examples from
#https://www.programcreek.com/python/example/53878/psutil.disk_usage

import os
import psutil

# From http://code.activestate.com/recipes/578019
def bytes2human(n):
    symbols = ('K', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y')
    prefix = {}
    for i, s in enumerate(symbols):
        prefix[s] = 1 << (i + 1) * 10
    for s in reversed(symbols):
        if n >= prefix[s]:
            value = float(n) / prefix[s]
            return value
    return n

def get_addresses(net):
    info = dict()
    for nic in net.keys():
        if nic == "lo":
            continue

        nic_interface = dict()
        for i, interface in enumerate(net[nic]):
            if i == 0:
                nic_interface["ipv4"] = str(interface[1])
            elif i == 1:
                nic_interface["ipv6"] = str(interface[1])
            elif i == 2:
                nic_interface["mac"] = str(interface[1])

        info[nic] = nic_interface
    return info


def retrieve_performance_data():
    perf_data = dict()
    mem = psutil.virtual_memory()
    disk = psutil.disk_usage('/')
    cpu = psutil.cpu_percent(percpu=True, interval=1)
    net_interfaces = os.listdir('/sys/class/net')
    net = psutil.net_if_addrs()

    perf_data["host_name"] = os.uname()[1]
    perf_data["total_memory"] = round(mem.total/10**9, 2)
    perf_data["available_memory"] = round(mem.available/10**9, 2)
    perf_data["memory_percent"] = mem.percent
    perf_data["disk_usage"] = round(disk.total/10**9, 2)
    perf_data["disk_free"] = round(disk.free/10**9, 2)
    perf_data["disk_used"] = round(disk.used/10**9, 2)
    perf_data["disk_percent"] = disk.percent
    perf_data["cpus"] = float(str(sum(cpu)/len(cpu))[0:4])
    perf_data["network_interfaces"] = net_interfaces
    perf_data["network_addresses"] = get_addresses(net)

    return perf_data
