# Codebase Structure

## Directory Overview

- `app/`: Core application logic
  - `Http/`: Controllers, Middleware, Requests
  - `Models/`: Eloquent models (currently only `User.php`)
  - `Providers/`: Service providers
- `bootstrap/`: Application bootstrapping (new Laravel 12 structure)
- `config/`: Configuration files
- `database/`: Migrations, seeders, and factories
  - `migrations/`: Contains initial users, sessions, cache, and jobs tables
- `public/`: Publicly accessible assets
- `resources/`: Source frontend assets
  - `css/`: Tailwind CSS entry points
  - `js/`: JavaScript entry points
  - `views/`: Blade templates
- `routes/`: Route definitions (`web.php`, `console.php`)
- `tests/`: Feature and Unit tests
- `.planning/`: GSD planning and state tracking

## Initial Files of Interest
- `routes/web.php`: Entry point for web routes
- `resources/views/welcome.blade.php`: The main landing page
- `DESIGN.md`: The design system source of truth (Nike inspired)
