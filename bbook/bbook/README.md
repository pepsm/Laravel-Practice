### 1. Clone GitHub repo for this project locally

`git clone http://git.fhict.nl/I431166/p-cb-s2-w2.git`

### 2. Install Composer Dependencies

When we run composer, it checks the <b>composer.json</b> file which is submitted to
the github repo and lists all of the composer (PHP) packages that the repo requires.

`composer install`

### 3. Install NPM Dependencies

We must also install necessary NPM packages to move forward.
This will install Vue.js, Bootstrap.css, Lodash, and Laravel Mix

`npm install`

### 4. Create a copy of your .env file

This will create a copy of the .env.example file in the
project and name the copy simply .env.

`cp .env.example .env`

> In the <b>.env</b> file you should change all of the DB propertiees

### 5. Generate an app encryption key

`php artisan key:generate`

### 6. Migrate the database

Once your credentials are in the .env file, now you can migrate your database.

`php artisan migrate`

### 7. [Optional]: Seed the database

`php artisan db:seed`