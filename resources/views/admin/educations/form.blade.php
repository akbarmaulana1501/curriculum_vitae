@extends('layouts.admin')
@section('content')
<div class="bar">
    <div>
        <h1>{{ $item->exists ? 'Edit pendidikan' : 'Tambah pendidikan' }}</h1>
        <p class="muted">Lengkapi riwayat pendidikan Anda.</p>
    </div><a class="btn" href="{{ route('admin.educations.index') }}">← Kembali</a>
</div>
<form class="card" method="post" action="{{ $item->exists ? route('admin.educations.update',$item) : route('admin.educations.store') }}">@csrf @if($item->exists)@method('PUT')@endif
    <div class="grid">
        <div><label>Nama Institusi</label><input required name="institution" placeholder="Politeknik Caltex Riau" value="{{ old('institution',$item->institution) }}">@error('institution')<small class="error">{{ $message }}</small>@enderror</div>
        <div><label>Gelar / Jenjang</label><input required name="degree" placeholder="Bachelor's Degree" value="{{ old('degree',$item->degree) }}"></div>
        <div><label>Program Studi</label><input required name="study_program" placeholder="Information Technology" value="{{ old('study_program',$item->study_program) }}"></div>
        <div><label>Lokasi</label><input name="location" placeholder="Pekanbaru, Indonesia" value="{{ old('location',$item->location) }}"></div>
        <div><label>Tanggal Mulai</label><input required name="start_date" placeholder="October 2021" value="{{ old('start_date',$item->start_date) }}"></div>
        <div><label>Tanggal Selesai</label><input name="end_date" placeholder="October 2025" value="{{ old('end_date',$item->end_date) }}"></div>
        <div><label>Urutan</label><input type="number" min="0" name="sort_order" value="{{ old('sort_order',$item->sort_order ?? 0) }}"></div>
        <div class="full"><label>Deskripsi <span class="muted">(opsional)</span></label><textarea name="description" placeholder="Ceritakan pencapaian atau fokus studi Anda.">{{ old('description',$item->description) }}</textarea></div>
    </div><button class="btn primary" style="margin-top:20px"><i class="bi bi-save" style="margin-right:8px"></i>Simpan</button>
</form>
@endsection