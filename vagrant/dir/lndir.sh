#!/bin/bash
#
#aotu to sh
#
#
function lnFile (){
	if [ -f $2"/"$3 ];then
		rm -f $2"/"$3
	fi
	echo `ln -s $1 $2`
}

function lnreadfile ()
{
#
  for file in `ls $1`
  do
#-d is directory
    if [ -d $1"/"$file ]
    then

      if [ -d $2"/"$file ]
      then
      	  mkdir $2"/"$file
      fi
      lnreadfile $1"/"$file $2"/"$file

    else

        #read d
       lnFile $1"/"$file $2 $file

   fi
  done
}
$lnspath=/usr/local/lib/lua/5.1/resty/
$path=/usr/local/openresty/lualib/resty/
lnreadfile $path $lnspath