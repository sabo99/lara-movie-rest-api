<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## 🚀 Quick start (Clone Project)

1.  **First Clone Project**

    Clone this project

2.  **Install Depedencies**

    Required `composer`

    ```shell
    composer i
    or
    composer install
    ```
3.  **Config Environment**

    Copy `.env.example` to new file `.env`
    ```shell
    cp .env.example .env
    ```

4.  **Running Migration**

    -  Running Migration without seeder
    ```shell
    php artisan migrate
    ```
    
     -  Running Migration with seeder
     ```shell
        php artisan migrate --seed
     ```
     
5. **Ready to launch on local server**

    ```shell
    php artisan serve
    ```

    Your site is automatically redirect to http://127.0.0.1:8000/api/movies <br>
    Your api is now running at http://127.0.0.1:8000/api/movies

6. **Learn more**

    -   [Laravel Documentation](https://laravel.com/docs/10.x/)