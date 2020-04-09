import subprocess
import json
def gatherInfo():
    output = subprocess.check_output(['curl', '34.71.205.185/perfdata'])

    f = open("../assets/js/perfdata.json", "w")
    f.write(output)
    f.close()
gatherInfo()
