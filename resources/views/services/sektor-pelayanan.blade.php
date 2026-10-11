@extends('layouts.inner')

@section('title', 'SEKTOR PELAYANAN')
@section('subtitle', 'Fasilitas Kesehatan Yang Kami Layani')
@section('parent', 'Layanan')

@section('content')
<div class="feature-grid">
    <div class="feature-card reveal">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
        <h3>Rumah Sakit</h3>
        <p>Peralatan ruang operasi, ICU/NICU/PICU, IGD, serta unit rawat inap.</p>
    </div>
    
    <div class="feature-card reveal" data-delay="1">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        </div>
        <h3>Klinik Spesialis & Umum</h3>
        <p>Perlengkapan diagnostik dasar hingga peralatan tindakan spesialis.</p>
    </div>
    
    <div class="feature-card reveal" data-delay="2">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
        </div>
        <h3>Laboratorium Medis</h3>
        <p>Instrument analisis darah, reagen, dan perangkat tes berpresisi tinggi.</p>
    </div>
</div>
@endsection
