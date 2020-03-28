#!/bin/bash

jekyll build
rsync --progress --delete -av _site/* webmaster_maartendewaard_nl@shell.greenhost.nl:maartendewaard.nl/feestje
