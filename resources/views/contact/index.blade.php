@extends('layouts.inner')

@section('title', 'KONTAK')
@section('subtitle', 'Hubungi Kami Untuk Diskusi Kemitraan')
@section('parent', 'Hubungi Kami')

@section('content')
<div style="text-align: center; max-width: 800px; margin: 0 auto 60px;" class="reveal">
    <p style="font-size: 18px; color: var(--c-ink-soft); line-height: 1.8;">Siap mendukung kelengkapan & keandalan alat medis di fasilitas kesehatan anda.</p>
</div>

<div class="contact-wrapper">
    <div class="contact-info-card reveal">
        <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6A19.8 19.8 0 012.1 4.2 2 2 0 014.1 2h3a2 2 0 012 1.7c.1.9.4 1.8.7 2.7a2 2 0 01-.5 2.1L8 9.8a16 16 0 006 6l1.3-1.3a2 2 0 012.1-.4c.9.3 1.8.6 2.7.7a2 2 0 011.7 2z"/></svg>
        </div>
        <div>
            <h4>Telepon / WhatsApp</h4>
            <a href="tel:0828872379723">0828872379723</a>
        </div>
    </div>
    
    <div class="contact-info-card reveal" data-delay="1">
        <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </div>
        <div>
            <h4>Email Resmi</h4>
            <a href="mailto:info@globalmedilineindonesia.com">info@globalmedilineindonesia.com</a>
        </div>
    </div>
    
    <div class="contact-info-card reveal" data-delay="2">
        <div class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div>
            <h4>Alamat Kantor</h4>
            <p>Jln. Paku Sari No. 09, Sesetan, Denpasar Selatan, Kota Denpasar, Bali</p>
        </div>
    </div>
</div>
@endsection
