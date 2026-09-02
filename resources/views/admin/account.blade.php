@extends('layouts.admin')
@section('content')
<h1>Akun login</h1>
<p class="muted">Ubah email dan password yang digunakan untuk masuk ke dashboard.</p>
<form method="post" action="{{ route('admin.account.update') }}" class="card">
    @csrf @method('PUT')
    <div class="grid">
        <div><label for="email">Email login</label><input id="email" type="email" name="email" required value="{{ old('email', auth()->user()->email) }}">@error('email')<small class="error">{{ $message }}</small>@enderror</div>
        <div><label for="current_password">Password saat ini</label><input id="current_password" type="password" name="current_password" required>@error('current_password')<small class="error">{{ $message }}</small>@enderror</div>
        <div><label for="password">Password baru <span class="muted">(opsional)</span></label><input id="password" type="password" name="password" minlength="8">@error('password')<small class="error">{{ $message }}</small>@enderror</div>
        <div><label for="password_confirmation">Konfirmasi password baru</label><input id="password_confirmation" type="password" name="password_confirmation" minlength="8"></div>
    </div>
    <button class="btn primary" style="margin-top:20px"><i class="bi bi-shield-lock" style="margin-right:8px"></i>Simpan perubahan</button>
</form>
@endsection
