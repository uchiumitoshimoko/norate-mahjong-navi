DATESTR=`date --date '1 days ago' +%Y%m%d`
#DATESTR='20130902'

#mkdir /var/www/c_system/app/tmp/kartemaster/${DATESTR}

wget --no-check-certificate --http-user=clj-web --http-passwd=Sm6w3k8A https://apis.anicli24.net:8089/download/allCustomerProducts_${DATESTR}.zip -P /var/www/c_system/app/tmp/kartemaster

unzip -oP Sm6w3k8A -d /var/www/c_system/app/tmp/kartemaster /var/www/c_system/app/tmp/kartemaster/allCustomerProducts_${DATESTR}.zip

rm -f /var/www/c_system/app/tmp/kartemaster/allCustomerProducts_${DATESTR}.zip
