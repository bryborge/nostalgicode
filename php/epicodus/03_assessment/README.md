##Style-On Salon App
unleash your inner chic.

###Developers
* Name: Bryan Borgeson
* Alias: monkecheese
* Twitter: SonOfBorge

###Date
March 20, 2015

###Purpose
This is the third assessment in the PHP Curriculum at Epicodus. It seeks to teach students about databases, SQL, One-to-many database relationship schemas, and how to create an interfacing app to a database backend (with CRUD).  Also, this assessment helps students to reinforce concepts in Behavior-Driven Development (BDD), app testing, and Object-Oriented Programming (OOP) with PHP.

###Description
Style-On Salon is an app which allows stylists to keep track of all of their individual clients.  It will also allow stylists to edit their names and delete their names from a list of stylists.

###Use and Editing
To use this app, simply: <br />
1. Download and Extract the compressed file into the directory you'd like your project to live in. <br />
2. Load the project folder into your text editor. <br />
3. Start PHP in the web folder of the project directory. <br />
4. Open up your browser and point it to the location of php (ex: localhost:8000) <br />
5. You'll also need to install and run postgresql, and import the hair_salon.sql file located in this project file's root directory. <br />
*if you have issues, try deleting the vendor folder (and its contents) as well as the compose.lock file, then open terminal and run composer install*

###Notes to Epicodus Instructor
Here is what I did to set up the database using postgresql:<br />

1. Start Postgres:<br />
        user@home:~$ postgres<br />
        user@home:~$ psql<br />

2. Create primary database and connect to it:<br />
        postgres=# CREATE DATABASE hair_salon;<br />
        postgres=# \c hair_salon;<br />

3. Create tables for stylists and clients:<br />
        hair_salon=# CREATE TABLE stylists (id serial, name varchar);<br />

            Column |       Type        |              Modifiers
            -------+-------------------+------------------------------------------------------
            id     | integer           | not null default nextval('stylists_id_seq'::regclass)
            name   | character varying |


        hair_salon=# CREATE TABLE clients (id serial, name varchar, stylist_id);

              Column   |       Type        |          Modifiers
            -----------+-------------------+-----------------------------------------------------
            id         | integer           | not null default nextval('clients_id_seq'::regclass)
            name       | character varying |
            stylist_id | integer           |

4. Create test database using hair_salon as a template:<br />
        hair_salon=# CREATE DATABASE hair_salon_test TEMPLATE hair_salon;<br />

5. Open new terminal window and copy database files to to root directory of project:<br />
        user@home:~$ pg_dump hair_salon -f hair_salon.sql<br />
        user@home:~$ pg_dump test_hair_salon -f test_hair_salon.sql<br />

###License & Copyright (c) 2015 Bryan Borgeson

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
