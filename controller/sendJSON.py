import subprocess
import json
def gatherInfo():
    output = subprocess.check_output(['curl', '34.71.205.185/perfdata'])
    data = json.loads(output)

    f = open("../assets/js/perf_data.json", "a")
    f.write(data)
    f.close()
gatherInfo()




