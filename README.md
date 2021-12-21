# Mini-CRM
Task Given

Basically, a project to manage companies and their employees. Mini-CRM. -


- [X] Basic Laravel Auth: ability to log in as administrator

- [X] Use database seeds to create first user with email admin@admin.com and password “password”

- [X] CRUD functionality (Create / Read / Update / Delete) for two tables: Companies and Employees.

- [X] Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website

- [X] Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone

- [X] Use database migrations to create those schemas above

- [X] Store companies logos in storage/app/public folder and make them accessible from public

- [X] Use basic Laravel resource controllers with default methods – index, create, store, etc.

- [X] Use Laravel’s validation function, using Request classes

- [X] Use Laravel’s pagination for showing Companies/Employees list, 10 entries  per page.


- # Installation Steps:
 1. Clone the repo : git clone 
 2. $ cd Mini-CRM
 3. $ composer install
 4. $ cp .env.example .env
 5. $ php artisan key:generate
 6. Create database on MySQL or SQLite
 7. Set database credentials on .env file
 8. $ php artisan migrate --seed
 9. $ php artisan storage:link
 10. $ php artisan serve
-Login with :
email : 
  admin@admin.com
password : 
  password


To Add Fake Records:

Laravel Tinker and Model Factories is Used

$ php artisan tinker
>>> factory(App\Company::class, 15)->create(['creator_id' => 1])->each(function ($u) { $u->employees()->saveMany(factory(App\Employee::class, rand(5, 12))->make(['company_id' => $u->id])); });
