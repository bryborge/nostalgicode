# Sick Kicks

Carry yourself through Life, in Style

## Purpose

This is the fourth assessment in the PHP Curriculum at Epicodus. It seeks to
teach students about databases, SQL, many-to-many database relationship schemas,
and how to create an interfacing app to a database backend (with CRUD). Also,
this assessment helps students to reinforce concepts in Behavior-Driven
Development (BDD), app testing, and Object-Oriented Programming (OOP) with PHP.

## Description

This app, when complete, will allow the user to add stores that sell particular
brands of shoes. Conversely, when a user clicks on a store, the will be able add
brands to the inventory of that particular store.

## Use and Editing

To use this app, simply:

1. Download and Extract the compressed file into the directory you'd like your project to live in or clone this repository using git.
1. Load the project folder into your text editor.
1. Import the sql file included in this project into postgres.
1. Start PHP in the web folder of the project directory.
1. Point your browser to the localhost address you specified in PHP.

*ex: localhost:8000*

## Note for Epicodus Instructor

Here is what I did to set up the database using postgresql:

1. Start Postgres:

    ```
    user@home:~$ postgres
    user@home:~$ psql
    ```

1. Create primary database and connect to it:

    ```
    postgres=# CREATE DATABASE shoes;
    postgres=# \c shoes;
    ```

1. Create tables for brands, stores, and a join table:

    ```
    shoes=# CREATE TABLE brands (id serial, brand_name varchar);

    Column       |       Type        |              Modifiers
    -------------+-------------------+------------------------------------------------------
    id           | integer           | not null default nextval('brands_id_seq'::regclass)
    brand_name   | character varying |


    shoes=# CREATE TABLE stores (id serial, store_name varchar);

      Column     |       Type        |          Modifiers
    -------------+-------------------+-----------------------------------------------------
    id           | integer           | not null default nextval('stores_id_seq'::regclass)
    store_name   | character varying |

    shoes=# CREATE TABLE brands_stores (id serial, brands_id int, stores_id int);

    Column     |  Type   |                         Modifiers
    -----------+---------+------------------------------------------------------------
    id         | integer | not null default nextval('brands_stores_id_seq'::regclass)
    brands_id  | integer |
    stores_id  | integer |
    ```

1. Create test database using shoes as a template:

    ```
    shoes=# CREATE DATABASE shoes_test TEMPLATE shoes;
    ```

1. Open new terminal window and copy database files to to root directory of project:

    ```
    user@home:~$ pg_dump shoes -f shoes.sql
    user@home:~$ pg_dump shoes_test -f shoes_test.sql
    ```
