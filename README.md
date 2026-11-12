# MyMahallah+

IIUM Mahallah Management System: QR check-in and check-out, maintenance report tracking, and Mahallah announcements, built as a Progressive Web App.

Final Year Project (INFO 4401 / BIIT 4321).

## Stack

- Laravel 13 (PHP 8.3+) with Fortify authentication
- React 19 + TypeScript via Inertia, Tailwind CSS
- MySQL 8
- Pest for tests

## Roles

| Role            | Scope                        |
| --------------- | ---------------------------- |
| Student         | Their own Mahallah           |
| Mahallah Staff  | Their own Mahallah           |
| MMU/RSD Officer | All Mahallahs                |
| Super Admin     | All Mahallahs, system config |

New registrations are Students. Roles can only be changed server-side, never through a form.

## Local setup

1. Start MySQL (Laragon or XAMPP) and create a database named `mymahallahplus`.
2. Install and configure:

    ```bash
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate --seed
    ```

3. Run the app:

    ```bash
    composer run dev
    ```

    Then open http://localhost:8000.

## Demo accounts

The seeder creates six sample Mahallahs and one account per role. All use the password `password`.

| Email                   | Role            | Mahallah        |
| ----------------------- | --------------- | --------------- |
| student@mymahallah.test | Student         | Mahallah Aminah |
| staff@mymahallah.test   | Mahallah Staff  | Mahallah Aminah |
| officer@mymahallah.test | MMU/RSD Officer | All             |
| admin@mymahallah.test   | Super Admin     | All             |

All data is sample data; no real student or room records are used.

## PWA

`public/manifest.webmanifest` and `public/sw.js` make the app installable. The service worker is only registered in production builds (`npm run build`). It caches build assets and an offline page, never user pages.

## Checks

```bash
php artisan test
vendor/bin/pint --test
npm run check
npm run types:check
```
