<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Tasks Management

Simple web application for task Management




## Installation

- First copy .env.example to .env file

- Install composer

```bash
  composer install --ignore-platform-reqs
```
- Install npm

```bash
  npm Install
  npm run dev
```
- Migrate the database 
```bash
    php artisan Migrate
    - make sure you already changed the creds in the env file for database
```

- Run db seeeder for dummy data
```bash
    php artisan db:seed
```


    