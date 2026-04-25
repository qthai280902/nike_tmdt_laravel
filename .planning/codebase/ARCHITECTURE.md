# Codebase Architecture

## Design Pattern
The project follows the standard **Model-View-Controller (MVC)** pattern provided by the Laravel framework.

## Key Architectural Decisions
- **Unified Migration**: Initial setup uses the streamlined Laravel 12 migration file (`0001_01_01_000000_create_users_table.php`) which includes `users`, `password_reset_tokens`, and `sessions`.
- **Database Sessions**: Configured to store user sessions in the database for persistence and scalability.
- **Tailwind 4 Integration**: Uses the new `@tailwindcss/vite` plugin for a modern CSS development experience.
- **Agentic Planning**: Integrated with GSD (`.planning/`) for structured, phased development and autonomous task execution.

## Data Flow
1. Request hits `public/index.php`.
2. Routed through `routes/web.php`.
3. Currently returns basic Blade view (`welcome.blade.php`).
4. Session state managed via `sessions` table in MySQL.
