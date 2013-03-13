#!/bin/bash

HOSTLIST="hostlist"
CHECKLIST=""

while read HOSTLINE
 do
  set $HOSTLINE
  HIP=$1
  if [ ${HIP:0:1} != "#" ] ; then #comment checking
    CHECKLIST=`echo $CHECKLIST $1`
  fi
done < $HOSTLIST
#echo $CHECKLIST

OUT=`nmap -sP -n $CHECKLIST`
echo $OUT | grep -o '[0-9]\{1,3\}\.[0-9]\{1,3\}\.[0-9]\{1,3\}\.[0-9]\{1,3\}'

