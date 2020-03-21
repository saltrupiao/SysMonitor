#!/bin/bash

ip a s | cut -d" " -f 2 | cut -d":" -f 1 | grep -v "^$"
df -h | grep -v loop | grep -v tm



