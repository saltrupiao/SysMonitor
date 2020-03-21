#!/bin/bash
$(./netinfo.py >> sysInfo/file$(date +"%m-%d-%y-%T").log)
#rsync -aAXv --delete -e ssh sysInfo/ user@centralServer:/path/to/logs.


