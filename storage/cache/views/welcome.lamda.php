<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LamdaPHP</title>

<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<script>
tailwind.config = {
theme: {
extend: {

colors: {
navy: '#1e3a8a',
navySoft: '#eef2ff'
},

animation: {
float: "float 6s ease-in-out infinite",
fadeInUp: "fadeUp 0.8s ease forwards",
pulseSoft: "pulseSoft 4s ease-in-out infinite"
},

keyframes: {
float: {
"0%,100%": { transform: "translateY(0px)" },
"50%": { transform: "translateY(-15px)" }
},
fadeUp: {
"0%": { opacity: 0, transform: "translateY(30px)" },
"100%": { opacity: 1, transform: "translateY(0)" }
},
pulseSoft: {
"0%,100%": { opacity: 0.4 },
"50%": { opacity: 0.8 }
}
}

}
}
}
</script>

</head>

<body class="bg-white text-slate-700 min-h-screen flex flex-col antialiased">

<!-- ================= HEADER ================= -->
<header class="sticky top-0 z-50 backdrop-blur-xl bg-white/70 border-b border-slate-200">
<div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

<div class="flex items-center gap-3">
<div class="h-9 w-9 rounded-xl bg-gradient-to-br from-blue-700 to-blue-900 flex items-center justify-center shadow-sm">
<img src="/storage/images/logo.svg" class="w-5">
</div>
<span class="text-lg font-semibold tracking-tight text-slate-900">
Lamda<span class="text-navy">PHP</span>
</span>
</div>

<nav class="hidden md:flex items-center gap-10 text-sm font-medium">
<a href="#" class="text-slate-600 hover:text-navy transition">Home</a>
<a href="https://lamdaphp.netlify.app/installation" class="text-slate-600 hover:text-navy transition">Installation</a>
<a href="https://lamdaphp.netlify.app/diretory" class="text-slate-600 hover:text-navy transition">Documentation</a>
</nav>

<a href="https://lamdaphp.netlify.app/installation"
class="px-5 py-2 rounded-lg bg-navy text-white text-sm font-medium hover:bg-blue-900 transition shadow-sm">
Get Started
</a>

</div>
</header>

<!-- ================= HERO ================= -->
<main class="flex-1">

<section class="relative overflow-hidden">

<!-- gradient background -->
<div class="absolute inset-0 bg-gradient-to-b from-navySoft to-white"></div>

<!-- glow -->
<div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[600px] 
bg-blue-200 rounded-full blur-3xl opacity-40 animate-pulseSoft"></div>

<!-- floating logos -->
<div class="absolute right-10 top-24 opacity-10 animate-float hidden md:block">
<img src="/storage/images/logo.svg" class="w-72">
</div>

<div class="absolute left-10 bottom-10 opacity-10 animate-float hidden md:block" style="animation-delay:2s">
<img src="/storage/images/logo.svg" class="w-48">
</div>

<!-- content -->
<div class="relative max-w-4xl mx-auto px-6 py-28 text-center animate-fadeInUp">

<div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-medium bg-white border shadow-sm mb-8">
<span class="h-2 w-2 rounded-full bg-navy"></span>
Lightweight PHP Microframework
</div>

<h1 class="text-5xl md:text-6xl font-bold text-slate-900 leading-tight mb-6">
Build modern PHP apps
<span class="text-navy">faster</span>
</h1>

<p class="text-lg text-slate-600 leading-relaxed max-w-2xl mx-auto mb-12">
LamdaPHP adalah microframework PHP ringan untuk membangun aplikasi web modern 
dengan arsitektur sederhana, performa tinggi, dan realtime rendering.
</p>

<div class="flex flex-col sm:flex-row gap-4 justify-center">

<a href="https://lamdaphp.netlify.app/installation"
class="px-7 py-3 rounded-xl bg-navy text-white font-medium
hover:bg-blue-900 transition
shadow-lg shadow-blue-200
hover:shadow-blue-400/40
hover:-translate-y-0.5 transform">
Get Started
</a>

<a href="https://lamdaphp.netlify.app/diretory"
class="px-7 py-3 rounded-xl border border-slate-300 hover:border-navy text-slate-700 hover:text-navy transition">
Documentation
</a>

</div>

</div>
</section>


<!-- divider -->
<div class="h-24 bg-gradient-to-b from-transparent to-slate-50"></div>


<!-- ================= FEATURES ================= -->
<section class="py-24 px-6 bg-slate-50">
<div class="max-w-6xl mx-auto text-center mb-14">
<h2 class="text-3xl font-semibold text-slate-900 mb-3">
Designed for modern development
</h2>
<p class="text-slate-600">
Simple architecture. Powerful performance. Built for real-time experience.
</p>
</div>

<div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8">

<div class="p-8 rounded-2xl border border-slate-200 
hover:border-blue-200 hover:shadow-xl
hover:-translate-y-2 transition duration-300 bg-white">
<div class="h-10 w-10 rounded-lg bg-navySoft flex items-center justify-center text-navy mb-4 animate-pulseSoft">
⚡
</div>
<h3 class="font-semibold text-slate-900 mb-2">Realtime Rendering</h3>
<p class="text-sm text-slate-600">
Update UI tanpa reload menggunakan Server-Sent Events dan server-driven HTML rendering.
</p>
</div>

<div class="p-8 rounded-2xl border border-slate-200 
hover:border-blue-200 hover:shadow-xl
hover:-translate-y-2 transition duration-300 bg-white">
<div class="h-10 w-10 rounded-lg bg-navySoft flex items-center justify-center text-navy mb-4 animate-pulseSoft">
🪶
</div>
<h3 class="font-semibold text-slate-900 mb-2">Lightweight Core</h3>
<p class="text-sm text-slate-600">
Tanpa dependensi berat. Struktur minimal, mudah dipahami, mudah dikembangkan.
</p>
</div>

<div class="p-8 rounded-2xl border border-slate-200 
hover:border-blue-200 hover:shadow-xl
hover:-translate-y-2 transition duration-300 bg-white">
<div class="h-10 w-10 rounded-lg bg-navySoft flex items-center justify-center text-navy mb-4 animate-pulseSoft">
🔄
</div>
<h3 class="font-semibold text-slate-900 mb-2">Event Driven</h3>
<p class="text-sm text-slate-600">
Sistem event queue untuk komunikasi realtime antara server dan client.
</p>
</div>

</div>
</section>

</main>

<!-- ================= FOOTER ================= -->
<footer class="border-t border-slate-200 py-10 text-center text-sm text-slate-500">
© 2026 LamdaPHP — Lightweight PHP Microframework
</footer>

</body>
</html>
