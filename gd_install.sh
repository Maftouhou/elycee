#!/usr/bin/env bash

if [ ! -d ./node_modules ]; then
    npm install --save-dev gulp
    npm install --save-dev gulp-sass
    npm install --save-dev gulp-minify-css
    npm install --save-dev gulp-concat
    npm install --save-dev gulp-rename
    npm install --save-dev gulp-uglify
else
    echo "GULP Dependencies are ready"
fi

if [ ! -f gulpfile.js ]; then
    touch gulpfile.js
fi