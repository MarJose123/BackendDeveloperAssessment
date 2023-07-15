Make sure you system support `Laravel 10` and meet the requirements.

# Installation

---

Clone this project by executing this comment:
```bash
git clone git@github.com:MarJose123/BackendDeveloperAssessment.git
```

Run composer
```bash
composer install
```
copy the `.env.example` to `.env` file

make sure also to update the `DB_` username and password inside you `.env` file.

Generate new Laravel Key
```bash
php artisan key:generate
```

Run Database Migration
```bash
php artisan migrate
```

Generate new JWT secret key for your application
```bash
php artisan jwt:secret
```

Run Database Seeder to populate the database 
```bash
php artisan db:seed
```

# Credentials

###### SUPER USER
```
superuser@mail.com
superuser
```
###### ADMIN
```
admin@mail.com
admin
```
###### USER 
```
user@mail.com
user
```


# Notes

---
- The best practice approach is to check the permissions not the role, as the Roles stand only for the sets of permissions you've created and not the actual user ability on the system. By doing the Role checking only it will make our system vulnerable.
- When creating a new `Role`, you need to supply an `id` of the `Permissions` you want to associate with the Role that you will be creating.
- The API route will be checked if the request is authorized, and if the authorized user has the required role or ability to perform an action of the specific API route.
- 