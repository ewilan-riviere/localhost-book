# Localhost Book

[![php](https://img.shields.io/static/v1?label=PHP&message=v7.3&color=777BB4&style=flat-square&logo=php&logoColor=ffffff)](https://www.php.net/)
[![composer](https://img.shields.io/static/v1?label=Composer&message=v2.0&color=885630&style=flat-square&logo=composer&logoColor=ffffff)](https://getcomposer.org/)
[![laravel](https://img.shields.io/static/v1?label=Laravel&message=v8.1&color=FF2D20&style=flat-square&logo=laravel&logoColor=ffffff)](https://laravel.com/)

[![vuejs](https://img.shields.io/static/v1?label=Vue.js&message=v2.5&color=4FC08D&style=flat-square&logo=vue.js&logoColor=ffffff)](https://nuxtjs.org/)
[![tailwind](https://img.shields.io/static/v1?label=Tailwind%20CSS&message=v2.0&color=38B2AC&style=flat-square&logo=tailwind-css&logoColor=ffffff)](https://tailwindcss.com/)

[![nodejs](https://img.shields.io/static/v1?label=NodeJS&message=v14.15&color=339933&style=flat-square&logo=node.js&logoColor=ffffff)](https://nodejs.org/en)

**Setup NGINX on your Linux before setup this project, this guide is based on Ubuntu/Debian distribution.**

If you have any quesiton about installation of NGINX, check Digital Ocean guides: [**How To Install LEMP on Ubuntu**](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04) and [**How To Install and Secure phpMyAdmin on Ubuntu**](https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-20-04)

---

## Setup

**Create database with MySQL CLI or phpMyAdmin**

```mysql
CREATE DATABASE localhost-book;
```

**Remove `/var/www/html` even if phpMyAdmin is into this dir**

```bash
rm -rf /var/www/html
```

**Clone repository into `/var/www`**

```bash
git clone git@github.com:ewilan-riviere/localhost-book.git html
```

**Link phpMyAdmin to Localhost Book if you want**

```bash
sudo ln -s /usr/share/phpmyadmin /var/www/html/public/phpmyadmin
```

At the root of repository...

```bash
cd /var/www/html
```

...download dependencies and setup **Localhost Book**

```bash
composer install
```

```bash
php artisan setup:install localhost-book
```

## Todo

- <https://gitlab.com/api/v4/users?username=ewiefairy>
- <https://stackoverflow.com/questions/2514859/regular-expression-for-git-repository/22312124>
- <https://stackoverflow.com/questions/8206269/how-to-remove-http-from-a-url-in-javascript>
