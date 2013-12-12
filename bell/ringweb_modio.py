#!/usr/bin/env python
# -*- coding: utf-8 -*-

import smbus

import sys
bus = smbus.SMBus(1)
address = 0x58

try:
    sys.argv[1]
except:
    print "Not OK"
else:
    if sys.argv[1] == "Start":
        bus.write_byte_data(address, 0x10, 3)
	print "1"
    else:
        bus.write_byte_data(address, 0x10, 0)
        print "0"
