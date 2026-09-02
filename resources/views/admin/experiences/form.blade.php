@extends('layouts.admin') @section('content')<h1>{{ $item->exists?'Edit pengalaman':'Tambah pengalaman' }}</h1>
<form class="card" method="post" action="{{ $item->exists?route('admin.experiences.update',$item):route('admin.experiences.store') }}">@csrf @if($item->exists)@method('PUT')@endif<div class="grid">
        <div><label>Posisi</label><input required name="role" value="{{ old('role',$item->role) }}"></div>
        <div><label>Perusahaan</label><input required name="company" value="{{ old('company',$item->company) }}"></div>
        <div><label>Periode</label><input required name="period" placeholder="2022 — Sekarang" value="{{ old('period',$item->period) }}"></div>
        <div><label>Lokasi</label><input name="location" value="{{ old('location',$item->location) }}"></div>
        <div><label>Urutan</label><input type="number" min="0" name="sort_order" value="{{ old('sort_order',$item->sort_order ?? 0) }}"></div>
        <div class="full"><label>Deskripsi</label><textarea name="description">{{ old('description',$item->description) }}</textarea></div>
    </div><button class="btn primary" style="margin-top:20px"><i class="bi bi-save" style="margin-right:8px"></i>Simpan</button></form>@endsection