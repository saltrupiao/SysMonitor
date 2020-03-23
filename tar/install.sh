#!/bin/bash

# =================================================================
# Description: (***Execute script as sudo***)
#		1.) Installs python3, psutil, rsync.
# 		2.) Creates sysInfo folder in current working directory 
#		3.) Sets privlages on privateKey.pem
#		4.) Creates cron job to execute networkinfo.sh file 
# =================================================================

# command line args
user = $1
installdir = $2

# install python
yum -y install python3

# install psutil
yum -y install gcc python3-dev
yes | pip3 install psutil

# install rsync
yum -y install rsync

# create folder to store logs
mkdir $installdir/sysInfo

# set privlages on private key
mkdir -p ~/.ssh/sysmonitor
cp id_rsa ~/.ssh/sysmonitor/
chmod 600 ~/.ssh/sysmonitor/id_rsa

# create cron job to execute bash script
# append user to allow list
$user >> /etc/cron.allow
# create cron file for user
touch /var/spool/cron/$user/usr/bin/crontab /var/spool/cron/$user
# create cron job
echo "0 0 * * * ./networkinfo.sh" >> /var/spool/cron/$user
# validate cron job for user
crontab -u $user -l
