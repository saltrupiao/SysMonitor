#!/bin/bash
archive=/usr/local/share/sysInfo/$(date +"%m-%d-%y")logs
mkdir $archive
for files in $(find /usr/local/share/sysInfo/*.log -type f -mtime +1)
do
    mv files $archive
tar -cvzf $archive.tar $archive/*
rmdir $archive 
