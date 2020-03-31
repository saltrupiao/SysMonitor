#!/bin/bash
$(/usr/local/bin/netinfo.py >> sysInfo/file$(date +"%m-%d-%y-%T").log)
rsync -aAXv --delete -e "ssh -i privateKey1.pem" sysInfo/ cyrus2223@35.237.92.151:/home/cyrus2223/sysInfo

