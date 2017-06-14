#! /bin/bash
#
# up.sh
# Copyright (C) 2016 hacklog <hacklog@80x86>
#
# Distributed under terms of the MIT license.
#

cp -v ./docs/release/*.txt ../p4davan-page/static/firmware/release/
echo 'Done.'
cd ../p4davan-page
git add -u

# Commit changes.
echo -e "\033[0;32mCommit changes.\033[0m"
msg="release new firmware `date`"
git commit -m "$msg"
git push origin master

cd ../p4davan
