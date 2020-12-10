# ONLINE ADVISING DATABASE
CSU Dominguez Hills CSC 492 Final Project by Patrick Lee and Jose Gonzalez

## Installation and Setup
1. Download and Install [Composer](https://getcomposer.org/download)
2. Install and set up [Laravel](https://laravel.com/docs/8.x/installation#installation-via-composer)
3. Install [MAMP](https://www.mamp.info/en/downloads)
4. Open MAMP and configure settings (i.e. ports, PHP version, MySQL version, etc.)
5. Start servers via MAMP
5. Open phpMyAdmin in a browser and import advising_db.sql file
6. Get phpMyAdmin username and password (default should be 'ROOT')
7. Copy/move all files into MAMP htdocs folder (or other root/source folder)
8. Open folder in a coding environment/workspace/text editor
9. Open .env file and make sure port numbers, username, password, etc. are all correct and properly configured for your system.
10. Open localhost in browser and navigate to htdocs folder
-- For my system, I had all the files and folders in a folder labeled 'laravel'. Thus, in my browser, I could navigate to the student welcome page by typing in localhost/laravel. To get to the corresponding adviser welcome page, I simply typed in localhost/laravel/adviser.

## Features
* Creating user accounts for both advisers and students (using [mailtrap.io](mailtrap.io) for sending/receiving verification emails and the like)
** Only toromail emails are accepted (i.e. example@toromail.csudh.edu)
* Logging in verified users
* Middleware and authentication guards were implemented so that only verified users could access the pertinent URLs and sites 
* Students can add/remove courses to a list for adviser approval
* Students can view these courses, completed courses, and adviser notes from their /student/home page
* After logging in, advisers are taken to their /adviser/home page where they can enter a student's ID number to view that student's preferred courses, completed courses, and adviser notes
* In the /adviser/viewStudent page, advisers can approve and/or mark courses completed for that particular student. They can also modify the courses pending adviser approval however they see fit, read and edit adviser notes for that student, view completed courses, and finally, complete the adviser meeting with that student.
