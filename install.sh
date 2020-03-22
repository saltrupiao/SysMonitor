#!/bin/bash

# =================================================================
# Description: (***Execute script as sudo***)
#		1.) Installs python2, python3, psutil, rsync.
# 		2.) Creates sysInfo folder in current working directory 
#		3.) Sets privlages on privateKey.pem
#		4.) Creates cron job to execute networkinfo.sh file 
# =================================================================

user = $1;

# install python
yum -y install python2
yum -y install python3

# install psutil
yum -y install gcc python3-dev
yes | pip3 install psutil

# install rsync
yum -y install rsync

# create folder to store logs
mkdir ./sysInfo

# set privlages on private key
chmod 600 ./privateKey.pem

# create cron job to execute bash script
# append user to allow list
"<user>" >> /etc/cron.allow
# create cron file for user
touch /var/spool/cron/user/usr/bin/crontab /var/spool/cron/user
# create cron job
echo "0 0 * * * ./networkinfo.sh" >> /var/spool/cron/<user>
# validate cron job for user
crontab -u user -l
