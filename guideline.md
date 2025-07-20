# Laravel 12 Project Guideline

## Overview
This project uses **Laravel 12**, the latest major release of the Laravel PHP framework. Laravel 12 brings performance improvements, modern PHP 8.2+ features, enhanced security, and a refined developer experience. This guideline summarizes key features, best practices, and project structure insights for working with Laravel 12.

---

## Key Features & Improvements in Laravel 12

### 1. Performance & Scalability
- **Optimized Routing:** Faster route resolution and lower overhead for HTTP requests.
- **Enhanced Caching:** Improved support for Redis/Memcached, async caching (`Cache::rememberAsync()`), and granular cache control.
- **Async Support:** More seamless asynchronous operations across the framework.

### 2. Modern PHP Support
- **PHP 8.2+ Required:** Leverage readonly properties, enums, union types, and attributes.
- **Constructor Property Promotion:** Cleaner, less boilerplate in controllers/services.

### 3. Eloquent ORM & Query Builder
- **Conditional Eager Loading:** Use `withFiltered()` for more flexible relationship constraints.
- **Advanced Query Builder:** Fluent syntax, subquery enhancements, and `nestedWhere()` for cleaner queries.
- **Custom Casts & Mutators:** More advanced attribute transformations.

### 4. API Development
- **API Versioning:** Native support for versioned routes (`Route::apiVersion()`), better organization.
- **Improved Rate Limiting:** More flexible, role/IP-based rules.
- **GraphQL Support:** Native GraphQL integration for modern APIs.
- **Better API Documentation:** Improved tools for Swagger/Postman integration.

### 5. Security Enhancements
- **Multi-Factor Authentication:** Out-of-the-box MFA support.
- **Improved Password Hashing:** Stronger algorithms and better password management.
- **CSRF Protection:** More flexible token management.
- **Image Validation:** SVGs are blocked by default in `image` validation rule.

### 6. Developer Experience
- **Improved Error Handling:** More informative error messages and stack traces.
- **New Blade Directives:** For conditional rendering, loops, and custom components.
- **IDE Support:** Enhanced auto-completion and type hinting.
- **AI Debugging Assistant:** Real-time suggestions and insights.

### 7. Testing & Debugging
- **Enhanced PHPUnit Integration:** Faster, more reliable parallel testing.
- **New Testing Helpers:** For JSON, HTTP, and async code.
- **Debugging Tools:** Improved Xdebug/logging integration.

### 8. Frontend & DevOps
- **Modern Starter Kits:** Pre-configured for React, Vue, Livewire, and Tailwind CSS.
- **Improved WebSocket & Broadcasting:** Real-time features with better queue integration.
- **Docker & CI/CD:** Better Docker images and CI/CD integration (GitHub Actions, GitLab, Jenkins).

### 9. Artisan & Console
- **Interactive Console:** New interactive mode for Artisan.
- **Custom Command Enhancements:** Improved arguments/options/validation.
- **Enhanced Scheduling:** More flexible cron/task scheduling.

### 10. Project Structure & Configuration
- **Refined Directory Structure:** Cleaner organization for `app/`, `config/`, `routes/`, `database/`, etc.
- **Autoloading:** PSR-4 autoloading for `App\`, `Database\Factories\`, and `Database\Seeders\` (see `composer.json`).
- **Simplified Config:** Sensible defaults and environment variable validation.

---

## Project Structure (as per root directory)
- `app/` — Application code (Controllers, Models, Traits, Providers)
- `config/` — Configuration files
- `database/` — Migrations, seeders, factories
- `public/` — Entry point (`index.php`), assets
- `resources/` — Views, CSS, JS
- `routes/` — Route definitions (`web.php`, `api.php`, etc.)
- `storage/` — Logs, cache, compiled views
- `tests/` — Feature and unit tests
- `bootstrap/` — App bootstrap files
- `vendor/` — Composer dependencies
- `artisan` — CLI entry point
- `composer.json` — Dependency and autoload config
- `vite.config.js` — Frontend build config

---

## Best Practices for Laravel 12 Projects
- **Use PHP 8.2+** for full compatibility and features.
- **Leverage async and caching** for performance.
- **Use native API versioning and rate limiting** for robust APIs.
- **Adopt modern frontend tools** (React, Vue, Livewire, Tailwind CSS).
- **Write tests** using improved PHPUnit integration and helpers.
- **Utilize new Artisan commands** for enums, pruning, and more.
- **Keep dependencies updated** (e.g., Carbon 3.x required).
- **Review breaking changes** (e.g., `Str::is()` multiline, image validation, MariaDB CLI tools).
- **Use environment variable validation** for safer deployments.
- **Take advantage of improved error handling and debugging tools.**

---

## References
- [Laravel 12 Release Notes](https://laravel.com/docs/12.x/releases)
- [Upgrade Guide](https://laravel.com/docs/12.x/upgrade)
- [Best Practices](https://laravel.com/docs/12.x)

---

*This guideline is based on Laravel 12’s latest features, project structure, and best practices as of 2025. Always refer to the official documentation for the most up-to-date information.* 
