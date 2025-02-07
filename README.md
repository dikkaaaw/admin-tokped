Langkah-langkah menjalankan projek:

1. Membuat Database dengan data **.env** sebagai berikut:
   - DB_CONNECTION=mysql
   - DB_HOST=127.0.0.1
   - DB_PORT=3306
   - DB_DATABASE=e_commerce
   - DB_USERNAME=root

2. ``` composer install ```
3. ``` npm install ```
4. ``` php artisan migrate:fresh ```
5. ``` php artisan db:seed --class=UserSeeder ```
6. ``` php artisan db:seed --class=ProductSeeder ```
7. ``` php artisan serve ```