{{-- resources/views/layouts/inner.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name', 'Global Mediline Indonesia') }}</title>
    
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Michroma&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">

    @vite(['resources/css/landing.css', 'resources/css/inner.css'])
    @stack('styles')
</head>
<body>

{{-- Header & Menu --}}
<header class="site-header" id="siteHeader">
    <div class="container">
        <a href="{{ url('/') }}" class="logo" aria-label="Global Mediline Indonesia — Home">
            <img src="{{ asset('images/logo.png') }}" alt="Global Mediline Indonesia" height="84">
        </a>

        <div class="header-actions">
            <div class="header-lang" aria-label="Language">
                <a href="#" class="is-active">ID</a>
                <span aria-hidden="true">/</span>
                <a href="#">EN</a>
            </div>
            <button class="hamburger" id="menuOpen" aria-label="Open menu" aria-controls="overlayMenu" aria-expanded="false">
                <span class="hamburger-lines"><span></span><span></span><span></span></span>
            </button>
        </div>
    </div>
</header>

<div class="menu-backdrop" id="menuBackdrop" aria-hidden="true"></div>
<div class="overlay-menu" id="overlayMenu" role="dialog" aria-modal="true" aria-label="Site navigation" aria-hidden="true">
    <div class="overlay-top">
        <div class="container">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Global Mediline Indonesia" height="76">
            </a>
            <button class="menu-close" id="menuClose" aria-label="Close menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M6 6l12 12M18 6L6 18"/></svg>
            </button>
        </div>
    </div>

    <div class="overlay-body">
        <div class="container">
            <div class="overlay-intro" data-stagger>
                <p class="big">Precision you can <em>trust.</em></p>
                <p>Advancing laboratory medicine across Indonesia with accurate, reliable diagnostic solutions.</p>
            </div>

            <nav class="menu-nav" aria-label="Main">
                <div class="menu-group" data-stagger>
                    <h2><a href="{{ url('/') }}" class="close-menu">HOME</a></h2>
                    <ul>
                        <li><a href="{{ url('/') }}" class="close-menu">Beranda</a></li>
                    </ul>
                </div>
                <div class="menu-group" data-stagger>
                    <h2><a href="{{ url('/products') }}" class="close-menu">PRODUK</a></h2>
                    <ul>
                        <li><a href="{{ url('/products') }}" class="close-menu">Katalog Produk</a></li>
                    </ul>
                </div>
                <div class="menu-group" data-stagger>
                    <h2><a href="{{ url('/about') }}" class="close-menu">PERUSAHAAN</a></h2>
                    <ul>
                        <li><a href="{{ url('/about/profil-perusahaan') }}" class="close-menu">Profil Perusahaan</a></li>
                        <li><a href="{{ url('/about/landasan-perusahaan') }}" class="close-menu">Landasan Perusahaan</a></li>
                        <li><a href="{{ url('/about/nilai-tambah') }}" class="close-menu">Nilai Tambah</a></li>
                    </ul>
                </div>
                <div class="menu-group" data-stagger>
                    <h2><a href="{{ url('/services') }}" class="close-menu">LAYANAN</a></h2>
                    <ul>
                        <li><a href="{{ url('/services/portofolio-pelayanan') }}" class="close-menu">Portofolio Pelayanan</a></li>
                        <li><a href="{{ url('/services/sektor-pelayanan') }}" class="close-menu">Sektor Pelayanan</a></li>
                        <li><a href="{{ url('/services/layanan-teknis') }}" class="close-menu">Layanan Teknis</a></li>
                    </ul>
                </div>
                <div class="menu-group" data-stagger>
                    <h2><a href="{{ url('/contact') }}" class="close-menu">KONTAK</a></h2>
                    <ul>
                        <li><a href="{{ url('/contact') }}" class="close-menu">Hubungi Kami</a></li>
                    </ul>
                </div>
            </nav>

            <aside class="menu-aside" data-stagger>
                <a href="{{ url('/contact') }}" class="cta-link close-menu">
                    Hubungi Kami
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M7 17L17 7M9 7h8v8"/></svg>
                </a>
                <address>
                    <span>Head Office</span>
                    PT. GLOBAL MEDILINE INDONESIA<br>
                    Jln. Paku Sari No. 09, Sesetan<br>
                    Denpasar Selatan, Kota Denpasar, Bali<br>
                    0828872379723<br>
                    info@globalmedilineindonesia.com
                </address>
            </aside>
        </div>
    </div>
</div>

<main>
    @hasSection('custom_layout')
        @yield('content')
    @else
        @hasSection('no_hero')
            {{-- Hero omitted for pages with custom header layout --}}
        @else
            <div class="inner-hero">
                <div class="container">
                    <h1>@yield('title')</h1>
                    <p>@yield('subtitle')</p>
                    <div class="breadcrumb">
                        <a href="{{ url('/') }}">Beranda</a> <span>/</span> 
                        <a href="#">@yield('parent')</a> <span>/</span> 
                        <span style="color:var(--c-accent)">@yield('title')</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="inner-content" @hasSection('no_hero') style="padding-top: calc(var(--header-h) + 20px);" @endif>
            <div class="container">
                @yield('content')
            </div>
        </div>
    @endif
</main>

<footer class="site-footer" id="contact">
    <div class="container">
        <div class="footer-main">
            <div class="footer-col footer-about">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Global Mediline Indonesia" height="92">
                </a>
                <p>Trusted partner for in-vitro diagnostics in Indonesia — delivering instruments, reagents and service that help laboratories produce accurate results every day.</p>
            </div>

            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/about/profil-perusahaan') }}">Profil Perusahaan</a></li>
                    <li><a href="{{ url('/services/portofolio-pelayanan') }}">Portofolio Pelayanan</a></li>
                    <li><a href="{{ url('/contact') }}">Hubungi Kami</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Contact</h3>
                <ul class="footer-contact">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s-7-6.2-7-12a7 7 0 1114 0c0 5.8-7 12-7 12z"/><circle cx="12" cy="9" r="2.5"/></svg>
                        <span>Jln. Paku Sari No. 09, Sesetan<br>Denpasar Selatan, Kota Denpasar, Bali</span>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6A19.8 19.8 0 012.1 4.2 2 2 0 014.1 2h3a2 2 0 012 1.7c.1.9.4 1.8.7 2.7a2 2 0 01-.5 2.1L8 9.8a16 16 0 006 6l1.3-1.3a2 2 0 012.1-.4c.9.3 1.8.6 2.7.7a2 2 0 011.7 2z"/></svg>
                        <a href="tel:0828872379723">0828872379723</a>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/></svg>
                        <a href="mailto:info@globalmedilineindonesia.com">info@globalmedilineindonesia.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; {{ date('Y') }} PT Global Mediline Indonesia. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('siteHeader');
    let lastY = window.scrollY;

    const onScroll = () => {
        const y = window.scrollY;
        header.classList.toggle('is-scrolled', y > 60);
        header.classList.toggle('is-hidden', y > lastY && y > window.innerHeight * 0.6);
        lastY = y;
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    const menu = document.getElementById('overlayMenu');
    const openBtn = document.getElementById('menuOpen');
    const closeBtn = document.getElementById('menuClose');
    const backdrop = document.getElementById('menuBackdrop');
    const staggerEls = menu.querySelectorAll('[data-stagger]');

    const setMenu = (open) => {
        menu.classList.toggle('is-open', open);
        backdrop.classList.toggle('is-open', open);
        menu.setAttribute('aria-hidden', String(!open));
        openBtn.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('no-scroll', open);
        staggerEls.forEach((el, i) => {
            el.style.transitionDelay = open ? `${0.25 + i * 0.08}s` : '0s';
        });
        (open ? closeBtn : openBtn).focus({ preventScroll: true });
    };

    openBtn.addEventListener('click', () => setMenu(true));
    closeBtn.addEventListener('click', () => setMenu(false));
    backdrop.addEventListener('click', () => setMenu(false));
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && menu.classList.contains('is-open')) setMenu(false);
    });
    menu.querySelectorAll('a[href^="#"], .close-menu').forEach((a) => a.addEventListener('click', () => setMenu(false)));
    
    // Reveal Observer for Inner Pages
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));
});
</script>
</body>
</html>
