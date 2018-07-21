#!/bin/bash
while read oldrev newrev ref
do
    # only checking out the master (or whatever branch you would like to deploy)
    if [[ $ref =~ .*/master$ ]];
    then
        echo "Master ref received.  Deploying master branch to production..."
        git --work-tree=/var/www/html/apps/deploy-folder/ --gi dir=/var/www/html/apps/https://github.com/jlswamy8/myrepository.git/ checkout -f
    else
        echo "Ref $ref successfully received.  Doing nothing: only the master branch may be deployed on this server."
    fi
done