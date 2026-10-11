@extends('layouts.inner')

@section('title', 'Landasan Perusahaan')
@section('subtitle', 'Visi, Misi & Komitmen Mutu PT Global Mediline Indonesia')
@section('parent', 'Perusahaan')
@section('custom_layout', true)

@push('styles')
<style>
/* =========================================================
   DIVI EDITORIAL ABOUT / LANDASAN PERUSAHAAN STYLES
   Exact replica of the Divi Editorial Layout from photo
   ========================================================= */

/* Transparent header for dark hero */
.site-header:not(.is-scrolled) {
    background: transparent !important;
    box-shadow: none !important;
    color: #ffffff;
}
.site-header:not(.is-scrolled) .logo img {
    filter: brightness(0) invert(1);
    opacity: 0.95;
    transition: filter 0.3s ease, opacity 0.3s ease;
}
.site-header:not(.is-scrolled) .header-lang {
    color: #ffffff;
}
.site-header:not(.is-scrolled) .header-lang a {
    color: #ffffff;
    opacity: 0.75;
}
.site-header:not(.is-scrolled) .header-lang a.is-active,
.site-header:not(.is-scrolled) .header-lang a:hover {
    opacity: 1;
}
.site-header:not(.is-scrolled) .hamburger {
    background: rgba(255, 255, 255, 0.12);
    border-color: rgba(255, 255, 255, 0.3);
    color: #ffffff;
}
.site-header:not(.is-scrolled) .hamburger-lines span {
    background-color: #ffffff;
}

/* Base Editorial Page Wrapper */
.editorial-page {
    background-color: #ffffff;
    color: #1a1a1a;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    overflow-x: hidden;
}

/* 1. HERO SECTION (Dark Atmospheric Editorial) */
.editorial-hero {
    position: relative;
    min-height: 500px;
    background: linear-gradient(180deg, rgba(17, 24, 39, 0.88) 0%, rgba(15, 23, 42, 0.94) 100%), 
                url('https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=2000&q=80') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding-top: calc(var(--header-h) + 60px);
    padding-bottom: 220px; /* Space for overlapping cards */
}

.editorial-hero-container {
    max-width: 820px;
    margin: 0 auto;
    padding: 0 24px;
    position: relative;
    z-index: 2;
}

.editorial-hero-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(40px, 5.2vw, 58px);
    font-weight: 400;
    color: #ffffff;
    margin-bottom: 20px;
    letter-spacing: -0.01em;
    line-height: 1.15;
}

.editorial-hero-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: clamp(15px, 1.8vw, 17px);
    line-height: 1.8;
    color: rgba(241, 245, 249, 0.85);
    max-width: 620px;
    margin: 0 auto;
    font-weight: 300;
}

/* 2. OVERLAPPING SECTION (Hero Seam Overlap) */
.editorial-overlap-section {
    position: relative;
    z-index: 10;
    margin-top: -160px; /* Divi signature negative margin */
    padding-bottom: 50px;
}

.editorial-container {
    max-width: 1140px;
    margin: 0 auto;
    padding: 0 clamp(20px, 4vw, 40px);
}

.editorial-first-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
    align-items: start;
}

@media (min-width: 992px) {
    .editorial-first-grid {
        grid-template-columns: 1.08fr 0.92fr;
        gap: 56px;
    }
}

/* Pure White Card (Divi Style) */
.editorial-card {
    background: #ffffff;
    border-radius: 4px;
    box-shadow: 0 20px 50px -10px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(0, 0, 0, 0.03);
    padding: clamp(36px, 4.5vw, 60px) clamp(28px, 4vw, 54px);
    position: relative;
}

.editorial-card-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 3vw, 36px);
    font-weight: 400;
    color: #111827;
    line-height: 1.25;
    margin-bottom: 24px;
    letter-spacing: -0.01em;
}

.editorial-paragraph {
    font-size: 15px;
    line-height: 1.85;
    color: #64748b;
    margin-bottom: 26px;
}

.editorial-paragraph:last-child {
    margin-bottom: 0;
}

/* Signature Bold Italic Statement (No quotation marks) */
.editorial-quote-callout {
    font-family: 'Playfair Display', Georgia, serif;
    font-style: italic;
    font-weight: 700;
    font-size: clamp(21px, 2.2vw, 25px);
    color: #0f172a;
    line-height: 1.45;
    margin: 30px 0;
    letter-spacing: -0.01em;
}

/* Image Column (Offset Lower) */
.editorial-photo-wrapper {
    position: relative;
}

@media (min-width: 992px) {
    .editorial-photo-wrapper {
        margin-top: 80px; /* Vertically offset lower than the left card */
    }
}

.editorial-photo-frame {
    background: #ffffff;
    padding: 12px;
    border-radius: 4px;
    box-shadow: 0 20px 50px -10px rgba(0, 0, 0, 0.09), 0 0 0 1px rgba(0, 0, 0, 0.04);
    overflow: hidden;
    transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease);
}

.editorial-photo-frame:hover {
    transform: translateY(-4px);
    box-shadow: 0 28px 60px -10px rgba(0, 0, 0, 0.12);
}

.editorial-photo-img {
    width: 100%;
    height: auto;
    aspect-ratio: 4/3;
    object-fit: cover;
    display: block;
    border-radius: 2px;
    filter: grayscale(100%) contrast(106%);
    transition: filter 0.6s var(--ease);
}

.editorial-photo-frame:hover .editorial-photo-img {
    filter: grayscale(20%) contrast(102%);
}

/* 3. SECOND SECTION (Faint Watermark & Offset Elevated Card) */
.editorial-second-section {
    background-color: #ffffff;
    padding: 30px 0 140px;
    position: relative;
}

.editorial-second-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 48px;
    align-items: start;
}

@media (min-width: 992px) {
    .editorial-second-grid {
        grid-template-columns: 0.95fr 1.05fr;
        gap: 64px;
        align-items: start;
    }

    .editorial-second-card {
        margin-top: 60px; /* Offset the right card lower than the top watermark */
    }
}

/* Left Stat & Faint Watermark Headline */
.editorial-stat-block {
    display: flex;
    flex-direction: column;
}

.editorial-faint-headline {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(50px, 6.2vw, 80px);
    font-weight: 700;
    line-height: 0.96;
    color: #dbe1ea;
    text-transform: uppercase;
    letter-spacing: -0.015em;
    margin-bottom: 16px;
    user-select: none;
}

.editorial-faint-headline span {
    display: block;
}

.editorial-stat-number {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(38px, 4.4vw, 52px);
    font-weight: 400;
    color: #111827;
    line-height: 1.2;
    letter-spacing: -0.02em;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .editorial-hero {
        padding-top: calc(var(--header-h) + 40px);
        padding-bottom: 120px;
        min-height: 420px;
    }
    .editorial-overlap-section {
        margin-top: -70px;
        padding-bottom: 40px;
    }
    .editorial-second-section {
        padding: 30px 0 80px;
    }
    .editorial-photo-wrapper {
        margin-top: 0;
    }
    .editorial-second-card {
        margin-top: 0;
    }
    .editorial-faint-headline {
        font-size: clamp(42px, 11vw, 56px);
    }
}
</style>
@endpush

@section('content')
<div class="editorial-page">

    {{-- =========================================================
         1. HERO SECTION (Dark Atmospheric Header)
         ========================================================= --}}
    <section class="editorial-hero" aria-labelledby="heroTitle">
        <div class="editorial-hero-container reveal">
            <h1 class="editorial-hero-title" id="heroTitle">Landasan Perusahaan</h1>
            <p class="editorial-hero-subtitle">
                Fondasi nilai, visi masa depan, dan komitmen PT Global Mediline Indonesia dalam menghadirkan standar diagnostik terdepan demi kesehatan nasional.
            </p>
        </div>
    </section>

    {{-- =========================================================
         2. OVERLAPPING SECTION (Asymmetric Card & Photo Layout)
         ========================================================= --}}
    <section class="editorial-overlap-section" aria-label="Visi dan Nilai Perusahaan">
        <div class="editorial-container">
            <div class="editorial-first-grid">
                
                {{-- Left Overlapping White Card --}}
                <div class="editorial-card reveal" data-delay="1">
                    <h2 class="editorial-card-title">PT Global Mediline Indonesia</h2>
                    
                    <p class="editorial-paragraph">
                        Menjadi perusahaan penyedia dan distributor alat kesehatan serta layanan teknis medis terdepan, terpercaya, dan berdaya saing tinggi di Indonesia melalui sinergi solusi diagnostik molekuler dan instrumen klinis berstandar internasional.
                    </p>

                    <div class="editorial-quote-callout">
                        Integritas dan presisi adalah nafas kami dalam memastikan setiap alat diagnostik bekerja akurat demi keselamatan pasien.
                    </div>

                    <p class="editorial-paragraph">
                        Kami percaya bahwa kemajuan sektor kesehatan berakar pada keandalan operasional di garis depan. Melalui produk tersertifikasi resmi, rantai distribusi yang terjaga ketat, serta dedikasi penuh tenaga spesialis, kami hadir sebagai mitra strategis yang dapat diandalkan oleh setiap rumah sakit, laboratorium rujukan, dan institusi riset di seluruh Nusantara.
                    </p>
                </div>

                {{-- Right Asymmetric Photo Frame (B&W Corporate / Team Collaboration) --}}
                <div class="editorial-photo-wrapper reveal" data-delay="2">
                    <div class="editorial-photo-frame">
                        <img 
                            src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80" 
                            alt="Tim Profesional PT Global Mediline Indonesia" 
                            class="editorial-photo-img"
                        >
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- =========================================================
         3. SECOND SECTION (Faint Watermark Headline & Right Card)
         ========================================================= --}}
    <section class="editorial-second-section" aria-label="Misi dan Komitmen Layanan">
        <div class="editorial-container">
            <div class="editorial-second-grid">
                
                {{-- Left Stat & Giant Faint Serif Typography --}}
                <div class="editorial-stat-block reveal">
                    <div class="editorial-faint-headline">
                        <span>FOKUS</span>
                        <span>MISI KAMI</span>
                    </div>
                    
                    <div class="editorial-stat-number">
                        100%
                    </div>
                </div>

                {{-- Right Overlapping Floating Card --}}
                <div class="editorial-card editorial-second-card reveal" data-delay="1">
                    <p class="editorial-paragraph">
                        Komitmen misi kami berakar pada tiga pilar utama: penyediaan instrumen medis modern bersertifikasi resmi, keandalan rantai pasok cold-chain yang menjangkau seluruh nusantara, serta tata kelola distribusi yang taat regulasi Kementerian Kesehatan.
                    </p>

                    <div class="editorial-quote-callout">
                        Rantai pasok yang tanggap dan pemeliharaan teknis tanpa celah adalah pondasi utama dalam menjaga kepercayaan praktisi kesehatan.
                    </div>

                    <p class="editorial-paragraph">
                        Didukung teknisi bersertifikasi dan ketersediaan suku cadang asli, kami memastikan pemeliharaan preventif dan kalibrasi berkala berjalan presisi, menjamin kesinambungan operasional fasilitas kesehatan Anda tanpa kompromi.
                    </p>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
