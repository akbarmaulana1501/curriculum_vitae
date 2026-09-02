@extends('layouts.admin') @section('content')<div class="bar">
    <div>
        <h1>Pengalaman</h1>
        <p class="muted">Urutkan dengan angka kecil terlebih dahulu.</p>
    </div><a class="btn primary" href="{{ route('admin.experiences.create') }}"><i class="bi bi-plus-circle" style="margin-right:8px"></i>Tambah</a>
</div>
<div class="card list">@forelse($items as $item)<div class="row">
        <div><strong>{{ $item->role }}</strong>
            <div class="muted">{{ $item->company }} · {{ $item->period }}</div>
        </div>
        <div class="actions"><a class="btn" href="{{ route('admin.experiences.edit',$item) }}"><i class="bi bi-pencil" style="margin-right:8px"></i>Edit</a>
            <form method="post" action="{{ route('admin.experiences.destroy',$item) }}" class="delete-form">@csrf @method('DELETE')<button class="btn danger"><i class="bi bi-trash" style="margin-right:8px"></i>Hapus</button></form>
        </div>
    </div>@empty<p class="muted">Belum ada pengalaman.</p>@endforelse</div>@endsection
