@extends('layouts.admin') @section('content')<h1>{{ $item->exists?'Edit proyek':'Tambah proyek' }}</h1>
<form class="card" method="post" enctype="multipart/form-data" action="{{ $item->exists?route('admin.projects.update',$item):route('admin.projects.store') }}">@csrf @if($item->exists)@method('PUT')@endif<div class="grid">
        <div><label>Judul</label><input required name="title" value="{{ old('title',$item->title) }}"></div>
        <div><label>Kategori</label><input name="category" value="{{ old('category',$item->category) }}"></div>
        <div><label>Teknologi</label><input name="technologies" placeholder="Figma, Laravel, Vue" value="{{ old('technologies',$item->technologies) }}"></div>
        <div><label>URL proyek</label><input type="url" name="url" value="{{ old('url',$item->url) }}"></div>
        <div><label>Gambar proyek</label><input type="file" name="image" accept="image/jpeg,image/png,image/webp">@if($item->image_url)<small class="muted">Gambar saat ini dipertahankan jika tidak memilih file baru.</small>@endif</div>
        <div><label>Urutan</label><input type="number" min="0" name="sort_order" value="{{ old('sort_order',$item->sort_order ?? 0) }}"></div>
        <div class="full"><label>Deskripsi</label><textarea name="description">{{ old('description',$item->description) }}</textarea></div>
    </div><button class="btn primary" style="margin-top:20px"><i class="bi bi-save" style="margin-right:8px"></i>Simpan</button></form>@endsection