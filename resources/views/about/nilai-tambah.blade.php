@extends('layouts.inner')

@section('title', 'NILAI TAMBAH')
@section('subtitle', 'Keunggulan PT Global Mediline Indonesia')
@section('parent', 'Perusahaan')

@section('content')
<div class="feature-grid">
    <div class="feature-card reveal">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3>Legalitas & Kepatuhan Standar</h3>
        <p>Seluruh produk & layanan memenuhi regulasi izin edar resmi Kemenkes RI.</p>
    </div>
    
    <div class="feature-card reveal" data-delay="1">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <h3>Dukungan Teknis Siaga</h3>
        <p>Layanan purna jual & tim tanggap teknis cepat untuk konsultasi dan kendala.</p>
    </div>
    
    <div class="feature-card reveal" data-delay="2">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
        </div>
        <h3>Kualitas Produk Terjamin</h3>
        <p>Bekerjasama dengan manufaktur alat medis terkemuka dunia.</p>
    </div>

    <div class="feature-card reveal" data-delay="3">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </div>
        <h3>Kemitraan Jangka Panjang</h3>
        <p>Skema Kerjasama transparan dan saling menguntungkan bagi instansi Anda.</p>
    </div>
</div>
@endsection
