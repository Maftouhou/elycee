#!/usr/bin/env bash
USERNAME='root'
PASSWORD=''
DBNAME='db_elycee'
HOST='localhost'

USER_USERNAME='mafthib'
USER_PASSWORD='Projet2016'

MySQL=$(cat <<EOF
DROP DATABASE IF EXISTS $DBNAME;
CREATE DATABASE $DBNAME DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
DELETE FROM mysql.user WHERE user='$USER_USERNAME' and Password='$USER_PASSWORD';
GRANT ALL PRIVILEGES ON $DBNAME.* to '$USER_USERNAME'@'$HOST' IDENTIFIED BY '$USER_PASSWORD' WITH GRANT OPTION;
EOF
)
# echo $MySQL | mysql --user=$USERNAME --password=$PASSWORD

echo 'Creation de la base de donnée '$DBNAME' effectué';
