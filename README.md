# Blog | Laravel
Blog CRUD

## Table of Contents

- [Features](#features)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Software Used](#software-used)
- [Bugs and Feedback](#bugs-and-feedback)

## Features
- Laravel Blog system with basic CRUD.
- You should develop a simple Laravel Blog
- It should be backed by a SQL database, SQL Lite is sufficient
- Create a User model with authentication functionality;
- As a User, I should be able to login
- As a User, I should be able to register
- Create a Post model, containing at minimum; title and content properties
- Implement CRUD functions for the Post model
- Create the necessary functions and pages/ui for each CRUD operation, ensuring that certain behaviors require authentication/authorization :
- Posts list page
- Post detail page
- Create Post page (requires authentication)
- Delete Post button/action (requires authentication)
- Edit Post page (requires authentication)
- You should create a database seeder that will seed the database with at least one Post and one User

## System Requirements
- PHP > 7.2
- PHP Extensions: PDO, cURL, Bcmath, Mcrypt, XML, GD
- Node.js > 6.0
- Composer > 1.0.0
- Laravel > 6.x
- MySql > 14.0
- Apache > 2.4

## Software Used
- Laravel 6.20.5
- Bootstrap v4.5.3
- Composer v2.0.7
- jQuery
- CSS

## Installation

Clone blog repository

`$ git clone https://github.com/mugopower/blog.git`

Change into the working directory

`$ cd blog`

Copy `.env.example` to `.env` and modify according to your environment

`$ cp .env.example .env`

Install composer dependencies

`$ composer install --prefer-dist`

Install node dependencies

`$ npm install`

Change folder permissions according to your environment

`$ chown -R $USER:$USER storage && chown -R $USER:$USER vendor && chown -R $USER:$USER public && chown -R $USER:$USER node_modules && chown -R $USER:$USER bootstrap/cache && chmod -R 775 storage bootstrap/cache && chmod -R 775 storage public`

An application key can be generated with the command

`$ php artisan key:generate`

Run these commands to create the tables within the defined database and populate seed data

`$ php artisan migrate --seed`


## Bugs and Feedback

For bugs, questions and discussions please email me at [mugovemachaka@gmail.com](mailto:mugovemachaka@gmail.com).
