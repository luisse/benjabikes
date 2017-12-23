#!/bin/bash
DB_FILE="OC_BKP-`date +%Y_%m_%d_%H_%M_%S`"
DB_BK_FOLDER="/home/luis/PHP/benjabike_oc"
DB_BACKUP="$DB_BK_FOLDER$DB_FILE"
FTP_SERVER="ftp.viveogroup.com"
FTP_USER="faka@viveogroup.com"
FTP_PASSW="faka2044$"
DB_MIRROR="BKP_OPEN_CART.tar.gz"

echo "Creating MySQL Dump"
mysqldump --routines --skip-triggers --lock-tables=false benjabike_oc > $DB_BACKUP.sql

echo "Comprimiendo"
#sed -i 's/pmv_faka/faka_mirror/g' $DB_BK_FOLDER"MYSQL_MIRROR.sql"
tar czvf $DB_BACKUP.tar.gz $DB_BACKUP.sql
#tar czvf $DB_BACKUP_FOLDER"MYSQL_MIRROR.tar.gz" $DB_BACKUP_FOLDER"MYSQL_MIRROR.sql"

#echo "Borrando archivo $DB_BACKUP"
rm $DB_BACKUP.sql

#echo "Subiendo a FTP"
#lftp -u $FTP_USER,$FTP_PASSW -e "set ftp:ssl-allow no; mput $DB_BK_FOLDER$DB_FILE.tar.gz; quit" $FTP_SERVER
echo "Done"
git add *
git commit -m "."
git push