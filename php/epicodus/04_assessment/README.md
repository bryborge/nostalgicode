##Sick Kicks
Carry yourself through Life, in Style

###Developers
Bryan Borgeson

###Date
Update: March 27, 2015<br />

###Purpose
This is the fourth assessment in the PHP Curriculum at Epicodus. It seeks to teach students about databases, SQL, many-to-many database relationship schemas, and how to create an interfacing app to a database backend (with CRUD).  Also, this assessment helps students to reinforce concepts in Behavior-Driven Development (BDD), app testing, and Object-Oriented Programming (OOP) with PHP.

###Description
This app, when complete, will allow the user to add stores that sell particular brands of shoes.  Conversely, when a user clicks on a store, the will be able add brands to the inventory of that particular store.

###Use and Editing
To use this app, simply:<br />
1. Download and Extract the compressed file into the directory you'd like your project to live in or clone this repository using git.<br />
2. Load the project folder into your text editor.<br />
3. Import the sql file included in this project into postgres.<br />
4. Start PHP in the web folder of the project directory.<br />
5. Point your browser to the localhost address you specified in PHP.<br />
*ex: localhost:8000*

###Notes for Epicodus Instructor
Here is what I did to set up the database using postgresql:<br />

1. Start Postgres:<br />
        user@home:~$ postgres<br />
        user@home:~$ psql<br />

2. Create primary database and connect to it:<br />
        postgres=# CREATE DATABASE shoes;<br />
        postgres=# \c shoes;<br />

3. Create tables for brands, stores, and a join table:<br />
        shoes=# CREATE TABLE brands (id serial, brand_name varchar);<br />

            Column       |       Type        |              Modifiers
            -------------+-------------------+------------------------------------------------------
            id           | integer           | not null default nextval('brands_id_seq'::regclass)
            brand_name   | character varying |


        shoes=# CREATE TABLE stores (id serial, store_name varchar);<br />

              Column         |       Type        |          Modifiers
            -----------------+-------------------+-----------------------------------------------------
            id               | integer           | not null default nextval('stores_id_seq'::regclass)
            store_name       | character varying |

        shoes=# CREATE TABLE brands_stores (id serial, brands_id int, stores_id int);<br />

            Column     |  Type   |                         Modifiers
            -----------+---------+------------------------------------------------------------
            id         | integer | not null default nextval('brands_stores_id_seq'::regclass)
            brands_id  | integer |
            stores_id  | integer |

4. Create test database using shoes as a template:<br />
        shoes=# CREATE DATABASE shoes_test TEMPLATE shoes;<br />

5. Open new terminal window and copy database files to to root directory of project:<br />
        user@home:~$ pg_dump shoes -f shoes.sql<br />
        user@home:~$ pg_dump shoes_test -f shoes_test.sql<br />

###Copyright (c) 2015 Bryan Borgeson

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
