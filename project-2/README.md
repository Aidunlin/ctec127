# CTEC 127 - Project No. 2 (2024)

## Project Overview

Be sure to clone this repository to your computer before reading any future. Place it in your **htdocs** folder.

This project will have you modify the **Student Record Management** application that I have provided to include new functionality.

Several new fields have been added to the **student_v2 table**. Yes, **student_v2** will be a new table. More on this later.

You will need to **modify the form PHP code** that inserts new records into the database.

Let's first explore the file and folder structure of the application. The instructor will walk you through the entire application in class.

## File and Folder Structure

- css
  - bootstrap.min.css
  - style.css
- img
  - frown.png
  - nosmile.png
- inc
  - app
    - app.inc.php
  - create
    - content.inc.php
    - form.inc.php
  - db
    - db_connect.inc.php
  - display
    - content.inc.php
  - functions
    - functions.inc.php
  - layout
    - footer.inc.php
    - header.inc.php
    - navbar.inc.php
- js
  - bootstrap.min.js
- sql
  - student_v2.sql
- create-record.php
- delete-record.php
- display-records.php
- search-records.php
- update-record.php
- advanced-search.php
- .gitignore
- .htaccess

## Application Overview

The **Record Management** application has 4 pages that are used by end users.

- **display-records.php** - This is the page that should be launched to start within the application
- **create-record.php** - This page is used to create new records that get inserted into the database
- **search-records.php** - This page gets called when somebody enters text in the navigation bar search box and clicks on the **Search** button
- **advanced-search.php** - This page is in the app navigation and is wired to the search box in the nav

All of these pages uses various components from the **inc**, **css**, **img**, **functions**, **layout**, **app**, **create**, **db**, and **js** folders

The folders for **css**, **img** and **js** are self explanatory

The **db** folder is used for the **db_connect.inc.php** that allows the entire application to connect to the **MySQL (MariaDB)** database

The **inc** folders and **subfolders** have the following sub-folders:

- **app** is used to store a PHP file that stores variables that are used throughout the application
- **create** contains the files that are included in the **create-record.php** page
- **display** contains a file that gets included in the **display-records.php** page
- **functions** contains a file that has several functions that are used throughout the application
- **layout** contains the files for page layout such as the **header**, **footer** and top **navigation**

## Before You Begin

READ THE INFO IN THE PARAGRAPH BELOW BEFORE LAUNCHING YOUR phpMyAdmin

This project will have you create a **new table** in your **ctec database**. The name of the new table will be **student_v2**. There is an **SQL export file** in the **sql folder** that you you should use to create and load the table with data.

## Loading the New student_v2 table

- Start XAMPP and Apache
- Start phpMyAdmin in your browser
- Click on the **ctec** database. If you don't have the **ctec** database then create a new one.
- Now make sure that the **ctec** database is selected and then click on the SQL tab
- Copy and paste all of the data from the student_v2.sql file in the **sql** folder and then click on the **Go** button
- The new table will be created and 100 rows of data will be inserted into the table for you
- Verify that this worked correctly by clicking on **Browse** in phpMyAdmin

## What You Need to Do

The database table contains new columns:

- **id** - This is a field that auto assigns a number every time a new record is inserted. You never need to code anything for this column.
- **gpa** - This field will be used to store a student's **GPA**
- **financial_aid** - This field will be used to store either a 0 or 1. 0 means that they don't have financial aid and 1 means that they do
- **degree_program** - This will contain the name of the degree program that they are currently enrolled in
- **date_created** - This column is a timestamp and is automatically created by the database when a new record is inserted

## So here's the deal

1) Modify the **create_record.php** and any other associated files to include form fields for:

   - The **gpa** field (A number)
   - The **financial_aid** field (A radio button that has the labels Yes and No and the values of 1 and 0 respectively)
   - The **degree_program** fields should be a select tag with at least 5 options

2) Modify the **display_records.php** and any other associated files to show the **gpa**, **financial_aid** and **degree_program** data. I will let you decided where best to display them. You should also include all of the ones that are currently being displayed.

3) **Comment all of the PHP code**. You don't have to comment every line. Provide comments that help show me that you understand what the code is doing.

4) Review your code, ensure it's commented and test your code extensively

## Submission in Canvas

- You will need to push your code to **GitHub** for me to review, test and grade.
- In Canvas, submit the words "READY TO GRADE".
