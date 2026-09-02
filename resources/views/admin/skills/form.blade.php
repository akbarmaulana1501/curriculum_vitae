@extends('layouts.admin') @section('content')<h1>{{ $item->exists?'Edit keahlian':'Tambah keahlian' }}</h1>
<form class="card" method="post" action="{{ $item->exists?route('admin.skills.update',$item):route('admin.skills.store') }}">@csrf @if($item->exists)@method('PUT')@endif<div class="grid">
        <div><label>Keahlian</label><input required name="name" value="{{ old('name',$item->name) }}"></div>
        <div><label>Kategori</label><input name="category" value="{{ old('category',$item->category) }}"></div>
        <div><label>Level (1–100)</label><input type="number" min="1" max="100" name="level" value="{{ old('level',$item->level) }}"></div>
        <div><label>Urutan</label><input type="number" min="0" name="sort_order" value="{{ old('sort_order',$item->sort_order ?? 0) }}"></div>
    </div><button class="btn primary" style="margin-top:20px"><i class="bi bi-save" style="margin-right:8px"></i>Simpan</button></form>@endsection