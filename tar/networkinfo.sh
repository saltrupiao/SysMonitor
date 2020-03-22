#!/bin/bash
$(./netinfo.py >> /home/frozenpizzas4567/sysInfo/file$(date +"%m-%d-%y-%T").log)
rsync -aAXv --delete -e "ssh -i ~/.ssh/sysmonitor/id_rsa" /home/frozenpizzas4567/sysInfo/ frozenpizzas4567@35.237.92.151:/home/frozenpizzas4567/sysInfo/


