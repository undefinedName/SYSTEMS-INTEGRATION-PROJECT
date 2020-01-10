## Project Components
* VirtualBox: https://www.virtualbox.org/
* Ubuntu Linux 18.04 LTS: https://ubuntu.com/download/desktop
* Mobile Device Hotspot for connection between virtual machines
## API
USDA's National Farmer's Market Directory API: https://search.ams.usda.gov/farmersmarkets/v1/svcdesc.html 
## Service:
Our project utilizes the USDA's National Farmer's Market Directory API to allow users to find farmer's markets in their area based on zip code and desired products. They would be able to see market locations, hours, available products, and link to google maps to see where the market is. Users can create a profile where they can save their favorite products by which products are available in markets associated with their registered zip code. Users can easily update their profiles to reflect any changes. Based on the shopping list users create, recommendations will be made based on the products in their list. Users are notified to check out recommendations so they can see if there is anything they would like to add to their list. Our website also features a message board where users can interact. Local farmer's markets may change more frequently than most businesses, so users can update each other on changes that may not be posted online as quickly on the message board.
## VM Setup:
The virtual machines must be setup to communicate.
1. After creating a virtual machine with Linux, shutdown the VM, and open the VirtualBox Manager.
2. Select the Network Tab.
3. For adapter 1 change "Attached to:" from "NAT" to "Bridged Adapter".
4. Click on the Advanced dropdown
5. Change "Promiscuous Mode:" from "Deny" to "Allow All".
6. From the device that is running VirtualBox, connect to a mobile hotspot or utilize a network router.
7. Startup your VM(s) and use "ip addr show" in the terminal to see the ip address.
8. Use "ping [neighbor vm ip]" to test communication between vms. 

```The virtual machines will require package installations. You can install synaptic or aptitude for a GUI to help install
Open a terminal and install with: sudo apt-get install [package name]
All virtual machines will require: php, php-amqp, rabbitmq-server, git
Additional packages:
Database VM(s): mysql-server
Apache VM(s): apache2
DMZ VM(s): curl
```
## MySQL Database
Make sure mysql-server and rabbitmq-server is installed.
1. Create a directory and git clone https://github.com/hsm24/IT490.git for the db folder.
2. Start:  mysql -u root -p
3. If this is the first time using mysql, set a password for root.
4. Create a database: CREATE DATABASE [name];
5. Setup desired users and grant privileges based on needs. For testing a testUser with ALL PRIVILEGES on the created database is useful.
```
CREATE USER 'username'@'localhost IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON [db name].* TO 'username'@'localhost';
```
6. You can import the fmarket database:
```
exit mysql
mysql -u username -p [db name] < [filename.sql]
```
7. Assign the BROKER_HOST for the DB in the testRabbitMQ.ini file.
 
## DMZ Server
Make sure rabbitmq-server and PHP-CURL is installed
1. Create a directory and git clone https://github.com/hsm24/IT490.git for the dmz folder.
2. Install : rabbitmq-plugins enable rabbitmq_management
3. More detailed info on how to use rabbitmq: https://www.rabbitmq.com/management.html
4. Go to http://localhost:15672/
5. Sign in as user: guest password: guest. Create a test user, testHost, testExchange, testQueue.
6. Bind the exchange and the queue.
7. Assign the BROKER_HOST for the DMZ in the testRabbitMQ.ini file.
 ## Apache VM
Make sure apache2 is installed
1. Create a directory for your website files
sudo mkdir -p /var/www/html/website.com/{public_html,log,backups}
2. Git clone https://github.com/hsm24/IT490.git for the apache2 folder.
3.  Move 490test.com.conf to /etc/apache2/sites-available/website.com.conf
4. Disable the default virtual host : sudo a2dissite *default
5. Enable the website with: sudo a2ensite website.com.conf
6. Apply these changes with: sudo systemctl reload apache2 
7. Assign the BROKER_HOST for the DB/RMQ in the testRabbitMQ.ini file.

## Additional Setup 
* Firewalls:
```
Install firewall using: sudo apt install ufw
Block all incoming: sudo ufw default deny incoming
Allow outgoing: sudo ufw default allow outgoing
Allow ssh: sudo ufw allow 22
Allow rabbit: sudo ufw allow 5672
Allow rabbit dev site: sudo ufw allow 15672
Allow traffic from other VMs using: sudo ufw allow from <IP>
Enable the firewall: sudo ufw enable
```
* System.d:
```
On the DMZ VM: put 490dmz.service into /lib/systemd/system/
On the database VM: put 490db.service into /lib/systemd/system/
```

## Final Contributors:
* [Jnb176](https://github.com/Jnb176)
* [undefinedName](https://github.com/undefinedName)
