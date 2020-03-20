# php-blog-exercise

Simple blog with PHP and MySQL

## Instructions:

- Set correct database info in config/config.php:

  - DB_HOST e.g **localhost**
  - DB_USER e.g **root**
  - DB_PASS e.g **password**
  - DB_NAME e.g **phpblog**

- Create a MySQL database named phpblog (or anything you want).

- In the database, create table **posts** with 5 fields:
  - id (auto increment, primary key)
  - title (varchar, 255)
  - body (text)
  - author (varchar, 255)
  - created_at (timestamp, default = current_timestamp())
