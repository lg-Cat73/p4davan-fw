#! /bin/bash
#
# up.sh
# Copyright (C) 2016 hacklog <hacklog@80x86>
#
# Distributed under terms of the MIT license.
#

git pull origin master
git push origin master
git push coding master:coding-pages
git push coding master
echo 'done.'
