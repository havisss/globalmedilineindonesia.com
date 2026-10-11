@extends('layouts.inner')

@section('title', 'TENTANG KAMI')
@section('subtitle', 'Mitra Strategis Kelengkapan Medis Nasional')
@section('parent', 'Perusahaan')
@section('no_hero', true)

@section('content')
<style>
/* Remove Inner Hero on About Us */
.inner-hero {
    display: none !important;
}

/* New About Page Layout - Matching Design */
.about-page-wrapper {
    padding-top: 20px;
    padding-bottom: 80px;
}

.about-page-title {
    font-family: var(--f-display);
    font-size: clamp(40px, 6vw, 42px);
    font-weight: 400;
    color: var(--c-navy);
    margin-bottom: 30px;
    text-transform: uppercase;
    letter-spacing: -0.02em;
}

.about-hero-image {
    width: 100%;
    height: clamp(300px, 40vw, 500px);
    border-radius: 16px;
    object-fit: cover;
    margin-bottom: 60px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.05);
}

.about-intro-section {
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
    margin-bottom: 80px;
    align-items: start;
}

@media (min-width: 900px) {
    .about-intro-section {
        grid-template-columns: 2fr 1fr;
        gap: 80px;
    }
}

.about-intro-left {
    font-size: clamp(24px, 3vw, 36px);
    line-height: 1.3;
    color: var(--c-navy);
    font-weight: 400;
    letter-spacing: -0.01em;
}

.about-intro-right {
    font-size: 16px;
    line-height: 1.8;
    color: var(--c-ink-soft);
    padding-top: 10px;
}

/* 3 Column Grid */
.about-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 60px;
    margin-bottom: 120px;
}

@media (min-width: 768px) {
    .about-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .about-grid {
        grid-template-columns: 1fr 1fr 1fr;
        gap: 40px;
    }
}

.grid-heading {
    font-size: 14px;
    font-weight: 500;
    color: var(--c-ink);
    text-transform: capitalize;
    margin-bottom: 30px;
    position: relative;
    display: inline-block;
}

.grid-heading::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -4px;
    width: 100%;
    height: 1px;
    background: var(--c-ink);
    opacity: 0.3;
}

.grid-large-text {
    font-size: clamp(20px, 2vw, 26px);
    line-height: 1.3;
    color: var(--c-navy);
    font-weight: 400;
    margin-bottom: 24px;
}

.grid-small-text {
    font-size: 14px;
    line-height: 1.8;
    color: var(--c-ink-soft);
    margin-bottom: 24px;
}

.about-grid-img {
    width: 100%;
    aspect-ratio: 4/3;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.about-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--c-ink);
    margin-top: 10px;
    transition: color 0.3s ease;
    border-bottom: 1px solid var(--c-ink);
    padding-bottom: 2px;
}

.about-link:hover {
    color: var(--c-accent);
    border-bottom-color: var(--c-accent);
}

.about-link svg {
    width: 14px;
    height: 14px;
    transition: transform 0.3s ease;
}

.about-link:hover svg {
    transform: translate(3px, -3px);
}

/* Bottom CTA */
.about-bottom-cta {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
    padding-top: 60px;
    border-top: 1px solid rgba(0,0,0,0.05);
}

.bottom-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--c-muted);
    margin-bottom: 30px;
}

.bottom-eyebrow svg {
    width: 14px;
    height: 14px;
    color: var(--c-accent);
}

.bottom-cta-text {
    font-size: clamp(24px, 3.5vw, 42px);
    line-height: 1.25;
    color: var(--c-navy);
    margin-bottom: 40px;
    font-weight: 400;
}
</style>

<div class="about-page-wrapper">
    <div class="reveal">
        <h1 class="about-page-title">ABOUT US</h1>
    </div>
    
    <div class="reveal" data-delay="1">
        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" alt="Laboratory landscape" class="about-hero-image">
    </div>

    <div class="about-intro-section reveal">
        <div class="about-intro-left">
            PT Global Mediline Indonesia telah berfokus pada penyediaan, distribusi, dan layanan purna jual untuk produk diagnostik in-vitro (IVD) dan instrumen medis.
        </div>
        <div class="about-intro-right">
            Integritas dan keakuratan adalah jaminan kualitas produk kami, komitmen standar pelayanan kami, serta martabat dan tanggung jawab perusahaan dalam mendukung masa depan kesehatan Indonesia.
        </div>
    </div>

    <div class="about-grid">
        <!-- Column 1 -->
        <div class="reveal" data-delay="1">
            <h3 class="grid-heading">Apa yang kami lakukan?</h3>
            <p class="grid-large-text">
                Kami menyediakan alat medis terstandarisasi untuk memperkuat operasional rumah sakit dan laboratorium.
            </p>
        </div>

        <!-- Column 2 -->
        <div class="reveal" data-delay="2">
            <h3 class="grid-heading">Lini Produk</h3>
            <p class="grid-small-text">
                Lini produk kami mencakup instrumen medis berteknologi mutakhir, mulai dari reagen hingga alat ekstraksi asam nukleat, dirancang untuk presisi dan keandalan di setiap uji lab.
            </p>
            <p class="grid-small-text">
                Untuk memudahkan operasional Anda, kami juga menyediakan layanan end-to-end, mencakup konsultasi kebutuhan, distribusi aman skala nasional, hingga perawatan berkala.
            </p>
            
            <div style="margin-top: 50px;">
                <h3 class="grid-heading">Standar Mutu</h3>
                <p class="grid-large-text">
                    Bagi kami, inklusivitas dan kualitas adalah inti dari apa yang kami lakukan.
                </p>
                <p class="grid-small-text">
                    Itulah mengapa kami selalu mengutamakan keamanan, presisi tinggi, dan kelayakan operasional mutlak alat pada setiap lini produk yang kami miliki.
                </p>
            </div>
        </div>

        <!-- Column 3 -->
        <div class="reveal" data-delay="3">
            <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Medical team" class="about-grid-img">
            
            <h3 class="grid-heading">Tim Kami</h3>
            <p class="grid-small-text">
                Teknisi kami bukan sekadar teknisi, mereka adalah tenaga profesional yang memprioritaskan akurasi dan efisiensi dalam setiap pelayanan.
            </p>
            <p class="grid-small-text">
                Selain keahlian teknis mereka, mereka juga dilatih untuk merespon cepat setiap kendala dan memastikan peralatan Anda selalu beroperasi optimal setiap saat.
            </p>
            
            <a href="{{ url('/services/portofolio-pelayanan') }}" class="about-link">
                LIHAT PORTOFOLIO 
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    <!-- Bottom CTA -->
    <div class="about-bottom-cta reveal">
        <div class="bottom-eyebrow">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            BERSAMA MEDILINE
        </div>
        <h2 class="bottom-cta-text">
            Kami mewujudkan kolaborasi harmonis untuk kemajuan diagnostik. Mulai perjalanan Anda bersama kami - hubungi sekarang!
        </h2>
        <a href="{{ url('/contact') }}" class="about-link">
            HUBUNGI KAMI 
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</div>
@endsection
