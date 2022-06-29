#!/bin/sh
# Script to make a deployment
echo Starting deployment.
git stash
git pull
git status
composer update --no-install
git add .
git commit -m "ci: update lockfile"
git push origin