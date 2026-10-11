@extends('layouts.inner')

@section('title', 'PORTOFOLIO PELAYANAN')
@section('subtitle', '4 Pilar Layanan Utama Perusahaan')
@section('parent', 'Layanan')

@section('content')
<div class="feature-grid">
    <div class="feature-card reveal">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
        </div>
        <h3>Penyediaan & Pengadaan</h3>
        <p>Suplai instrumen dan perangkat medis standar rumah sakit dan lab secara komprehensif.</p>
    </div>
    
    <div class="feature-card reveal" data-delay="1">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
        </div>
        <h3>Distribusi Nasional</h3>
        <p>Pengiriman teratur dengan standar penanganan ketat untuk menjaga keamanan perangkat.</p>
    </div>
    
    <div class="feature-card reveal" data-delay="2">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/></svg>
        </div>
        <h3>Perawatan & Service</h3>
        <p>Pemeliharaan rutin dan perbaikan teknis untuk memperpanjang usia pakai alat.</p>
    </div>
</div>
@endsection
