@extends('layouts.page')
@section('title', 'Landasan Perusahaan | Global Mediline Indonesia')
@section('page_title', 'LANDASAN PERUSAHAAN')
@section('page_subtitle', 'Visi & Misi PT. Global Mediline Indonesia')

@section('content')
<div class="page-section">
    <h2 class="section-title">Visi</h2>
    <p style="font-size: 1.25rem; color: var(--c-ink-soft); line-height: 1.8; max-width: 800px;">
        Menjadi perusahaan penyedia dan distributor alat kesehatan serta layanan teknis medis terdepan, terpercaya, dan berdaya saing tinggi di Indonesia.
    </p>
</div>

<div class="page-section">
    <h2 class="section-title">Misi Fokus Kami</h2>
    <div class="grid-3">
        <div class="feature-box">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><path d="M22 4L12 14.01l-3-3"/></svg>
            </div>
            <h3>Kualitas Unggul</h3>
            <p>Alat media modern bersertifikasi resmi jaminan keamanan pasien.</p>
        </div>
        <div class="feature-box">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 9l7 4 7-4M5 15l7 4 7-4M12 3L5 7v10l7 4 7-4V7l-7-4z"/></svg>
            </div>
            <h3>Keandalan Distribusi</h3>
            <p>Rantai pasok responsif dan efisien untuk seluruh Indonesia.</p>
        </div>
        <div class="feature-box">
            <div class="feature-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 9.36l-7.1 7.1a1 1 0 01-1.4 0l-2.8-2.8a1 1 0 010-1.4l7.1-7.1a6 6 0 019.36-7.94l-3.77 3.77z"/></svg>
            </div>
            <h3>Layanan Profesional</h3>
            <p>Pemeliharaan dan kalibrasi rutin oleh teknisi berpengalaman.</p>
        </div>
    </div>
</div>
@endsection
