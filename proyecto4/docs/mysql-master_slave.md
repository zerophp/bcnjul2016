# MySQL Master/Slave

1. Add to my.cnf
```
[mysqld]
log-bin=mysql-bin
server-id=1
----------------binlog_do_db            = newdatabase
```

sudo service mysql restart

2. Add replication user
mysql> CREATE USER 'repl'@'%.mydomain.com' IDENTIFIED BY 'slavepass';
mysql> GRANT REPLICATION SLAVE ON *.* TO 'repl'@'%.mydomain.com';
GRANT REPLICATION SLAVE ON *.* TO 'slave_user'@'%' IDENTIFIED BY 'password';


3. Obtaining the Replication Master Binary Log Coordinates
mysql> FLUSH TABLES WITH READ LOCK;
mysql> SHOW MASTER STATUS;

4. Data snapshot
shell> mysqldump -u root -p --opt newdatabase > newdatabase.sql



On SLAVE
---------
CREATE DATABASE newdatabase;
EXIT;
Import the database that you previously exported from the master database.

mysql -u root -p newdatabase < /path/to/newdatabase.sql



my.cnf
-------

server-id               = 2
Following that, make sure that your have the following three criteria appropriately filled out:

relay-log               = /var/log/mysql/mysql-relay-bin.log
log_bin                 = /var/log/mysql/mysql-bin.log
binlog_do_db            = newdatabase


sudo service mysql restart


CHANGE MASTER TO MASTER_HOST='12.34.56.789',
       MASTER_USER='slave_user', 
       MASTER_PASSWORD='password', 
       MASTER_LOG_FILE='mysql-bin.000001', 
       MASTER_LOG_POS=  107;
       
START SLAVE;


SHOW SLAVE STATUS;





---- ON MASTER
GRANT REPLICATION SLAVE ON *.* TO 'slave_user'@'%' IDENTIFIED BY 'password';

FLUSH PRIVILEGES;

FLUSH TABLES WITH READ LOCK;

SHOW MASTER STATUS;

UNLOCK TABLES;
       