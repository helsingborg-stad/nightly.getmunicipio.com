#!/bin/sh
# Script to make a deployment
echo Starting deployment.
git checkout master
git pull
git status
git add .
composer update
git commit -m "ci: update lockfile"
git push origin