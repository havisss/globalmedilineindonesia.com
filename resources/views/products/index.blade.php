@extends('layouts.inner')

@section('title', 'KATALOG PRODUK')
@section('subtitle', 'Instrumen & Reagen Diagnostik Medis Presisi Tinggi')
@section('parent', 'Produk')

@section('content')
<style>
.catalog-page-intro {
    text-align: center;
    max-width: 820px;
    margin: 0 auto 50px;
}

.catalog-page-intro p {
    font-size: 17px;
    color: var(--c-ink-soft);
    line-height: 1.8;
}

.catalog-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 32px;
    margin-bottom: 70px;
}

.catalog-card {
    background: #ffffff;
    border-radius: 20px;
    border: 1px solid rgba(16, 22, 31, 0.08);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.4s var(--ease), box-shadow 0.4s var(--ease), border-color 0.4s var(--ease);
    box-shadow: 0 4px 20px rgba(16, 22, 31, 0.03);
}

.catalog-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 45px -10px rgba(16, 22, 31, 0.12);
    border-color: rgba(109, 192, 35, 0.4);
}

.catalog-card-media {
    background: #f8fafc;
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px;
    position: relative;
    border-bottom: 1px solid rgba(16, 22, 31, 0.05);
}

.catalog-card-media img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.5s var(--ease);
}

.catalog-card:hover .catalog-card-media img {
    transform: scale(1.05);
}

.catalog-card-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.catalog-card-title {
    font-size: 19px;
    font-weight: 700;
    color: var(--c-navy);
    line-height: 1.35;
    margin-bottom: 10px;
}

.catalog-card-desc {
    font-size: 14.5px;
    color: var(--c-ink-soft);
    line-height: 1.6;
    margin-bottom: 24px;
    flex: 1;
}

.catalog-card-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background: var(--c-navy-2);
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    padding: 12px 20px;
    border-radius: 999px;
    text-decoration: none;
    transition: background 0.3s var(--ease), transform 0.2s var(--ease);
}

.catalog-card-action:hover {
    background: var(--c-accent-dark);
    color: #ffffff;
    transform: translateY(-1px);
}

.catalog-card-action svg {
    width: 16px;
    height: 16px;
    transition: transform 0.3s;
}

.catalog-card-action:hover svg {
    transform: translateX(3px);
}

.catalog-cta-box {
    background: linear-gradient(135deg, #07111d 0%, #0c1a2a 100%);
    border-radius: 24px;
    padding: clamp(36px, 5vw, 60px);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
    flex-wrap: wrap;
    margin-bottom: 40px;
}

.catalog-cta-box h3 {
    font-size: clamp(22px, 3vw, 32px);
    font-weight: 600;
    line-height: 1.25;
    max-width: 620px;
}

.catalog-cta-box p {
    color: #94a3b8;
    font-size: 15px;
    margin-top: 8px;
    max-width: 580px;
}

.catalog-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--c-accent);
    color: #ffffff;
    font-weight: 600;
    font-size: 15px;
    padding: 14px 28px;
    border-radius: 999px;
    text-decoration: none;
    transition: background 0.3s, transform 0.3s;
}

.catalog-cta-btn:hover {
    background: #5aa41c;
    color: #ffffff;
    transform: translateY(-2px);
}

@media (max-width: 640px) {
    .catalog-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="catalog-page-intro reveal">
    <p>Kami menyediakan instrumen laboratorium otomatis dan reagen in-vitro berkualitas tinggi berstandar internasional untuk mendukung efisiensi diagnostik dan keakuratan hasil uji laboratorium medis Anda.</p>
</div>

<div class="catalog-grid">
    @forelse($products as $product)
        <article class="catalog-card reveal">
            <div class="catalog-card-media">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy">
            </div>
            <div class="catalog-card-body">
                <h3 class="catalog-card-title">{{ $product->name }}</h3>
                <p class="catalog-card-desc">
                    {{ $product->description ?: 'Instrumen dan reagen laboratorium diagnostik medis presisi tinggi dari PT Global Mediline Indonesia.' }}
                </p>
                <a href="https://wa.me/62828872379723?text={{ urlencode('Halo PT Global Mediline Indonesia, saya ingin menanyakan informasi & spesifikasi untuk produk: ' . $product->name) }}" target="_blank" rel="noopener noreferrer" class="catalog-card-action">
                    <span>Konsultasi Produk</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </article>
    @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; color: var(--c-ink-soft);">
            <p style="font-size: 18px;">Katalog produk sedang dalam pembaruan.</p>
        </div>
    @endforelse
</div>

<div class="catalog-cta-box reveal">
    <div>
        <h3>Memerlukan Spesifikasi Teknis Khusus atau Demo Alat?</h3>
        <p>Tim spesialis diagnostik kami siap memberikan konsultasi kelengkapan instrumen laboratorium dan penawaran kemitraan institusi kesehatan Anda.</p>
    </div>
    <a href="{{ url('/contact') }}" class="catalog-cta-btn">
        <span>Hubungi Tim Kami</span>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a>
</div>
@endsection
