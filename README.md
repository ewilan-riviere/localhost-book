# Localhost Book

**Setup NGINX on your Linux before setup this project, this guide is based on Ubuntu/Debian distribution.**

If you have any quesiton about installation of NGINX, check Digital Ocean guides: [**How To Install LEMP on Ubuntu**](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04) and [**How To Install and Secure phpMyAdmin on Ubuntu**](https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-20-04)

---

Remove `/var/www/html` even if phpMyAdmin is into this dir.

```bash
rm -rf /var/www/html
```

Clone repository into `/var/www`.

```bash
git clone git@github.com:ewilan-riviere/localhost-book.git html
```

Link phpMyAdmin to **Localhost Book** if you want.

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
