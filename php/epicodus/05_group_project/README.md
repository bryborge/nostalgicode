##Client Management System
A client management system tailored for homeless shelters and non profits

###Developers
Bryan Borgeson, Cynthia Wilhelm, Daniel Toader, Kenna Warsinske, Liz Beacham

###Date
Start Date: March 31, 2015

###Purpose
This project was intially put together in one week as a class assignment at [Epicodus](http:/epicodus.com), a Portland-based Coding Bootcamp. Technology is developing at an unprecidented rate, with no signs of slowing down, leaving many non-profit organizations that are already struggling to remain open considerably behind the curve. It is our hope that shelters across the globe will benefit from this open-source project.

###Description
CMS is currently on the cusp of a working beta.  The Client Management System is a robust web application that allows shelter staff to manage client information and case work.  Data queries are as easy as filling out simple forms, and progressive, flexible search makes it easy to get the information that matters when it matters.

###Known Issues
As stated under Description, this project is close to a working beta, but is not yet functioning the way it is intended.  Here are the known issues and unfinished parts of the project:
- The Dashboard: Completely static at this point.  Needs to function with the database (exit buttons, edit button, medication and allergy links currently not functional).
- Clean up the code: Separate twig file for nav bar.
- Make search work in the nav bar on every page.
- Create plain-text (easily printable) pages from the queries drop down in the nav bar
- Create easily accessible "Add Client" and "Add Stay" pages, so that the user isn't forced to search for a client first an go through a weird roundabout to do these simple tasks.

###How To Use
1. Download and Extract the compressed file into the directory you'd like your project to live in or clone this repository using git.<br />
2. Load the project folder into your text editor.<br />
2. (cont.) In terminal, run "composer install" while in the root directory of the project folder.<br />
3. Import the sql file included in this project into postgres.<br />
*note: if you get the error "User 'epicodus' does not exist," do the following<br />
a) DROP DATABASE cms;<br />
b) CREATE USER epicodus;<br />
c) CREATE DATABASE cms;<br />
d) \c cms;<br />
e) \i cms.sql*<br />
4. Start PHP in the /web folder of the project directory.<br />
*ex: php -S localhost:8000*
5. Point your browser to the localhost address you specified in PHP.<br />
*ex: localhost:8000*

###Database Contingency Instructions
If you have little or no success importing the database as described in the steps above, follow these instructions to create the database on your own.  For a visual representation of the database schema, please see the cms_db_screencap.png file in the root directory of this project. For postgres documentation, click [here](https://wiki.postgresql.org/wiki/Main_Page).<br />
1. Install and Start postgres.<br />
2. Create database "cms" and connect to it.<br />
3. Create the tables (the tables, fields, and data types are specified in the cms_db_screencap.png).<br />
4. Create a test database called cms_test with cms as a template (if you intend to run tests and work on development for this project).<br />
5. use pg_dump command to make a copy of your database(s) in the root directory of the project.<br />

###Copyright (c) 2015 Bryan Borgeson, Cynthia Wilhelm, Daniel Toader, Kenna Warsinske, Liz Beacham

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
