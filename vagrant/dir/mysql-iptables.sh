#!/bin/bash

MYSQL="mysql -h127.0.0.1 -ulbmzorxip -paljfnf21IufjanlPafeklllfmvb start_admin --default-character-set=utf8 -A -N"

sql="select ip from sadmin_attack_ip where is_limit=0"
result="$($MYSQL -e "$sql")"
#columnNum = 1
echo $result

lenstr=${#result}

echo $lenstr

#ip=${result%%i*}
#echo $ip


arr=$result
Iptables=/usr/sbin/iptables

for ip in $arr; do
   echo $ip
   $Iptables -A INPUT -s $ip -j DROP
   if [ $? -eq 0 ]
   then
       sql="update sadmin_attack_ip set is_limit=1 where ip='${ip}'"
       $MYSQL -e "$sql"
   fi
done


#while [ $lenstr -gt 0 ] ; 
#do
#     ip=${var%% *}
#
#     echo $ip"\n"
#    
#     result=${result#* }
#     lenstr=${#result}
#
#done


#for (( i= $columnNum; i<=$result; i=i+1))
#do
#   name=`getValue $i 2`
#   #
#   city_name=`getValue $i 1`
#
#   result=$(curl -X GET $url)
#   echo $result
#   sleep 0.8
#done
