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
 >>> factory(App\Company::class, 15)->create(['creator_id' => 1])->each(function ($u) { $u->employees()->saveMany(factory(App\Employee::class, rand(5, 12))->make(['company_id'   => $u->id])); });

# UI :

1. HomePage
![image](https://user-images.githubusercontent.com/63161743/146979591-a613ca19-cb3c-4ec2-9f2b-c27febdb42a2.png)
2. DashBoard![image](https://user-images.githubusercontent.com/63161743/146979698-fac426cf-352a-47bf-ae34-37d211dc871e.png)
3. Login![image](https://user-images.githubusercontent.com/63161743/146979826-8aa65558-b8fe-4291-949f-fb6536a560f1.png)
4. Company![image](https://user-images.githubusercontent.com/63161743/146979904-3e08b643-3174-48dc-b45f-d41ae4099bc4.png)
5. Company Details ![image](https://user-images.githubusercontent.com/63161743/146979982-fd5b4646-da6d-4d3e-bdac-1c347adf56bd.png)
6. Create And Edit Company ![image](https://user-images.githubusercontent.com/63161743/146980039-d5763423-c2eb-4657-a159-ff26a7633666.png)
![image](https://user-images.githubusercontent.com/63161743/146980088-a9ff5764-2459-44ed-8a10-eb4f03240621.png)
7. Employee Details![image](https://user-images.githubusercontent.com/63161743/146980133-b2af43ef-bdde-4deb-a55c-854f9ce7773e.png)
8. Employee Edit/Create/Delete![image](https://user-images.githubusercontent.com/63161743/146980254-9ed5f378-6b57-4104-85d2-2bb49cfe779c.png)
![image](https://user-images.githubusercontent.com/63161743/146980277-a8a6269b-3d7a-4ff7-aff0-36b14a0cab23.png)
![image](https://user-images.githubusercontent.com/63161743/146980299-e30665bf-ffbb-4a95-a11b-9754e4bbe941.png)




