# SUST ONLINE EXAM

SUST Online Exam is a platform for faculty and students to arrange or attend online exams. It has two types of userbase - one is teacher and another one is student. A teacher with verified account can create new course, course equipment, exams and questions. Also, a student can easily open an account with university-related credentials and attend exam.
The core features are-
1. Interactive Design
2. Easy registration process with slider
3. Add and manage new course, course material, exam, eaxm questions-answers from teacher's side
4. Trace the performance of each student
5. Search option to get particular course, exam, question or studen performance easily 
6. Easy to join exam and get the result from student's side 

## Background
The frontend is handled with PHP, HTML and CSS. The backend is built with PHP using laravel framework. For database, I use MySQL.

## Screenshots
Landing Page

<img src="https://user-images.githubusercontent.com/46843689/112767205-25666280-9037-11eb-8c50-5ba8c2a6986f.png" height="300" width="565.09">


## How to run
1. Create a database locally named homestead utf8_general_ci
2. Download composer https://getcomposer.org/download/
3. Pull the project from github
4. Rename .env.example file to .envinside your project root and fill the database information. (windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )
5. Open the console and cd your project root directory
6. Run composer install or php composer.phar install
7. Run php artisan key:generate
8. Run php artisan migrate
9. Run php artisan db:seed to run seeders, if any.
10. Run php artisan serve and you can now access your project at localhost:8000

[Here](https://gist.github.com/hootlex/da59b91c628a6688ceb1), these can be found in more detailed manner.
