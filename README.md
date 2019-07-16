# Shift web developer test
Sistem to manage Service Order of a hospital's biological tests lab

#### Dependencies
 
    
-[nodejs](https://nodejs.org/dist/v10.16.0/node-v10.16.0-x64.msi)

-php 7.2

-[composer ](https://getcomposer.org/Composer-Setup.exe)

-mysql(maria db by xampp)
    
developed whit XAMPP Version 7.2.9
    
### Installation

##### 1.clone repo


##### 1. place into cloned folder and generate .env file. Content should be [like this](https://github.com/laravel/laravel/blob/master/.env.example)


##### 2.open terminal on folder and type
 
        composer install
        npm install
        php artisan key:generate
        php artisan migrate:fresh --seed
        php artisan serve

##### 3.open the adress given by the console on browser
        
### Frameworks used

Laravel 5.8

Vuejs 2.5, Vuetify, Vuex

### Features provided by the system

Medical Exam Service order management

  
### My own version of the class diagram you propose

![my custom diagram](https://github.com/michafrometa/Shift/blob/master/public/img/class_diagram.jpg)

PD: Tried to work on the rest of the exam but no time, sorry.