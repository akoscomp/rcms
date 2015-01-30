#!/usr/bin/env python

import time
from time import sleep
import pifacedigitalio
import sys

if len(sys.argv) < 2:
    sys.stderr.write('Error: no argument')
    sys.exit(1)

localtime = time.strftime('%Y-%m-%d %H:%M:%S')

print localtime, "- Ring start:", sys.argv[1]
p = pifacedigitalio.PiFaceDigital()

p.leds[0].turn_on()
p.leds[1].turn_on()
sleep(int(sys.argv[1]))
p.output_port.all_off()

print localtime, " - Ring stop."
