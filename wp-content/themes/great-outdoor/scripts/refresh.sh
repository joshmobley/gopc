#!/bin/sh

echo "Removing dependencies ..."
rm -rf node_modules bower_components

echo "Removing build files ..."
rm css/styles.css css/styles.min.css css/styles.min.css.map
rm js/main.min.js js/main.min.js.map

echo "Installing dependencies ..."
npm install
bower install
