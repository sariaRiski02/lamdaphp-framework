


# LamdaPHP
Documentation : https://lamdaphp.netlify.app/
LamdaPHP is a lightweight, modular PHP micro-framework inspired by Laravel’s expressive syntax — **BUT WAIT**, before you expect something huge, let me be clear:

⚠️ **This is not a big framework.  
⚠️ This is not a serious production-ready project.  
⚠️ This is an *enjoy project*.**

I built LamdaPHP because:
- I love understanding how frameworks work under the hood,
- I enjoy experimenting with architecture patterns,
- and… yeah, I accidentally turned this into my **final Undergraduate Final Project ** 😅

So if you're here expecting Symfony 2.0… bro, you're in the wrong repo.  
If you’re here to learn, explore, or see a simple framework growing from scratch — welcome 🤝

---

## ✨ What is LamdaPHP?

LamdaPHP is a **micro-framework** with:
- Minimal routing system  
- Request & Response abstraction  
- Clean modular structure  
- Laravel-like facade syntax  
- Flexible handlers (closure, array callbacks, `"Controller@method"`)  
- Built-in realtime support (SSE under construction)  
- Zero external dependencies (pure PHP)

It’s designed to be **understandable**, not **massive**.

Think of it like building your own small Laravel, but without the 900+ internal classes 🤣

---

## 📦 Project Goals (a.k.a. why I spent nights on this)

- Learn how modern frameworks are architected  
- Build something small but extensible  
- Understand routing, dispatching, request lifecycle  
- Explore facade pattern & modular separation  
- Make my research advisor think I’m smart 😎  
- Have fun  

---

## 🗂️ Project Structure

```

src/
    Core/  -> it will separate later  
        Routing/
        Http/
        Support/
            Facades/
            ....
app/
Controllers/
routes/
    web.php
public/
    index.php

````

This follows PSR-4 autoloading with:
- `Lamda\` → `src/`
- `App\` → `app/`

---

## 🚀 Quick Start

Run local server:

```bash
php -S localhost:8000 -t public
````


### ⚠️ Server Requirements

For real-time features (SSE), use **Nginx** or **Apache** instead of PHP's built-in server:

```bash
# Built-in server (single-threaded, not recommended)
php -S localhost:8000 -t public

# Use Nginx or Apache for production/real-time features
```

The built-in PHP server handles only one request at a time, which breaks real-time functionality. Yeah, it's that bad.

```bash
# Windows: Use Apache (recommended)
# Linux: Use multi-worker PHP server
PHP_CLI_SERVER_WORKERS=4 php -S localhost:8000 -t public
```

**Note:** On Windows, the built-in server doesn't support multiple workers — Apache or Nginx it is. On Linux, you can use the `PHP_CLI_SERVER_WORKERS` environment variable to handle multiple concurrent requests.

**macOS:** No docs yet. I’m a student, my wallet is on life support, and a Mac is currently a legendary creature I read about in books. So the macOS setup will stay mysterious for now. 🍎💸🎓




## 🧠 Why modular?

Because I want each part to be a “lego block”:

* Routing → 1 module
* HTTP → 1 module
* View Engine → future module
* WebSocket → (under cunstructor) maybe i dont want to impementation this feature hehe...
* SSE → yee.. i was implemented this feature

Makes the code super clean and fun to hack on.

---

## 💬 Final Notes

If you cloned this repo to judge its architecture:

> Nice, I appreciate it.

If you cloned this repo to use it in production:

> Bro… don’t 😭

If you cloned this repo because you're also building your own framework:

> Welcome to the club. Bring snacks. 🍿

---

### 🫶 Credits

Developed by **Muhammat Rizky Saria**
A student who loves PHP too much, Love Design Pattern and decided to turn a fun project into a Undergraduate Final Project.

```


