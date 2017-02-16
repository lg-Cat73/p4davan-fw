#! /bin/bash
#
# up.sh
# Copyright (C) 2016 hacklog <hacklog@80x86>
#
# Distributed under terms of the MIT license.
#

cp -rv ./docs/release/ ../p4davan-page/docs/release/
echo 'Done.'
cd ../p4davan-page && git stn ./ && cd ../p4davan
