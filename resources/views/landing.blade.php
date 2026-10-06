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

    {{--
        NOTE: For production, move the CSS below into resources/css/landing.css
        and load it with @vite('resources/css/landing.css') or
        <link rel="stylesheet" href="{{ asset('css/landing.css') }}">.
    --}}
    <style>
        /* =========================================================
           Design tokens
        ========================================================= */
        :root {
            --c-bg: #eef1f4;
            --c-surface: #ffffff;
            --c-card: #f5f7f9;
            --c-ink: #10161f;
            --c-ink-soft: #4a5563;
            --c-muted: #8a94a3;
            --c-line: rgba(16, 22, 31, .1);
            --c-accent: #ff5a1f;
            --c-accent-dark: #e44a12;
            --c-cyan: #2fd3d0;
            --c-navy: #07111d;
            --c-navy-2: #0c1a2a;

            --f-sans: 'Inter', system-ui, -apple-system, 'Segoe UI', sans-serif;
            --f-display: 'Michroma', 'Inter', sans-serif;

            --container: 1320px;
            --gutter: clamp(20px, 4vw, 56px);
            --radius: 20px;
            --radius-sm: 12px;
            --header-h: 88px;

            --ease: cubic-bezier(.22, .61, .36, 1);
            --ease-out: cubic-bezier(.16, 1, .3, 1);
            --shadow-sm: 0 2px 10px rgba(16, 22, 31, .05);
            --shadow-lg: 0 30px 60px -20px rgba(16, 22, 31, .25);
        }

        /* =========================================================
           Base
        ========================================================= */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; -webkit-text-size-adjust: 100%; }
        body {
            font-family: var(--f-sans);
            color: var(--c-ink);
            background: var(--c-bg);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }
        body.no-scroll { overflow: hidden; }
        img { display: block; max-width: 100%; }
        a { color: inherit; text-decoration: none; }
        button, input { font: inherit; color: inherit; }
        button { background: none; border: 0; cursor: pointer; }
        ul { list-style: none; }

        .container {
            width: 100%;
            max-width: calc(var(--container) + var(--gutter) * 2);
            margin-inline: auto;
            padding-inline: var(--gutter);
        }
        .sr-only {
            position: absolute; width: 1px; height: 1px; overflow: hidden;
            clip: rect(0 0 0 0); white-space: nowrap;
        }

        .eyebrow {
            display: inline-flex; align-items: center; gap: 12px;
            font-size: 13px; font-weight: 500; letter-spacing: .22em; text-transform: uppercase;
            color: var(--c-accent);
        }
        .eyebrow::before {
            content: ""; width: 28px; height: 1px; background: currentColor;
        }

        /* Reveal on scroll */
        .reveal { opacity: 0; transform: translateY(40px); transition: opacity 1s var(--ease-out), transform 1s var(--ease-out); }
        .reveal.is-visible { opacity: 1; transform: none; }
        .reveal[data-delay="1"] { transition-delay: .1s; }
        .reveal[data-delay="2"] { transition-delay: .2s; }
        .reveal[data-delay="3"] { transition-delay: .3s; }

        /* =========================================================
           Buttons
        ========================================================= */
        .btn-slide {
            position: relative; overflow: hidden; isolation: isolate;
            display: inline-flex; align-items: center; gap: 14px;
            padding: 18px 34px;
            border: 1px solid var(--c-accent);
            border-radius: 999px;
            color: var(--c-accent); font-size: 15px; font-weight: 500; letter-spacing: .02em;
            transition: color .5s var(--ease), border-color .5s var(--ease);
        }
        .btn-slide::before {
            content: ""; position: absolute; inset: 0; z-index: -1;
            background: var(--c-accent);
            transform: translateX(-101%);
            transition: transform .55s var(--ease-out);
        }
        .btn-slide:hover { border-color: var(--c-accent); color: #fff; }
        .btn-slide:hover::before { transform: translateX(0); }
        .btn-slide svg { width: 18px; height: 18px; transition: transform .45s var(--ease-out); }
        .btn-slide:hover svg { transform: translateX(5px); }

        .btn-pill {
            position: relative; overflow: hidden; isolation: isolate;
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 22px;
            border: 1px solid var(--c-accent); border-radius: 999px;
            font-size: 14px; color: var(--c-ink-soft);
            transition: color .4s var(--ease);
        }
        .btn-pill::before {
            content: ""; position: absolute; inset: 0; z-index: -1; background: var(--c-accent);
            transform: scaleX(0); transform-origin: left; transition: transform .45s var(--ease-out);
        }
        .btn-pill:hover { color: #fff; }
        .btn-pill:hover::before { transform: scaleX(1); }

        /* =========================================================
           1. Header
        ========================================================= */
        .site-header {
            position: fixed; inset: 0 0 auto 0; z-index: 100;
            height: var(--header-h);
            display: flex; align-items: center;
            color: var(--c-ink);
            transition: background .5s var(--ease), color .5s var(--ease), height .5s var(--ease), box-shadow .5s var(--ease), transform .5s var(--ease);
        }
        .site-header .container { display: flex; align-items: center; justify-content: space-between; }
        .site-header.is-scrolled {
            --header-h: 72px;
            background: rgba(255, 255, 255, .82);
            backdrop-filter: blur(18px) saturate(160%);
            -webkit-backdrop-filter: blur(18px) saturate(160%);
            color: var(--c-ink);
            box-shadow: 0 1px 0 var(--c-line);
        }
        .site-header.is-hidden { transform: translateY(-100%); }

        .logo { display: inline-flex; align-items: center; gap: 12px; }
        .logo-mark {
            width: 38px; height: 38px; border-radius: 10px;
            display: grid; place-items: center;
            background: linear-gradient(135deg, var(--c-accent), #ff9a3d);
            box-shadow: 0 8px 20px -6px rgba(255, 90, 31, .6);
        }
        .logo-mark svg { width: 22px; height: 22px; color: #fff; }
        .logo-text { display: flex; flex-direction: column; line-height: 1.1; }
        .logo-text strong { font-family: var(--f-display); font-size: 15px; letter-spacing: .08em; }
        .logo-text small { font-size: 10.5px; letter-spacing: .32em; text-transform: uppercase; opacity: .7; }

        .header-actions { display: flex; align-items: center; gap: 22px; }
        .header-lang {
            font-size: 13px; letter-spacing: .12em; font-weight: 500;
            display: inline-flex; gap: 8px; opacity: .85;
        }
        .header-lang a { opacity: .55; transition: opacity .3s; }
        .header-lang a.is-active, .header-lang a:hover { opacity: 1; }

        .hamburger {
            width: 48px; height: 48px; border-radius: 50%;
            display: grid; place-items: center;
            border: 1px solid currentColor;
            border-color: rgba(16, 22, 31, .18);
            background: rgba(255, 255, 255, .55);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: border-color .4s var(--ease), background .4s var(--ease);
        }
        .is-scrolled .hamburger { border-color: var(--c-line); }
        .hamburger:hover { background: var(--c-accent); border-color: var(--c-accent); color: #fff; }
        .hamburger-lines { position: relative; width: 20px; height: 12px; }
        .hamburger-lines span {
            position: absolute; left: 0; height: 1.6px; background: currentColor; border-radius: 2px;
            transition: width .4s var(--ease-out), transform .4s var(--ease-out);
        }
        .hamburger-lines span:nth-child(1) { top: 0; width: 100%; }
        .hamburger-lines span:nth-child(2) { top: 50%; width: 65%; transform: translateY(-50%); }
        .hamburger-lines span:nth-child(3) { bottom: 0; width: 85%; }
        .hamburger:hover .hamburger-lines span { width: 100%; }

        /* =========================================================
           Overlay menu
        ========================================================= */
        /* light blurred backdrop – the page stays visible behind the floating panel */
        .menu-backdrop {
            position: fixed; inset: 0; z-index: 190;
            background: rgba(238, 241, 244, .35);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            opacity: 0; visibility: hidden;
            transition: opacity .5s var(--ease), visibility 0s linear .5s;
        }
        .menu-backdrop.is-open { opacity: 1; visibility: visible; transition: opacity .5s var(--ease), visibility 0s; }

        /* floating dropdown panel */
        .overlay-menu {
            position: fixed; top: 14px; left: 14px; right: 14px; z-index: 200;
            max-height: calc(100vh - 28px); max-height: calc(100dvh - 28px);
            display: flex; flex-direction: column;
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(30px) saturate(160%);
            -webkit-backdrop-filter: blur(30px) saturate(160%);
            border: 1px solid rgba(255, 255, 255, .8);
            border-radius: 24px;
            box-shadow: 0 30px 80px -30px rgba(16, 40, 70, .25);
            overflow-y: auto;
            opacity: 0; visibility: hidden;
            transform: translateY(-30px) scale(.98);
            transform-origin: top center;
            transition: opacity .5s var(--ease), transform .7s var(--ease-out), visibility 0s linear .7s;
        }
        .overlay-menu.is-open {
            opacity: 1; visibility: visible; transform: none;
            transition: opacity .5s var(--ease), transform .7s var(--ease-out), visibility 0s;
        }
        .overlay-top {
            height: var(--header-h); flex-shrink: 0;
            border-bottom: 1px solid rgba(255, 90, 31, .45);
        }
        .overlay-top .container { height: 100%; display: flex; align-items: center; justify-content: space-between; }
        .overlay-top .logo { color: var(--c-ink); }

        .menu-close {
            width: 48px; height: 48px; border-radius: 50%;
            display: grid; place-items: center;
            background: var(--c-bg); color: var(--c-ink);
            transition: transform .5s var(--ease-out), background .4s var(--ease), color .4s var(--ease);
        }
        .menu-close:hover { transform: rotate(90deg); background: var(--c-accent); color: #fff; }
        .menu-close svg { width: 18px; height: 18px; }

        .overlay-body { flex: 1; display: flex; }
        .overlay-body .container {
            display: grid;
            grid-template-columns: 1.1fr 2.4fr 1fr;
            gap: clamp(30px, 4vw, 70px);
            padding-block: clamp(32px, 5vh, 64px);
        }
        .overlay-intro { align-self: end; }
        .overlay-intro p { color: var(--c-muted); font-size: 15px; max-width: 320px; margin-top: 18px; }
        .overlay-intro .big {
            font-size: clamp(34px, 3.4vw, 54px); font-weight: 300; line-height: 1.1; color: var(--c-ink);
        }
        .overlay-intro .big em { font-style: normal; color: var(--c-accent); }

        .menu-nav { display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; }
        .menu-group h2 {
            font-size: clamp(22px, 2vw, 30px); font-weight: 500; line-height: 1.2; margin-bottom: 26px;
        }
        .menu-group h2 a { position: relative; display: inline-block; }
        .menu-group h2 a::after {
            content: ""; position: absolute; left: 0; bottom: -6px; height: 2px; width: 100%;
            background: var(--c-accent); transform: scaleX(0); transform-origin: right;
            transition: transform .5s var(--ease-out);
        }
        .menu-group h2 a:hover::after { transform: scaleX(1); transform-origin: left; }
        .menu-group li + li { margin-top: 12px; }
        .menu-group li a {
            display: inline-flex; align-items: center; gap: 0;
            font-size: 16px; color: var(--c-ink-soft);
            transition: color .35s var(--ease), gap .35s var(--ease), padding .35s var(--ease);
        }
        .menu-group li a::before {
            content: ""; width: 0; height: 1px; background: var(--c-accent);
            transition: width .35s var(--ease), margin .35s var(--ease);
        }
        .menu-group li a:hover { color: var(--c-accent); }
        .menu-group li a:hover::before { width: 16px; margin-right: 10px; }

        .menu-aside {
            border-left: 1px solid rgba(255, 90, 31, .45);
            padding-left: clamp(24px, 3vw, 48px);
            display: flex; flex-direction: column; gap: 34px;
        }
        .menu-aside .cta-link {
            font-size: clamp(22px, 2vw, 30px); font-weight: 500; color: var(--c-accent);
            display: inline-flex; align-items: center; gap: 12px;
        }
        .menu-aside .cta-link svg { width: 22px; transition: transform .4s var(--ease-out); }
        .menu-aside .cta-link:hover svg { transform: translate(4px, -4px); }
        .menu-aside .join { font-size: clamp(22px, 2vw, 30px); font-weight: 500; }
        .menu-aside .join:hover { color: var(--c-accent); }
        .menu-aside address { font-style: normal; color: var(--c-ink-soft); font-size: 14.5px; line-height: 1.9; }
        .menu-aside address span { display: block; color: var(--c-muted); font-size: 12px; letter-spacing: .18em; text-transform: uppercase; margin-bottom: 6px; }

        /* stagger animation of menu content */
        .overlay-menu [data-stagger] {
            opacity: 0; transform: translateY(30px);
            transition: opacity .6s var(--ease-out), transform .8s var(--ease-out);
        }
        .overlay-menu.is-open [data-stagger] { opacity: 1; transform: none; }

        /* =========================================================
           2. Hero
        ========================================================= */
        .hero {
            position: relative; height: 100vh; height: 100svh; min-height: 520px;
            overflow: hidden; background: var(--c-bg);
        }
        .hero-bg {
            position: absolute; inset: -2%;
            background: url('{{ asset('images/hero.jpg') }}') center / cover no-repeat;
            animation: kenburns 28s ease-in-out infinite alternate;
            will-change: transform;
        }
        @keyframes kenburns {
            0%   { transform: scale(1) translate(0, 0); }
            50%  { transform: scale(1.12) translate(-2%, -1.5%); }
            100% { transform: scale(1.2) translate(1.5%, 1%); }
        }

        /* =========================================================
           Intro / stats
        ========================================================= */
        .intro { padding: clamp(90px, 12vw, 160px) 0 clamp(60px, 8vw, 100px); }
        .intro-grid { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(40px, 6vw, 100px); align-items: end; }
        .intro h2 {
            font-size: clamp(30px, 3.6vw, 52px); font-weight: 300; line-height: 1.15; letter-spacing: -.015em;
            margin-top: 22px;
        }
        .intro h2 b { font-weight: 600; }
        .intro p { color: var(--c-ink-soft); font-size: 17px; line-height: 1.85; }
        .stats {
            display: grid; grid-template-columns: repeat(4, 1fr);
            margin-top: clamp(60px, 7vw, 100px);
            border-top: 1px solid var(--c-line);
        }
        .stat { padding: 34px 24px 0 0; position: relative; }
        .stat + .stat { padding-left: 28px; border-left: 1px solid var(--c-line); }
        .stat-num {
            font-family: var(--f-display); font-size: clamp(30px, 3.4vw, 48px); line-height: 1; color: var(--c-ink);
        }
        .stat-num sup { font-family: var(--f-sans); font-size: .45em; color: var(--c-accent); margin-left: 4px; vertical-align: top; }
        .stat p { margin-top: 14px; font-size: 14.5px; color: var(--c-muted); }

        /* =========================================================
           3. Catalog
        ========================================================= */
        .catalog { padding: clamp(60px, 8vw, 110px) 0 clamp(90px, 11vw, 150px); overflow: hidden; }
        .catalog-head {
            display: flex; align-items: flex-end; justify-content: space-between; gap: 30px;
            margin-bottom: clamp(40px, 5vw, 64px);
        }
        .catalog-head h2 {
            font-size: clamp(32px, 4vw, 58px); font-weight: 300; line-height: 1.1; letter-spacing: -.02em; margin-top: 18px;
        }
        .catalog-head h2 b { font-weight: 600; }
        .catalog-slider-container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
            margin: 0 -20px;
        }
        .slider-btn {
            width: 60px; height: 60px; border-radius: 50%;
            display: grid; place-items: center;
            background: #ffffff;
            border: 1px solid rgba(16, 22, 31, .06); color: var(--c-ink);
            box-shadow: 0 4px 14px rgba(16, 22, 31, .04);
            cursor: pointer;
            transition: all .4s var(--ease);
            position: absolute;
            z-index: 10;
            top: 50%;
            transform: translateY(-50%);
        }
        .slider-btn svg { width: 22px; height: 22px; transition: transform .4s var(--ease-out); }
        .slider-btn:hover { border-color: rgba(16, 22, 31, .15); box-shadow: 0 8px 24px rgba(16, 22, 31, .08); }
        .slider-prev { left: -10px; }
        .slider-next { right: -10px; }
        .slider-prev:hover svg { transform: translateX(-3px); }
        .slider-next:hover svg { transform: translateX(3px); }
        .slider-btn.swiper-button-disabled { opacity: .3; pointer-events: none; }

        .catalog-swiper { 
            width: 100%; max-width: 1100px;
            overflow: visible !important; padding: 40px 0; 
        }
        .catalog-swiper .swiper-slide { 
            width: 500px;
            height: auto; 
            transition: transform .7s var(--ease), opacity .7s var(--ease);
            opacity: 0.5;
            transform: scale(0.85);
        }
        @media (max-width: 768px) {
            .catalog-swiper .swiper-slide { width: 320px; }
        }
        .catalog-swiper .swiper-slide-active { 
            opacity: 1; 
            transform: scale(1); 
            z-index: 2; 
        }

        .product-card {
            height: 100%;
            display: flex; flex-direction: column;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(16, 22, 31, .03);
            border: 1px solid rgba(16, 22, 31, 0.04);
            transition: box-shadow .6s var(--ease-out);
        }
        .catalog-swiper .swiper-slide-active .product-card {
            box-shadow: 0 40px 100px -20px rgba(16, 22, 31, .15);
            border-color: rgba(16, 22, 31, 0.08);
        }
        .product-card-header {
            padding: 36px 36px 10px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }
        .product-titles { flex: 1; }
        .product-model {
            font-family: var(--f-display);
            font-size: 26px;
            font-weight: 700;
            color: #b4bcc6;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
            transition: color 0.5s var(--ease);
        }
        .catalog-swiper .swiper-slide-active .product-model {
            color: var(--c-ink);
        }
        .product-subtitle {
            font-size: 14.5px;
            color: var(--c-ink-soft);
            line-height: 1.5;
            font-weight: 500;
        }
        .product-options {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--c-navy-2); color: #ffffff;
            display: grid; place-items: center;
            flex-shrink: 0; margin-left: 20px;
            transition: background 0.3s;
            margin-top: 2px;
        }
        .product-options:hover { background: var(--c-accent); }
        .product-options svg { width: 14px; height: 14px; }
        
        .product-media {
            padding: 10px 36px 40px;
            flex: 1;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }
        .product-media img {
            width: 100%;
            height: auto;
            max-height: 280px;
            object-fit: contain;
            filter: grayscale(100%) opacity(0.5);
            transition: filter .7s var(--ease), transform .7s var(--ease);
        }
        .catalog-swiper .swiper-slide-active .product-media img {
            filter: grayscale(0%) opacity(1);
            transform: scale(1.04);
        }

        .slider-bottom { display: flex; align-items: center; gap: 30px; margin-top: 56px; }
        .catalog-pagination.swiper-pagination {
            position: static; display: flex; gap: 6px; width: auto !important;
        }
        .catalog-pagination .swiper-pagination-bullet {
            width: 10px; height: 10px; margin: 0 !important; border-radius: 999px;
            background: rgba(16, 22, 31, .2); opacity: 1;
            transition: width .5s var(--ease-out), background .4s var(--ease);
        }
        .catalog-pagination .swiper-pagination-bullet:hover { background: rgba(16, 22, 31, .45); }
        .catalog-pagination .swiper-pagination-bullet-active { width: 38px; background: var(--c-accent); }
        .slider-progress { flex: 1; height: 1px; background: var(--c-line); position: relative; overflow: hidden; }
        .slider-progress span {
            position: absolute; inset: 0; background: var(--c-ink); transform-origin: left; transform: scaleX(0);
            transition: transform .6s var(--ease-out);
        }
        .slider-count { font-family: var(--f-display); font-size: 13px; color: var(--c-muted); white-space: nowrap; }
        .slider-count b { color: var(--c-ink); font-weight: 400; }

        /* =========================================================
           CTA band
        ========================================================= */
        .cta-band {
            position: relative; overflow: hidden;
            margin: 0 var(--gutter) clamp(80px, 9vw, 130px);
            border-radius: calc(var(--radius) + 8px);
            padding: clamp(50px, 7vw, 100px) clamp(28px, 6vw, 90px);
            color: var(--c-ink);
            background:
                radial-gradient(600px 300px at 85% 20%, rgba(47, 211, 208, .22), transparent 70%),
                radial-gradient(500px 300px at 10% 110%, rgba(255, 90, 31, .14), transparent 70%),
                linear-gradient(135deg, #ffffff, #f4f8fb);
            border: 1px solid rgba(16, 22, 31, .06);
        }
        .cta-band::after {
            content: ""; position: absolute; inset: 0; pointer-events: none;
            background-image: linear-gradient(rgba(16,22,31,.05) 1px, transparent 1px), linear-gradient(90deg, rgba(16,22,31,.05) 1px, transparent 1px);
            background-size: 48px 48px;
            mask-image: radial-gradient(circle at 70% 40%, #000, transparent 75%);
        }
        .cta-band-inner { position: relative; z-index: 1; display: flex; align-items: center; justify-content: space-between; gap: 40px; flex-wrap: wrap; }
        .cta-band h2 { font-size: clamp(28px, 3.4vw, 48px); font-weight: 300; line-height: 1.15; max-width: 640px; }
        .cta-band h2 b { font-weight: 600; }

        /* =========================================================
           4. Footer
        ========================================================= */
        .site-footer { background: #ffffff; color: var(--c-ink-soft); position: relative; overflow: hidden; border-top: 1px solid var(--c-line); }
        .site-footer::before {
            content: ""; position: absolute; top: -200px; right: -200px; width: 600px; height: 600px; border-radius: 50%;
            background: radial-gradient(circle, rgba(47, 211, 208, .14), transparent 65%); pointer-events: none;
        }
        .footer-main {
            display: grid; grid-template-columns: 1.4fr 1fr 1.2fr 1.5fr; gap: clamp(36px, 5vw, 80px);
            padding: clamp(70px, 9vw, 120px) 0 clamp(50px, 6vw, 80px);
            position: relative;
        }
        .footer-col h3 {
            color: var(--c-ink); font-size: 13px; font-weight: 600; letter-spacing: .22em; text-transform: uppercase;
            margin-bottom: 28px;
        }
        .footer-about .logo { color: var(--c-ink); margin-bottom: 26px; }
        .footer-about p { font-size: 15px; line-height: 1.85; max-width: 340px; }
        .socials { display: flex; gap: 10px; margin-top: 30px; }
        .socials a {
            width: 42px; height: 42px; border-radius: 50%;
            display: grid; place-items: center; border: 1px solid var(--c-line); color: var(--c-ink-soft);
            transition: background .35s var(--ease), border-color .35s var(--ease), color .35s var(--ease), transform .35s var(--ease);
        }
        .socials a:hover { background: var(--c-accent); border-color: var(--c-accent); color: #fff; transform: translateY(-3px); }
        .socials svg { width: 16px; height: 16px; }

        .footer-links li + li { margin-top: 14px; }
        .footer-links a { font-size: 15px; position: relative; transition: color .3s var(--ease), padding .3s var(--ease); }
        .footer-links a:hover { color: var(--c-accent); padding-left: 10px; }
        .footer-links a::before {
            content: ""; position: absolute; left: 0; top: 50%; width: 4px; height: 4px; border-radius: 50%;
            background: var(--c-accent); transform: translateY(-50%) scale(0); transition: transform .3s var(--ease);
        }
        .footer-links a:hover::before { transform: translateY(-50%) scale(1); }

        .footer-contact li { display: flex; gap: 14px; font-size: 15px; line-height: 1.7; }
        .footer-contact li + li { margin-top: 18px; }
        .footer-contact svg { width: 18px; height: 18px; flex-shrink: 0; margin-top: 4px; color: var(--c-accent); }
        .footer-contact a:hover { color: var(--c-accent); }

        .newsletter p { font-size: 15px; line-height: 1.8; margin-bottom: 24px; }
        .newsletter-form {
            display: flex; align-items: center;
            border-bottom: 1px solid rgba(16, 22, 31, .18);
            transition: border-color .4s var(--ease);
        }
        .newsletter-form:focus-within { border-color: var(--c-accent); }
        .newsletter-form input {
            flex: 1; min-width: 0; background: transparent; border: 0; outline: 0;
            padding: 16px 0; color: var(--c-ink); font-size: 15px;
        }
        .newsletter-form input::placeholder { color: var(--c-muted); }
        .newsletter-form button {
            width: 46px; height: 46px; border-radius: 50%; flex-shrink: 0;
            display: grid; place-items: center; background: var(--c-accent); color: #fff;
            transition: transform .4s var(--ease-out), background .3s;
        }
        .newsletter-form button:hover { transform: rotate(-45deg); background: var(--c-accent-dark); }
        .newsletter-form button svg { width: 18px; height: 18px; }
        .newsletter-note { font-size: 12.5px; margin-top: 14px; color: var(--c-muted); min-height: 20px; }
        .newsletter-note.is-success { color: #0e9e9b; }

        .footer-bottom {
            border-top: 1px solid var(--c-line); background: var(--c-bg);
            padding: 28px 0; font-size: 13.5px; position: relative;
        }
        .footer-bottom .container { display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap; }
        .footer-bottom nav { display: flex; gap: 26px; }
        .footer-bottom a:hover { color: var(--c-accent); }

        .back-top {
            position: fixed; right: 24px; bottom: 24px; z-index: 90;
            width: 50px; height: 50px; border-radius: 50%;
            display: grid; place-items: center; background: #fff; color: var(--c-ink);
            border: 1px solid var(--c-line);
            box-shadow: 0 10px 30px -12px rgba(16, 40, 70, .25);
            opacity: 0; transform: translateY(20px); pointer-events: none;
            transition: opacity .4s var(--ease), transform .4s var(--ease), background .3s;
        }
        .back-top.is-visible { opacity: 1; transform: none; pointer-events: auto; }
        .back-top:hover { background: var(--c-accent); border-color: var(--c-accent); color: #fff; }
        .back-top svg { width: 18px; height: 18px; }

        /* =========================================================
           Responsive
        ========================================================= */
        @media (max-width: 1100px) {
            .overlay-body .container { grid-template-columns: 1fr 1fr; }
            .overlay-intro { grid-column: 1 / -1; align-self: start; order: 3; }
            .menu-nav { grid-column: 1 / -1; }
            .menu-aside { grid-column: 1 / -1; border-left: 0; padding-left: 0; border-top: 1px solid rgba(255, 90, 31, .45); padding-top: 34px; flex-direction: row; flex-wrap: wrap; gap: 34px 60px; }
            .footer-main { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 900px) {
            .intro-grid { grid-template-columns: 1fr; }
            .stats { grid-template-columns: repeat(2, 1fr); }
            .stat:nth-child(3) { padding-left: 0; border-left: 0; }
        }
        @media (max-width: 720px) {
            :root { --header-h: 72px; }
            .header-lang { display: none; }
            .menu-nav { grid-template-columns: 1fr; gap: 34px; }
            .menu-group h2 { margin-bottom: 16px; }
            .menu-group ul { display: flex; flex-wrap: wrap; gap: 10px 22px; }
            .menu-group li + li { margin-top: 0; }
            .catalog-head { flex-direction: column; align-items: flex-start; }
            .slider-btn { display: none; }
            .slider-progress, .slider-count { display: none; }
            .slider-bottom { justify-content: center; margin-top: 40px; }
            .overlay-menu { top: 8px; left: 8px; right: 8px; max-height: calc(100dvh - 16px); border-radius: 18px; }
            .btn-slide { padding: 16px 28px; }
            .footer-main { grid-template-columns: 1fr; }
            .footer-bottom .container { flex-direction: column; text-align: center; }
        }
        @media (max-width: 480px) {
            .stats { grid-template-columns: 1fr; }
            .stat, .stat + .stat { padding-left: 0; border-left: 0; padding-top: 26px; }
            .product-body { padding: 24px; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; }
            .reveal { opacity: 1; transform: none; }
        }
    </style>
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
            <span class="logo-mark">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M7 3c0 6 10 6 10 12M17 3c0 6-10 6-10 12M7 21c0-2 1-3 2.5-4M17 21c0-2-1-3-2.5-4M8.5 6h7M8.5 12h7"/></svg>
            </span>
            <span class="logo-text">
                <strong>GLOBAL MEDILINE</strong>
                <small>Indonesia</small>
            </span>
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
                <span class="logo-mark">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M7 3c0 6 10 6 10 12M17 3c0 6-10 6-10 12M7 21c0-2 1-3 2.5-4M17 21c0-2-1-3-2.5-4M8.5 6h7M8.5 12h7"/></svg>
                </span>
                <span class="logo-text"><strong>GLOBAL MEDILINE</strong><small>Indonesia</small></span>
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
        <div class="hero-bg" aria-hidden="true"></div>
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
                        @foreach ($products as $i => $product)
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
                    <span class="logo-mark">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M7 3c0 6 10 6 10 12M17 3c0 6-10 6-10 12M7 21c0-2 1-3 2.5-4M17 21c0-2-1-3-2.5-4M8.5 6h7M8.5 12h7"/></svg>
                    </span>
                    <span class="logo-text"><strong>GLOBAL MEDILINE</strong><small>Indonesia</small></span>
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
    const total = document.querySelectorAll('.catalog-swiper .swiper-slide').length;
    const progress = document.getElementById('catalogProgress');
    const current = document.getElementById('catalogCurrent');

    const updateMeta = (swiper) => {
        const idx = swiper.realIndex + 1;
        current.textContent = String(idx).padStart(2, '0');
        progress.style.transform = `scaleX(${idx / total})`;
    };

    new Swiper('.catalog-swiper', {
        slidesPerView: 1.2,
        centeredSlides: true,
        spaceBetween: 20,
        speed: 800,
        loop: true,
        grabCursor: true,
        keyboard: { enabled: true },
        navigation: { prevEl: '#catalogPrev', nextEl: '#catalogNext' },
        pagination: { el: '.catalog-pagination', clickable: true },
        breakpoints: {
            640:  { slidesPerView: 1.8, spaceBetween: 30 },
            900:  { slidesPerView: 2.5, spaceBetween: 40 },
            1200: { slidesPerView: 3, spaceBetween: 50 },
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
