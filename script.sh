#!/bin/bash

HOSTLIST="hostlist"
POWERONLIST=`./ping.sh`

function listrooms() {
	while read HOSTLINE
	 do
	  set $HOSTLINE
#	  HIP=$1
#	  HNAME=$2
	  HROOM=$3
	  if [ ${1:0:1} != "#" ] ; then #comment checking
	    ROOMLIST=$ROOMLIST`echo "$HROOM\n"`
	  fi
	done < $HOSTLIST
	ROOMLIST=`echo -e $ROOMLIST | sort | uniq | grep -v '^$'`
	echo -e $ROOMLIST
}

case "$1" in
	listrooms) listrooms;;
esac

