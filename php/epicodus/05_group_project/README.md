# Client Management System

A client management system tailored for homeless shelters and non profits

## Purpose

This project was intially put together in one week as a class assignment at
[Epicodus](http:/epicodus.com), a Portland-based Coding Bootcamp. Technology is
developing at an unprecidented rate, with no signs of slowing down, leaving many
non-profit organizations that are already struggling to remain open considerably
behind the curve. It is our hope that shelters across the globe will benefit
from this open-source project.

## Description

CMS is currently on the cusp of a working beta. The Client Management System is
a robust web application that allows shelter staff to manage client information
and case work. Data queries are as easy as filling out simple forms, and
progressive, flexible search makes it easy to get the information that matters
when it matters.

## Known Issues

As stated under Description, this project is close to a working beta, but is not
yet functioning the way it is intended. Here are the known issues and unfinished
parts of the project:

* The Dashboard: Completely static at this point. Needs to function with the
  database (exit buttons, edit button, medication and allergy links currently not functional).
* Clean up the code: Separate twig file for nav bar.
* Make search work in the nav bar on every page.
* Create plain-text (easily printable) pages from the queries drop down in the
  nav bar
* Create easily accessible "Add Client" and "Add Stay" pages, so that the user
  isn't forced to search for a client first an go through a weird roundabout to
  do these simple tasks.

## How To Use

1. Download and Extract the compressed file into the directory you'd like your
   project to live in or clone this repository using git.
1. Load the project folder into your text editor.
1. (cont.) In terminal, run "composer install" while in the root directory of
   the project folder.
1. Import the sql file included in this project into postgres.

*note: if you get the error "User 'epicodus' does not exist," do the following:*

```
DROP DATABASE cms;
CREATE USER epicodus;
CREATE DATABASE cms;
\c cms;
\i cms.sql*
```

Start PHP in the /web folder of the project directory.

*ex: php -S localhost:8000*

1. Point your browser to the localhost address you specified in PHP.

*ex: localhost:8000*

## Database Contingency Instructions

If you have little or no success importing the database as described in the
steps above, follow these instructions to create the database on your own. For a
visual representation of the database schema, please see the cms_db_screencap.png
file in the root directory of this project. For postgres documentation, click
[here](https://wiki.postgresql.org/wiki/Main_Page).

1. Install and Start postgres.
1. Create database "cms" and connect to it.
1. Create the tables (the tables, fields, and data types are specified in the cms_db_screencap.png).
1. Create a test database called cms_test with cms as a template (if you intend to run tests and work on development for this project).
1. use pg_dump command to make a copy of your database(s) in the root directory of the project.
