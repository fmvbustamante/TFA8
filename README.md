# SimplePOS Laravel — TFA8

TFA8 continues the TFA5–TFA7 POS app with resource routes/controllers and session authentication. Customer and user management routes are grouped behind Laravel `auth`. Login and registration pages are included; passwords are hashed by Laravel.

## Setup (Windows PowerShell)

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
if (!(Test-Path database/database.sqlite)) { New-Item -ItemType File -Path database/database.sqlite | Out-Null }
php artisan migrate --seed
php artisan storage:link
npm install
npm run build
php artisan serve
```

Open `http://127.0.0.1:8000/register` to create the first account, then visit `/customers` or `/users`. Logged-out visits redirect to `/login`. This project excludes `vendor/` and the populated `.env`; `.env.example` is included.

Resource controllers are registered in `routes/web.php`. Breeze is included as a development dependency; the authentication screens and session controllers are present in the project files.
