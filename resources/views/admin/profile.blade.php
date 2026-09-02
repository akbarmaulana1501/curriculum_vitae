@extends('layouts.admin')
@section('content')
<h1>Profil utama</h1>
<p class="muted">Informasi di bagian perkenalan dan kontak halaman depan.</p>
<form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="card">
    @csrf @method('PUT')
    <div class="grid">
        @foreach(['name'=>'Nama lengkap','headline'=>'Jabatan / headline','location'=>'Lokasi','email'=>'Email','phone'=>'Nomor telepon','linkedin'=>'URL LinkedIn','github'=>'URL GitHub'] as $field=>$label)
        <div><label>{{ $label }}</label><input name="{{ $field }}" value="{{ old($field,$profile->$field) }}">@error($field)<small class="error">{{ $message }}</small>@enderror</div>
        @endforeach
        <div><label for="photo">Upload foto profil</label><input id="photo" type="file" name="photo" accept="image/jpeg,image/png,image/webp">@error('photo')<small class="error">{{ $message }}</small>@enderror @if($profile->photo_url)<small class="muted">Foto saat ini sudah tersedia.</small>@endif</div>
        <div class="full"><label>Ringkasan profesional</label><textarea name="about">{{ old('about',$profile->about) }}</textarea></div>
        <div class="full"><label>Strengths / Soft skills</label><textarea name="strengths">{{ old('strengths',$profile->strengths) }}</textarea></div>
        <div class="full"><label>Pencapaian utama</label><textarea name="achievement">{{ old('achievement',$profile->achievement) }}</textarea></div>
    </div>
    <button class="btn primary" style="margin-top:20px"><i class="bi bi-save me-2" style="margin-right:8px" ></i>Simpan perubahan</button>
</form>
@endsection