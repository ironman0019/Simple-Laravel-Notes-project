# Personal Note project

A simple personal notes manager application, inside which can register, login and create personal notes.

Note: login and register system is with laravel breeze package. [More info](https://laravel.com/docs/11.x/starter-kits)

## Installation
1. Clone the project
2. Navigate to the project's root directory using terminal
3. Create `.env` file - `cp .env.example .env`
4. Execute `composer install`
5. Execute `npm install`
6. Set application key - `php artisan key:generate --ansi`
7. Execute migrations and seed data - `php artisan migrate --seed`
8. Start vite server - `npm run dev`
9. Start Artisan server - `php artisan serve`