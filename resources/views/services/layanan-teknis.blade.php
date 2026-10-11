@extends('layouts.inner')

@section('title', 'LAYANAN TEKNIS')
@section('subtitle', 'Jaminan Pemeliharaan & Kalibrasi Berkala')
@section('parent', 'Layanan')

@section('content')
<div class="feature-grid">
    <div class="feature-card reveal">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
        </div>
        <h3>Teknisi Bersertifikat</h3>
        <p>Alat media modern bersertifikasi resmi jaminan keamanan pasien.</p>
    </div>
    
    <div class="feature-card reveal" data-delay="1">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
        </div>
        <h3>Uji Kelayakan & Kalibrasi</h3>
        <p>Memastikan tingkat akurasi alat selalu sesuai standar regulasi kesehatan.</p>
    </div>
    
    <div class="feature-card reveal" data-delay="2">
        <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <h3>Pencegahan Kerusakan (Preventive)</h3>
        <p>Jadwal inspeksi rutin untuk menghindari kendala mendadak saat operasional.</p>
    </div>
</div>
@endsection
