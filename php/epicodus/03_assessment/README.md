# Style-On Salon App

Unleash your inner chic.

## Purpose

This is the third assessment in the PHP Curriculum at Epicodus. It seeks to
teach students about databases, SQL, One-to-many database relationship schemas,
and how to create an interfacing app to a database backend (with CRUD). Also,
this assessment helps students to reinforce concepts in Behavior-Driven
Development (BDD), app testing, and Object-Oriented Programming (OOP) with PHP.

## Description

Style-On Salon is an app which allows stylists to keep track of all of their
individual clients. It will also allow stylists to edit their names and delete
their names from a list of stylists.

## Use and Editing

To use this app, simply:

1. Download and Extract the compressed file into the directory you'd like your project to live in.
1. Load the project folder into your text editor.
1. Start PHP in the web folder of the project directory.
1. Open up your browser and point it to the location of php (ex: localhost:8000)
1. You'll also need to install and run postgresql, and import the hair_salon.sql file located in this project file's root directory.

*if you have issues, try deleting the vendor folder (and its contents) as well
as the compose.lock file, then open terminal and run composer install*

## Note to Epicodus Instructor

Here is what I did to set up the database using postgresql:

1. Start Postgres:

    ```
    user@home:~$ postgres
    user@home:~$ psql
    ```

1. Create primary database and connect to it:

    ```
    postgres=# CREATE DATABASE hair_salon;
    postgres=# \c hair_salon;
    ```

1. Create tables for stylists and clients:

    ```
    hair_salon=# CREATE TABLE stylists (id serial, name varchar);

    Column |       Type        |              Modifiers
    -------+-------------------+------------------------------------------------------
    id     | integer           | not null default nextval('stylists_id_seq'::regclass)
    name   | character varying |

    hair_salon=# CREATE TABLE clients (id serial, name varchar, stylist_id);

    Column     |       Type        |          Modifiers
    -----------+-------------------+-----------------------------------------------------
    id         | integer           | not null default nextval('clients_id_seq'::regclass)
    name       | character varying |
    stylist_id | integer           |
    ```

1. Create test database using hair_salon as a template:

    ```
    hair_salon=# CREATE DATABASE hair_salon_test TEMPLATE hair_salon;
    ```

1. Open new terminal window and copy database files to to root directory of project:

    ```
    user@home:~$ pg_dump hair_salon -f hair_salon.sql
    user@home:~$ pg_dump test_hair_salon -f test_hair_salon.sql
    ```
