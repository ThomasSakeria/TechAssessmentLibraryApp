Library Application for Tech Assessment By  Sakeria Thomas Resubmitted on - Mar 05, 2025

Project was done using Laravel in the back end and Vue JS, Inertia and Tailwind on the front end.

Node modules Folder, Vendor and .env file is omitted before commit.

Install composer  for Vendor Folder

npm install for Node_modules

MySql is used on the back end for Database connectivity.

**Steps to setup the project:**

composer create-project laravel/Larvel LibraryApp

composer require laravel/jetstream

php artisan jetstream:install inertia

Copy the files to appropriate Locations

Update ENV file for the following:
Database name = Libraryapp
user = root 
password =""

php artisan migrate:fresh --seed

npm install

php artisan storage:link

npm run dev





