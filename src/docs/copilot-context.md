
You are helping me build a custom PHP micro framework called **LamdaPHP**.

## High-level goals

- LamdaPHP is a lightweight, modular PHP web framework.
- It is inspired by Laravel’s expressive syntax, but must stay much smaller and simpler.
- It targets **small-scale web apps**, not large monoliths.
- It will have **built-in realtime support using Server-Sent Events (SSE)** by default.
- WebSocket support will be optional and provided later via a driver interface.

## Current scope (very important)

Right now, I am focusing only on these core modules:

1. **HTTP layer**
   - `Lamda\Core\Http\Request`
   - `Lamda\Core\Http\Response`
   - Request is responsible for parsing HTTP method and path (and later query/body).
   - Response is a simple wrapper for content, status code, and headers.

2. **Routing**
   - `Lamda\Core\Routing\Route`
   - `Lamda\Core\Routing\Router`
   - `Lamda\Support\Facades\Route` (facade)
   - Responsibilities:
     - Register routes (GET/POST, etc.)
     - Support static and dynamic URI patterns, e.g. `/users/{id}`
     - Match incoming requests to the correct route and extract parameters
     - Execute the associated action:
       - string: `"UserController@index"`
       - array: `[UserController::class, 'index']`
       - closure: `function () { ... }`

3. **Application code**
   - Controllers live under `App\Controllers\...`
   - Example:
     - `App\Controllers\HomeController`
   - Routes are defined in `routes/web.php` using the `Route` facade:
     ```php
     use Lamda\Support\Facades\Route;
     use App\Controllers\HomeController;

     Route::get('/', [HomeController::class, 'index']);
     Route::get('/hello/{name}', [HomeController::class, 'hello']);
     Route::get('/ping', function () { return 'pong'; });
     ```

4. **Front Controller**
   - `public/index.php` is the ONLY entry point.
   - It should:
     - Autoload Composer
     - Capture the Request
     - Create Router instance
     - Attach Router to Route facade
     - Load `routes/web.php`
     - Dispatch the request and send the Response

## Design principles

- Use **PSR-4 autoloading**:
  - `Lamda\` → `src/`
  - `App\` → `app/`
- No global functions; use classes and methods.
- Keep each module **small and focused** (Single Responsibility).
- Keep the framework **framework-agnostic**:
  - Don’t depend on Laravel, Symfony, or their components.
  - Implement our own simple versions where needed.

## What I want from Copilot

- When I’m editing files under `src/Core/Routing/`, suggest:
  - Methods for registering routes (get, post, etc.)
  - Clean, readable `matchRoute()` implementations
  - How to convert `/users/{id}` into a regex and extract `id`
  - Dispatch logic that supports:
    - closures
    - `"Controller@method"` strings
    - `[Controller::class, 'method']` arrays

- When I’m editing `public/index.php`, suggest:
  - Proper bootstrapping flow:
    - Require Composer autoload
    - Create Request and Router
    - Set the Router instance on the Route facade
    - Require the routes file
    - Dispatch and send the Response

- When I’m editing controllers under `app/Controllers`, assume:
  - Controllers are plain PHP classes.
  - They may return either:
    - a `Lamda\Core\Http\Response` instance, or
    - a string (which will be wrapped into a Response by Router).

## Things Copilot should NOT assume

- There is NO Eloquent ORM, NO Laravel container, NO middleware stack yet.
- Do NOT suggest Laravel-specific helpers (like `view()`, `response()`, `route()`) unless I define them.
- Do NOT assume this is a full Laravel app. It is a **custom micro framework**.

## Future modules (for context only, not implemented yet)

- View / template engine: `.lamda.php` templates, Blade-like syntax.
- Realtime SSE module as a built-in feature.
- Optional WebSocket driver via `RealtimeDriverInterface`.

For now, focus on making the **Routing + HTTP layer** clean, minimal, and easy to extend.
