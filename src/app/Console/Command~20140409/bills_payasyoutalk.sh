DATESTR=`date --date '1 month ago' +%Y%m`
#DATESTR='20130902'

mkdir /var/www/c_system/app/tmp/bill_pre_use/${DATESTR}

wget --no-check-certificate --http-user=clj-web --http-passwd=Sm6w3k8A https://apis.anicli24.net:8089/download/bills_payasyoutalk_${DATESTR}.zip -P /var/www/c_system/app/tmp/bill_pre_use/${DATESTR}

unzip -oP Sm6w3k8A -d /var/www/c_system/app/tmp/bill_pre_use/${DATESTR} /var/www/c_system/app/tmp/bill_pre_use/${DATESTR}/bills_payasyoutalk_${DATESTR}.zip

rm -f /var/www/c_system/app/tmp/bill_pre_use/${DATESTR}/bills_payasyoutalk_${DATESTR}.zip
