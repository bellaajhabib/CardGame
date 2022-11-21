docker-symfony5.4
==============
This is a complete stack for running Symfony 5.4, PHP8.0.18 and using docker-compose tool.

# Installation

First, clone this repository:
```
$ git@github.com:bellaajhabib/CardGame.git
```
Then, 
```
cd CardGame
```

 Rebuild all Docker images by running:
```bash
$ docker-compose build
```
run:
```bash
$ docker-compose up
```

# How it works?

```bash
> $ docker-compose ps
             Name                           Command             SERVICE         STATUS                 Ports
-----------------------------------------------------------------------------------------------------------------------
db                            "docker-entrypoint.sh --def ..."     db                running         0.0.0.0:3306->3306/tcp, 33060/tcp
nginx                          "/docker-entrypoint.…"              nginx             running          443/tcp, 0.0.0.0:80->80/tcp
php-fpm                         "php-fpm8 -F"                      php               running          0.0.0.0:9000->9001/tcp
```
Installing Composer : 
First
```run
docker exec -it php-fpm 
```
Second: In the terminal
```run 
composer install
```