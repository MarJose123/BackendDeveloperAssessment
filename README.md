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

