# Nike TMDT Laravel

## What This Is
A high-energy, Nike-inspired e-commerce platform built with Laravel 12. It features a kinetic, radically simplified design that prioritizes athletic lighting and product photography over complex UI elements, providing a premium shopping experience.

## Core Value
Delivering an explosive, high-performance retail experience through visual excellence and radical simplicity.

## Requirements

### Validated
- ✓ **Nike Design System Foundation** (DESIGN.md) — Phase 0
- ✓ **Laravel 11/12 Base Setup** — Initial migration and configuration
- ✓ **Database Session Management** — Configured and migrated

### Active
- [ ] **Phase 0: Core Architecture & Identity** — Database Schema (B2C + C2C), Models, Roles.
- [ ] **Modern Landing Page** — Implementing the welcome page using the Nike aesthetic (96px headlines, pill buttons, full-bleed images).
- [ ] **Product Listing System** — Displaying high-quality product grids with athletic focus.
- [ ] **Authentication System** — Secure user login and registration following design standards.
- [ ] **Shopping Cart & Checkout** — Seamless purchase flow.

### Out of Scope
- **Advanced Admin Dashboard** — Deferred to later milestone (prioritizing customer experience).
- **Multi-vendor Support** — Explicitly out of scope for the brand-specific focus.

## Context
- **Tech Stack**: Laravel 12, PHP 8.2, MySQL, Vite, Tailwind CSS 4.
- **Inspiration**: The "Podium CDS" (Nike's Core Design System) which uses a monochromatic foundation to highlight products.
- **Development Status**: Fresh project with baseline migrations and installed `DESIGN.md`.

## Constraints
- **Design Policy**: Strictly monochromatic (black/white/grey) UI; color originates only from product photography or semantic warnings.
- **Typography**: Heavily dependent on specific font weights (500 for interactive, 96px for display).
- **Execution Policy**: Optimized for Windows environments (using cmd/ps1 fixes).

## Key Decisions
| Decision | Rationale | Outcome |
|----------|-----------|---------|
| Tailwind CSS 4 | Modern asset pipeline with Vite 7 integration | ✓ Good |
| Database Sessions | Ensure persistent state across scaling | ✓ Good |
| Direct Template Install | `getdesign` provides instant aesthetic source of truth | ✓ Good |

## Evolution
This document evolves at phase transitions and milestone boundaries.

**After each phase transition**:
1. Requirements invalidated? → Move to Out of Scope with reason
2. Requirements validated? → Move to Validated with phase reference
3. New requirements emerged? → Add to Active
4. Decisions to log? → Add to Key Decisions
5. "What This Is" still accurate? → Update if drifted

**After each milestone**:
1. Full review of all sections
2. Core Value check — still the right priority?
3. Audit Out of Scope — reasons still valid?
4. Update Context with current state

---
*Last updated: 2026-04-26 after initialization*
