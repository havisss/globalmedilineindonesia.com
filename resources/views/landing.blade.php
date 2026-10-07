<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Molecular Diagnostics | {{ config('app.name', 'Global Mediline Indonesia') }}</title>
    <meta name="description" content="Global Mediline Indonesia delivers precision molecular diagnostics — digital PCR, nucleic acid extraction, reagents and laboratory analyzers for hospitals and research labs.">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Michroma&display=swap" rel="stylesheet">

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    @vite(['resources/css/landing.css'])
    @stack('styles')
</head>
<body>

@php
    $categories = ['Laboratory Automation', 'Immunoassay', 'Hematology', 'Molecular', 'Urinalysis', 'Hemostasis', 'Clinical Chemistry', 'Pathology'];

    $products = [
        [
            'model' => 'D600',
            'title' => 'Automatic Digital PCR System',
            'desc'  => 'Fully integrated droplet generation, amplification and reading for absolute quantification without standard curves.',
            'tag'   => 'Digital PCR',
            'image' => 'images/product-dpcr.jpg',
        ],
        [
            'model' => 'EX96',
            'title' => 'Nucleic Acid Extraction System',
            'desc'  => 'High-throughput magnetic bead extraction processing up to 96 samples in a single, contamination-controlled run.',
            'tag'   => 'Sample Prep',
            'image' => 'images/product-extract96.jpg',
        ],
        [
            'model' => 'EX32',
            'title' => 'Compact Extraction Workstation',
            'desc'  => 'A bench-friendly 32-sample extractor with touch-screen workflows, ideal for decentralised and mid-size labs.',
            'tag'   => 'Sample Prep',
            'image' => 'images/product-extract32.jpg',
        ],
        [
            'model' => 'qPCR',
            'title' => 'Real-time PCR Reagent Kits',
            'desc'  => 'Validated assays for infectious disease, oncology and genetic screening — optimised for speed and sensitivity.',
            'tag'   => 'Reagents',
            'image' => 'images/product-reagents.jpg',
        ],
        [
            'model' => 'H800',
            'title' => 'Automated Hematology Analyzer',
            'desc'  => 'Five-part differential CBC with continuous loading and smart flagging for busy hospital laboratories.',
            'tag'   => 'Hematology',
            'image' => 'images/product-hematology.jpg',
        ],
    ];
@endphp

{{-- =====================================================
     1. HEADER
===================================================== --}}
<header class="site-header" id="siteHeader">
    <div class="container">
        <a href="{{ url('/') }}" class="logo" aria-label="Global Mediline Indonesia — Home">
            <img src="{{ asset('images/logo.png') }}" alt="Global Mediline Indonesia" height="84">
        </a>

        <div class="header-actions">
            <div class="header-lang" aria-label="Language">
                <a href="#" class="is-active">EN</a>
                <span aria-hidden="true">/</span>
                <a href="#">ID</a>
            </div>
            <button class="hamburger" id="menuOpen" aria-label="Open menu" aria-controls="overlayMenu" aria-expanded="false">
                <span class="hamburger-lines"><span></span><span></span><span></span></span>
            </button>
        </div>
    </div>
</header>

{{-- =====================================================
     OVERLAY MENU
===================================================== --}}
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
                    <h2><a href="#">About Us</a></h2>
                    <ul>
                        <li><a href="#">Company Profile</a></li>
                        <li><a href="#">Sustainability</a></li>
                        <li><a href="#">Our History</a></li>
                        <li><a href="#">Certifications</a></li>
                    </ul>
                </div>
                <div class="menu-group" data-stagger>
                    <h2><a href="#catalog">Solutions</a></h2>
                    <ul>
                        @foreach ($categories as $cat)
                            <li><a href="#catalog">{{ $cat }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="menu-group" data-stagger>
                    <h2><a href="#">Service Center</a></h2>
                    <ul>
                        <li><a href="#">Quality Control</a></li>
                        <li><a href="#">Service Network</a></li>
                        <li><a href="#">Technical Documents</a></li>
                        <li><a href="#">Training</a></li>
                    </ul>
                </div>
            </nav>

            <aside class="menu-aside" data-stagger>
                <a href="#contact" class="cta-link">
                    Contact Us
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M7 17L17 7M9 7h8v8"/></svg>
                </a>
                <a href="#" class="join">Careers</a>
                <address>
                    <span>Head Office</span>
                    Jakarta, Indonesia<br>
                    +62 21 0000 0000<br>
                    info@globalmedilineindonesia.com
                </address>
            </aside>
        </div>
    </div>
</div>

<main>
    {{-- =====================================================
         2. HERO
    ===================================================== --}}
    <section class="hero" id="top" aria-labelledby="heroTitle">
        <div class="hero-bg" aria-hidden="true" style="background-image: url('{{ asset('images/hero.jpg') }}');"></div>
        {{-- Visually hidden heading for SEO / screen readers; the hero itself shows only the image --}}
        <h1 id="heroTitle" class="sr-only">Global Mediline Indonesia — Molecular Diagnostics Solutions</h1>
    </section>

    {{-- =====================================================
         INTRO
    ===================================================== --}}
    <section class="intro" id="intro" aria-labelledby="introTitle">
        <div class="container">
            <div class="intro-grid">
                <div class="reveal">
                    <span class="eyebrow">Who we are</span>
                    <h2 id="introTitle">A complete molecular workflow, <b>from sample to answer.</b></h2>
                </div>
                <p class="reveal" data-delay="1">
                    Global Mediline Indonesia partners with hospitals, reference laboratories and research institutes
                    to deliver integrated diagnostic systems — instruments, reagents and expert service —
                    built on a single promise: results you can rely on.
                </p>
            </div>

            <div class="stats">
                <div class="stat reveal"><div class="stat-num"><span data-count="15">0</span><sup>+</sup></div><p>Years of clinical expertise</p></div>
                <div class="stat reveal" data-delay="1"><div class="stat-num"><span data-count="1200">0</span><sup>+</sup></div><p>Laboratories served nationwide</p></div>
                <div class="stat reveal" data-delay="2"><div class="stat-num"><span data-count="34">0</span></div><p>Provinces with service coverage</p></div>
                <div class="stat reveal" data-delay="3"><div class="stat-num"><span data-count="24">0</span><sup>/7</sup></div><p>Technical support hotline</p></div>
            </div>
        </div>
    </section>

    {{-- =====================================================
         3. CATALOG
    ===================================================== --}}
    <section class="catalog" id="catalog" aria-labelledby="catalogTitle">
        <div class="container">
            <div class="catalog-head">
                <div class="reveal">
                    <span class="eyebrow">Product Catalog</span>
                    <h2 id="catalogTitle">Engineered for <b>precision.</b></h2>
                </div>
            </div>

            <div class="catalog-slider-container reveal" data-delay="2">
                <button class="slider-btn slider-prev" id="catalogPrev" aria-label="Previous products">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                </button>

                <div class="swiper catalog-swiper">
                    <div class="swiper-wrapper">
                        @php
                            $loopProducts = array_merge($products, $products, $products, $products);
                        @endphp
                        @foreach ($loopProducts as $i => $product)
                            <div class="swiper-slide">
                                <article class="product-card">
                                    <div class="product-card-header">
                                        <div class="product-titles">
                                            <h3 class="product-model">{{ $product['model'] }}</h3>
                                            <p class="product-subtitle">{{ $product['title'] }}</p>
                                        </div>
                                        <button class="product-options" aria-label="More options">
                                            <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="19" cy="12" r="1.5"/></svg>
                                        </button>
                                    </div>
                                    <div class="product-media">
                                        <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" loading="lazy">
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="slider-btn slider-next" id="catalogNext" aria-label="Next products">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
            </div>

            <div class="slider-bottom">
                <div class="swiper-pagination catalog-pagination"></div>
                <div class="slider-progress" aria-hidden="true"><span id="catalogProgress"></span></div>
                <div class="slider-count" aria-hidden="true"><b id="catalogCurrent">01</b> / {{ str_pad(count($products), 2, '0', STR_PAD_LEFT) }}</div>
            </div>
        </div>
    </section>

    {{-- CTA band --}}
    <section class="cta-band reveal" aria-labelledby="ctaTitle">
        <div class="cta-band-inner">
            <h2 id="ctaTitle">Ready to elevate your laboratory? <b>Let's build it together.</b></h2>
            <a href="#contact" class="btn-slide" id="ctaContact">
                Request a Consultation
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>
    </section>
</main>

{{-- =====================================================
     4. FOOTER
===================================================== --}}
<footer class="site-footer" id="contact">
    <div class="container">
        <div class="footer-main">
            <div class="footer-col footer-about">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Global Mediline Indonesia" height="92">
                </a>
                <p>Trusted partner for in-vitro diagnostics in Indonesia — delivering instruments, reagents and service that help laboratories produce accurate results every day.</p>
                <div class="socials">
                    <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M4.98 3.5a2.5 2.5 0 11-.02 5 2.5 2.5 0 01.02-5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-1 1.83-2.05 3.77-2.05C20.6 8.65 21 11.3 21 14.7V21h-4v-5.6c0-1.34-.03-3.07-1.87-3.07-1.87 0-2.16 1.46-2.16 2.97V21H9z"/></svg></a>
                    <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg></a>
                    <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23 7.2a3 3 0 00-2.1-2.1C19 4.6 12 4.6 12 4.6s-7 0-8.9.5A3 3 0 001 7.2 31 31 0 00.5 12 31 31 0 001 16.8a3 3 0 002.1 2.1c1.9.5 8.9.5 8.9.5s7 0 8.9-.5a3 3 0 002.1-2.1 31 31 0 00.5-4.8 31 31 0 00-.5-4.8zM9.8 15.1V8.9l5.7 3.1z"/></svg></a>
                    <a href="#" aria-label="WhatsApp"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 00-8.6 15.1L2 22l5-1.3A10 10 0 1012 2zm5.3 14.2c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-3.3-.8-2.8-1.1-4.6-4-4.7-4.2-.1-.2-1.1-1.5-1.1-2.9s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.9 2.1c.1.2.1.3 0 .5l-.3.5-.4.4c-.1.1-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1 2.1 1.3 2.4 1.5.3.1.5.1.6-.1l.9-1c.2-.3.4-.2.6-.1l2 1c.3.1.5.2.5.3.1.1.1.6-.1 1.2z"/></svg></a>
                </div>
            </div>

            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#catalog">Products</a></li>
                    <li><a href="#">Service Center</a></li>
                    <li><a href="#">News &amp; Events</a></li>
                    <li><a href="#">Careers</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Contact</h3>
                <ul class="footer-contact">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 21s-7-6.2-7-12a7 7 0 1114 0c0 5.8-7 12-7 12z"/><circle cx="12" cy="9" r="2.5"/></svg>
                        <span>Jl. Example Raya No. 1<br>Jakarta 12345, Indonesia</span>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6A19.8 19.8 0 012.1 4.2 2 2 0 014.1 2h3a2 2 0 012 1.7c.1.9.4 1.8.7 2.7a2 2 0 01-.5 2.1L8 9.8a16 16 0 006 6l1.3-1.3a2 2 0 012.1-.4c.9.3 1.8.6 2.7.7a2 2 0 011.7 2z"/></svg>
                        <a href="tel:+622100000000">+62 21 0000 0000</a>
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 6l-10 7L2 6"/></svg>
                        <a href="mailto:info@globalmedilineindonesia.com">info@globalmedilineindonesia.com</a>
                    </li>
                </ul>
            </div>

            <div class="footer-col newsletter">
                <h3>Newsletter</h3>
                <p>Get product launches, scientific insights and event invitations — straight to your inbox.</p>
                <form class="newsletter-form" id="newsletterForm" action="#" method="POST" novalidate>
                    @csrf
                    <label for="newsletterEmail" class="sr-only">Email address</label>
                    <input type="email" id="newsletterEmail" name="email" placeholder="Your email address" required autocomplete="email">
                    <button type="submit" id="newsletterSubmit" aria-label="Subscribe">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                    </button>
                </form>
                <p class="newsletter-note" id="newsletterNote" aria-live="polite"></p>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>&copy; {{ date('Y') }} PT Global Mediline Indonesia. All rights reserved.</p>
            <nav aria-label="Legal">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Use</a>
            </nav>
        </div>
    </div>
</footer>

<a href="#top" class="back-top" id="backTop" aria-label="Back to top">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 19V5M6 11l6-6 6 6"/></svg>
</a>

{{-- =====================================================
     SCRIPTS
     (In a layout-based setup, wrap this in @push('scripts') ... @endpush
      and render with @stack('scripts') before </body>.)
===================================================== --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    /* ---------- Header: scrolled + hide on scroll down ---------- */
    const header = document.getElementById('siteHeader');
    const backTop = document.getElementById('backTop');
    let lastY = window.scrollY;

    const onScroll = () => {
        const y = window.scrollY;
        header.classList.toggle('is-scrolled', y > 60);
        header.classList.toggle('is-hidden', y > lastY && y > window.innerHeight * 0.6);
        backTop.classList.toggle('is-visible', y > window.innerHeight);
        lastY = y;
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ---------- Overlay menu ---------- */
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
    menu.querySelectorAll('a[href^="#"]').forEach((a) => a.addEventListener('click', () => setMenu(false)));

    /* ---------- Reveal on scroll ---------- */
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));

    /* ---------- Counters ---------- */
    const countObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const target = parseInt(el.dataset.count, 10);
            const start = performance.now();
            const duration = 1800;
            const tick = (now) => {
                const t = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - t, 4);
                el.textContent = Math.round(target * eased).toLocaleString('en-US');
                if (t < 1) requestAnimationFrame(tick);
            };
            requestAnimationFrame(tick);
            countObserver.unobserve(el);
        });
    }, { threshold: 0.6 });
    document.querySelectorAll('[data-count]').forEach((el) => countObserver.observe(el));

    /* ---------- Swiper catalog ---------- */
    const total = {{ count($products) }};
    const progress = document.getElementById('catalogProgress');
    const current = document.getElementById('catalogCurrent');

    const updateMeta = (swiper) => {
        let realIndex = swiper.realIndex !== undefined ? swiper.realIndex : (swiper.activeIndex || 0);
        const idx = (realIndex % total) + 1;
        current.textContent = String(idx).padStart(2, '0');
        progress.style.transform = `scaleX(${idx / total})`;
    };

    new Swiper('.catalog-swiper', {
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 0,
        speed: 800,
        loop: true,
        effect: 'coverflow',
        coverflowEffect: {
            rotate: 0,
            stretch: 70,
            depth: 120,
            modifier: 1,
            slideShadows: false,
        },
        grabCursor: true,
        keyboard: { enabled: true },
        navigation: { prevEl: '#catalogPrev', nextEl: '#catalogNext' },
        pagination: { el: '.catalog-pagination', clickable: true },
        breakpoints: {
            640:  { spaceBetween: 20 },
            900:  { spaceBetween: 30 },
            1200: { spaceBetween: 30 },
        },
        on: {
            init: updateMeta,
            slideChange: updateMeta,
        },
    });

    /* ---------- Newsletter (front-end demo) ---------- */
    const form = document.getElementById('newsletterForm');
    const note = document.getElementById('newsletterNote');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = form.email.value.trim();
        const valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        note.classList.toggle('is-success', valid);
        note.textContent = valid ? 'Thank you! You are now subscribed.' : 'Please enter a valid email address.';
        if (valid) form.reset();
    });
});
</script>
@stack('scripts')
</body>
</html>
