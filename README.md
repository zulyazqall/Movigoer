# Movigoer
Moviegoer is CMS for Report numbers of audience in cinema. This project build with Laravel Framework.


**How to use:**
1. clone this project
>https://github.com/zulyazqall/Movigoer.git
2. create database on your local or server
3. edit your database name in **.env**
4. run this command with cmd or terminal on your directory

  `php artisan migrate` for migrate your tables
  
  `php artisan db:seed --class=RolesTableSeeder` initial user
  
5. run moviegoer
  `php artisan serve`
  
6. default user login
<pre>
**administrator**
username : admin@movie.com
password : admin123
**user/cinema**
username : user1@movie.com
password : user123
