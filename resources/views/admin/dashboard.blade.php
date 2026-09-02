@extends('layouts.admin') @section('content')<h1>Halo, {{ auth()->user()->name }}.</h1>
<p class="muted">Semua pembaruan di sini langsung tampil pada portfolio publik.</p>
<div class="stats">
    <div class="card stat"><strong>{{ $experienceCount }}</strong><span>Pengalaman</span></div>
    <div class="card stat"><strong>{{ $projectCount }}</strong><span>Proyek</span></div>
    <div class="card stat"><strong>{{ $skillCount }}</strong><span>Keahlian</span></div>
</div>
<div class="card">
    <h2>Mulai dari profil</h2>
    <p class="muted">Lengkapi nama, bio, kontak, dan tautan sosial Anda supaya halaman depan terasa personal.</p><a class="btn primary" href="{{ route('admin.profile.edit') }}">Edit profil</a>
</div>@endsection