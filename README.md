#SysMonitor

#Central Server Configuration

How to configure:
  1) Edit the passwd.txt file to include your database password. 
  2) Edit inventory.txt to point to your client's external IP addresses.
  3) Configure your DSN in the login.php file.
  4) Roll out the client tarball on your client machines.
  5) Configure the "JSONfiles" variable in the JS chart files; assets/js/ (disk, cores, memory, network, and overview) to include your
     clients hostnames


#Client Configuration
## Setup client node
  1) Make sure the following python modules are installed:
    - pustil
    - flask
  2) Expand tarball on client device.
  3) Run the following command so it will remian active in the background:
    `python3 app.py flask run`
## Add client node to server
  1) Run the following command on the central server:
    `/usr/local/bin/mainRefactor.py --newHost [ClientIPAddress]`

