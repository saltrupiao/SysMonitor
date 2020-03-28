#Following examples from
#https://www.programcreek.com/python/example/53878/psutil.disk_usage

import os
import psutil

def get_addresses(net):
    info = dict()
    for nic in net.keys():
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

    perf_data["total_memory"] = mem.total
    perf_data["available_memory"] = mem.available >> 30
    perf_data["memory_percent"] = mem.percent
    perf_data["disk_usage"] = disk.total
    perf_data["disk_free"] = disk.free
    perf_data["disk_used"] = disk.used
    perf_data["disk_percent"] = disk.percent
    perf_data["cpus"] = cpu
    perf_data["network_interfaces"] = net_interfaces
    perf_data["network_addresses"] = get_addresses(net)

    return perf_data
