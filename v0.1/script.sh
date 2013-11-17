#!/bin/bash

HOSTLIST="./data/hostlist.lst"

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

function hostlist() {
    ROOM=$1
    while read HOSTLINE
      do
        set $HOSTLINE
	HIP=$1
	HNAME=$2
	HROOM=$3
	if [ ${1:0:1} != "#" ] ; then
	  if [ $3 = $ROOM ] ; then
	    HLIST=$HLIST`echo "$HIP $HNAME "`
	  fi
	fi
      done < $HOSTLIST
      echo $HLIST
}

case "$1" in
	listrooms) listrooms;;
	hostlist) hostlist $2;;
esac

