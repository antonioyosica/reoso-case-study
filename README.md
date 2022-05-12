# Reoso Matcher Case Study

> ### Implementation of the case study by [António Yosica](https://github.com/antonioyosica).

----------

## Project Setup

**Starting command list**

    git clone git@github.com:antonioyosica/reoso-case-study.git
    cd reoso-case-study
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Set the correct database connection information to run the migrations and seeders**

    php artisan migrate
    php artisan db:seed

**Run the laravel development server**

    php artisan serve

The api can now be accessed at [http://localhost:8000/api/match/{propertyId}](http://localhost:8000/api/match/{propertyId}).
