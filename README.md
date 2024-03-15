## Laravel MagicLink Login

In this project, We allow user to login without password by sending an login link to user via email

## Setup

Clone the repo on local with below command 

```
git clone https://github.com/baglanevivek/laravelmagiclinklogin.git
```

Download vendor folder using composer

```
composer update
```

Update ```.env```, set the database and SMTP details

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_magic_links
DB_USERNAME=root
DB_PASSWORD=password
```

Replace username and password with your database username and password

After settingup the database details, run the migrations 

```
php artisan migrate
```

It will create the required tables and an user with name **Jhon Doe** and email **jhon@example.com**

We are using [mailtrap.io](https://mailtrap.io) for sending and receiving the emails 

```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=ea651c********
MAIL_PASSWORD=47216*********
MAIL_FROM_ADDRESS="user@example.com"
```

Replace ```MAIL_USERNAME``` and ```MAIL_PASSWORD``` with your username and password

You can find the SMTP details in Email testing -> inboxes

Once you are done with setup, serve the project with artisan command

```
php artisan serve
```

Visit the login page at [127.0.0.1:8000/login](http://127.0.0.1:8000/login)

