# Mini-CRM
Task

Basically, a project to manage companies and their employees. Mini-CRM. 

* [x] Basic Laravel Auth: ability to log in as administrator
* [x] Use database seeds to create first user with email admin@admin.com and password “password”
* [x] CRUD functionality (Create / Read / Update / Delete) for two tables: Companies and Employees.
* [x] Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
* [x] Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone
* [x] Use database migrations to create those schemas above
* [x] Store companies logos in storage/app/public folder and make them accessible from public
* [x] Use basic Laravel resource controllers with default methods – index, create, store etc.
* [x] Use Laravel’s validation function, using Request classes
* [x] Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page



## Install

1. Clone the repo : `git clone https://github.com/nafiesl/Mini-CRM.git`
2. `$ cd Mini-CRM`
3. `$ composer install`
4. `$ cp .env.example .env`
5. `$ php artisan key:generate`
6. Create **database on MySQL** or **SQLite**
7. **Set database credentials** on `.env` file
8. `$ php artisan migrate --seed`
9. `$ php artisan storage:link`
10. `$ php artisan serve`
11. Login with :
    - email : `admin@admin.com`
    - password : `password`

#### Demo Records

 use **Laravel Tinker** and **Model Factories**.

```bash

$ php artisan tinker
>>> factory(App\Company::class, 15)->create(['creator_id' => 1])->each(function ($u) { $u->employees()->saveMany(factory(App\Employee::class, rand(5, 12))->make(['company_id' => $u->id])); });
```

We will get some filled records like screenshots below (except the company logo).

## UI

### Homepage
![image](https://user-images.githubusercontent.com/63161743/146982852-19c21b57-0eee-4bb2-8c36-391074782f94.png)
### DashBoard![Screenshot (183)](https://user-images.githubusercontent.com/63161743/146982917-789d53a3-be6d-44cf-acd5-d9c5b2418334.png)
### Login![Screenshot (184)](https://user-images.githubusercontent.com/63161743/146983051-46451209-2864-4d96-8130-af5afca797f3.png)
### CompanyDetails![Screenshot (185)](https://user-images.githubusercontent.com/63161743/146983090-9c01ccea-a0f3-48fa-b3ff-278294668e1c.png)
### CompanyDetails![Screenshot (188)](https://user-images.githubusercontent.com/63161743/146983220-311c8be1-7376-4717-b817-bddebc739b56.png)
### Create/Edit Company![Screenshot (187)](https://user-images.githubusercontent.com/63161743/146983148-04e51806-a4a7-4ba7-8e9e-84bdcb331227.png)
![Screenshot (186)](https://user-images.githubusercontent.com/63161743/146983168-379ca110-7906-4637-9334-3ec8eac10160.png)
### Employee Details![Screenshot (189)](https://user-images.githubusercontent.com/63161743/146983294-9d043208-1ab7-423e-bc6c-e5331c0530dd.png)
### Employee CRUD
![Screenshot (190)](https://user-images.githubusercontent.com/63161743/146983333-5220d8a2-6677-4990-8c8d-de359aecae70.png)
![Screenshot (191)](https://user-images.githubusercontent.com/63161743/146983343-6b081800-f9bc-40ca-8d5f-dc946da41b7f.png)
![Screenshot (192)](https://user-images.githubusercontent.com/63161743/146983355-5ee5f166-62bd-4e89-a347-8d8411048509.png)


