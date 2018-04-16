# Great Outdoor Provision Co.

## Project Overview

This repo houses the code that lives on greatoutdoorprovision.com.

## Project Setup

This project uses docker for local development. To setup a local environment:

1. clone the repo
2. install Docker for your operating system
3. navigate to the project folder locally, and run `docker-compose up -d`

### Notes about the local database

We're using an export of the production database for local development. This data has not been updated in a number of months, but you can update it at any time by replacing the SQL export into the data folder. Docker will inspect that folder on startup to seed your local database.

## Staging Environment

WPEngine has a 1-click live to staging feature that allows easy replication of the production site to a staging environment for testing. We'd strongly recommend any code changes be tested on staging before deploying to production.

## Deployment

We use WPEngine for hosting. WPEngine leverages git for deployments to both staging and production (via 2 different remote URLs). For access and instructions please see the WPEngine dashboard/docs. If you require access to the WPEngine dashboard, please contact [Josh Mobley](https://github.com/joshmobley).

## Project Gotchas

*__PLEASE READ__*

The biggest gotcha on this project, is that the navigation menus are periodically updated by the GOPC staff directly via the wordpress editor. This has been a painpoint to this point that has not been addressed, but obviously the menus will eventually need to be managed via the database, and not HTML.
For now, you'll need to ensure that you copy the production mega-menus code before each deployment to ensure that you do not overwrite changes.

Please coordinate all deployments with [Beth Khalifa](mailto:beth@designbox.us) to ensure a collision-free deployment.
