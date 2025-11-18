# LamdaPHP – Framework Specification

LamdaPHP is a lightweight, modular PHP micro framework designed for small-scale applications, built with Laravel-inspired expressiveness but intentionally simpler and lighter. It is built as a **Composer package**, with clear module boundaries, PSR-4 autoloading, and minimal dependencies.

The core goals are:
- Provide a clean, modern foundation for small PHP web apps.
- Maintain a modular, “Lego-style” architecture (each module = replaceable/extendable).
- Offer built-in realtime features via **Server-Sent Events (SSE)**.
- Keep internal code simple, explicit, and educational.

This document is intended for GitHub Copilot to understand the design intentions, conventions, and structure of LamdaPHP so its suggestions remain aligned with the architecture.

---

## 📌 1. High-Level Architecture Overview

LamdaPHP follows a simple, layered architecture:

Application Layer (userland)
├── controllers
├── routes
├── views
└── config

Framework Layer (LamdaPHP core)
├── Routing Module
├── HTTP Module
├── Controller Base Module (future)
├── View Engine (future)
├── Realtime SSE Module (future)
└── Support/Facades


### ► Framework lives under:
`Lamda\` namespace  
inside folder: `src/`

### ► Application using LamdaPHP will live under:
`App\` namespace  
inside folder: `app/`

---

## 📌 2. Modules

LamdaPHP consists of several internal modules. Each module is **independent**, implemented with its own namespace folder.

### 2.1 Routing Module
Namespace: `Lamda\Core\Routing`

Responsibilities:
- Register routes
- Match HTTP requests to routes
- Support dynamic segments (`/users/{id}`)
- Execute handler:
  - closure
  - `"Controller@method"`
  - `[ControllerClass::class, 'method']`

Files:
src/Core/Routing/Route.php
src/Core/Routing/Router.php


### 2.2 HTTP Module
Namespace: `Lamda\Core\Http`

Responsibilities:
- Represent incoming HTTP request
- Represent outgoing HTTP response
- Extract method, path, headers, later query/body/etc.

Files:
src/Core/Http/Request.php
src/Core/Http/Response.php


### 2.3 Facade System
Namespace: `Lamda\Support\Facades`

Responsibilities:
- Provide simplified API (like Laravel)
- Forward static calls to underlying instance

Example:
Route::get('/path', ...)



---

## 📌 3. Design Principles

LamdaPHP adheres to these principles:

### ✔ Small & Focused
Every class has ONE responsibility (SRP).

### ✔ Explicit Over Magic
No hidden container magic. No auto-resolving dependencies.

### ✔ PSR-4 Autoloading
`Lamda\` maps to `src/`.

### ✔ Minimal Dependencies
Avoid Laravel/Symfony components — everything is built from scratch.

### ✔ Developer-Friendly Syntax
Inspired by Laravel:
```php
Route::get('/users', [UserController::class, 'index']);


✔ Modular Internal Architecture

Routing, HTTP, View, Realtime are separate namespaces.
📌 4. Flow of a Request (Framework Runtime)
Browser → public/index.php → Request::capture()
        → Router::dispatch(Request)
        → Match route
        → Execute controller/closure
        → Wrap result in Response
        → Response::send()


Only index.php is the Front Controller.

📌 5. What Copilot Should Focus On

When editing files under src/:

Routing (very important now)

Suggest clean registration methods (get/post).

Dynamic URI to regex transformation.

Clean dispatch logic.

Support closure, string, array handler syntax.

HTTP

Improving Request (method, path, query, input, JSON)

Building Response helpers (json, header, etc.)

Facade

Provide static-to-instance forwarding.

When editing app/Controllers:

Assume simple controllers with plain PHP methods.

Controllers may return:

a Response

a string

(later) a view

📌 6. What Copilot Should NOT Assume

No Service Container (yet).

No Eloquent ORM.

No middleware system (yet).

No Blade view engine (ours is separate).

No helper functions like view(), route(), etc. unless defined by us.

No Laravel/Symfony features unless we create them manually.

📌 7. Roadmap (Guide for Copilot)

Copilot should understand this sequence:

Phase 1 (now)

Routing

HTTP Request/Response

Facade system

Basic controller execution

Phase 2

View engine (.lamda.php templates)

View compiler → PHP

Phase 3

Realtime SSE module

Event stream abstraction

Phase 4 (optional)

WebSocket driver interface

Phase 5

Config loader

Error handler

📌 8. Coding conventions
Namespaces
Lamda\Core\{Module}
Lamda\Support\Facades
App\Controllers

File structure
src/Core/
src/Support/Facades/
app/Controllers/
routes/web.php
public/index.php

Controllers

Plain PHP classes:

class HomeController {
    public function index() {
        return "Hello World";
    }
}

📌 9. Framework Goal Summary (Copilot must learn this)

LamdaPHP =
Micro-framework
modular
Laravel-style syntax
built from scratch
with realtime SSE
inside a clean, minimal architecture.

Not a Laravel clone.
Not a full-stack mega framework.
But a clean educational framework with professional design patterns.

Copilot, remember: help me write LamdaPHP's core modules cleanly, predictably, and using minimal magic.


---

# 🧠 **Cara Pakai Dokumen Ini**

1. Buat folder:


docs/

2. Buat file:


docs/lamdaphp-spec.md

3. Paste isi dokumen di atas.

VSCode Copilot biasanya akan:
- membaca file ini,
- menggunakannya sebagai *context*,
- memberikan saran sesuai arsitektur dan roadmap LamdaPHP.

Kalau mau ekstra efektif:
- Simpan juga di `.github/copilot-instructions.md`
- Atau paste ke **VSCode Workspace Instructions** (fitur Copilot terbaru)

---