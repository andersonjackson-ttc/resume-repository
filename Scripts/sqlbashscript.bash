#!/bin/bash

# Must be run as super user
wget https://github.com/andersonjackson-ttc/resume-repository/archive/master.zip
unzip master.zip resume-repository-master/Scripts/databaseCreation.sql
mysql -u root -p < databaseCreation.sql
rm -rf resume-repository-master
rm databaseCreation.sql

