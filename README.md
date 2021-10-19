## Mini CRM

Steps to start app:

- Setup db connection 
- Run migrations 
  ```bash
    php artisan migrate --seed
  ```
- If you need test data, run:
  ```bash
    php artisan db:seed --class=TestDataSeeder
  ```
  This will create multiple companies and employees
  

- Link storage path:
  ```bash
    php artisan storage:link
  ```    
