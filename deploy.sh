#!/bin/bash

jekyll build
scp -r _site/* webmaster_maartendewaard_nl@shell.greenhost.nl:maartendewaard.nl/feestje
