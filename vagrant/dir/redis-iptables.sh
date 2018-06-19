#!/usr/bin/env bash
#

#!/usr/bin/env bash

redis-cli -h 127.0.0.1 -p 6379 -a 123456 -n 1 keys  '*' |
while read key
do
    key_val=`redis-cli -h 127.0.0.1 -p 6379 -a 123456 -n 1 get ${key}`
    echo ${key}  ${key_val}
done