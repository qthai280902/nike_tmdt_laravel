# Codebase Conventions

## Coding Standards
- **PHP**: Follows PSR-12 and Laravel's internal coding style. Enforced by **Laravel Pint**.
- **Naming**: 
  - Controllers: TitleCase (e.g., `ProductController`)
  - Models: TitleCase singular (e.g., `User`)
  - Migrations: snake_case timestamps
  - CSS: Tailwind utility-first classes.

## Frontend Standards
- **Design System**: Strictly adheres to `DESIGN.md` (Nike Inspired).
- **Typography**: Uses Helvetica Now / Futura styles.
- **Components**: Functional, reusable Blade or JavaScript components.

## Git & Workflow
- **Commits**: Descriptive messages (e.g., "feat: ...", "fix: ...").
- **Planning**: All significant changes must be tracked in `.planning/`.
