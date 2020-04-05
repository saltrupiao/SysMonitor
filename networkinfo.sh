#!/bin/bash
$(./netinfo.py >> sysInfo/file$(date +"%m-%d-%y-%T").log)
#rsync -aAXv --delete -e ssh sysInfo/ user@centralServer:/path/to/logs.
rsync -aAXv -e ssh /home/frozenpizzas4567/sysInfo/ frozenpizzas4567@34.237.92.151:/usr/local/share/sysInfo/


