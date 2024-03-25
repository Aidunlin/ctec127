<?php

/** The database connection. */
$db = new PDO("mysql:host=localhost;dbname=ctec", "root");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/** Copyright notice. */
const APP_COPYRIGHT = "&copy; 2024 Aidan Linerud";

/** Version of app. */
const APP_VERSION = 2.0;

/** Name of app. */
const APP_NAME = "CTEC 127 Record Manager";

/** Name of table. */
const DB_TABLE = "student_v2";

/** Can be "Development" or "Production". */
const APP_STATUS = "Production";

/** The limit of records shown in a single page. */
const PAGINATE_LIMIT = 10;

/** List of main navigation links. */
const NAV_LINKS = [
    "display-records.php" => "Home",
    "create-record.php" => "Create Record",
    "advanced-search.php" => "Advanced Search"
];

/** Student table columns and their labels. */
const RECORD_COLUMN_HEADINGS = [
    "student_id" => ["label" => "SID", "title" => "Student ID"],
    "first_name" => ["label" => "First Name"],
    "last_name" => ["label" => "Last Name"],
    "gpa" => ["label" => "GPA"],
    "degree_program" => ["label" => "Degree Program"],
    "graduation_date" => ["label" => "Graduation", "title" => "Graduation Date"],
    "financial_aid" => ["label" => "Aid", "title" => "Financial Aid"],
    "email" => ["label" => "Email"],
    "phone" => ["label" => "Phone"],
];

/** Ascending and descending order. */
const ORDERINGS = [
    "ASC",
    "DESC",
];

/** List of degree programs. */
const DEGREES = [
    "Advanced Manufacturing",
    "Business Administration",
    "Cuisine Management",
    "Cybersecurity",
    "Digital Media Arts",
    "Fine Arts",
    "Management",
    "Marketing",
    "Music",
    "Network Technology",
    "Professional Baking and Pastry Arts",
    "Web Development",
];
