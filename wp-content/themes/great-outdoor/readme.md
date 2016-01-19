# Starter WordPress Theme

This starter theme is a basic WordPress theme I created to quickly start development on new themes while I was working at NC State.  SInce then, I've made some modiications to generalize it for wider use.  There isn't much to it except a basic theme structure, a Grunt task for CSS compilation and JavaScript minification, and few common dependencies like JQuery and Bootstrap. Feel free to fork and modify it as you please under the MIT license.

## Get Started

1. [Install Node.js](https://nodejs.org/en/download/)
1. Run `npm install -g bower` to install Bower.
1. Run `npm install -g grunt-cli` to install the Grunt command line interface.
1. Run `./scripts/refresh.sh` to install dependencies, and clean up stale dependencies and build files.
1. Run `grunt` to compile CSS and add watcher for changes to CSS and JavaScript.

