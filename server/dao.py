# Used https://www.datacamp.com/community/tutorials/mysql-python
import mysql.connector as mysql
import json

ALL_CLIENTS = "SELECT cli_id, cli_hostname, cli_name, cli_disk_avil, cli_disk_total, cli_disk_used, cli_mem_total, cli_mem_remaining_cli_mem_pctg, cli_cpu_cores, cli_nic_name,  cli_nic_addr, cli_nic_mac, cli_nic_protocol from client order by cli_id;"

def read_conn_info():
    conn_info = json.loads(open("./database.json", "r").read())

    return mysql.connect(host="localhost", user=conn_info["user"], passwd=conn_info["password"])

def format_boi(client):
    perf_data = dict()
    perf_data["id"] = client[0]
    perf_data["host_name"] = client[1]
    perf_data["name"] = client[2]
    perf_data["disk_free"] = client[3]
    perf_data["disk_total"] = client[4]
    perf_data["disk_used"] = client[5]
    perf_data["memory_total"] = client[6]
    perf_data["memory_available"] = client[7]
    perf_data["memory_pctg"] = client[8]
    perf_data["cpus"] = client[9].split(",")
    perf_data["network_addresses"] = client[10]
    perf_data["network_mac"] = client[11]
    perf_data["network_protocol"] = client[12]

    return perf_data

def read_all_clients():
    cursor = read_conn_info().cursor()
    cursor.execute(ALL_CLIENTS)
    client_data = cursor.fetchall()

    client_list = []
    for client in client_data:
        client_list.append(format_boi(client))
    return

