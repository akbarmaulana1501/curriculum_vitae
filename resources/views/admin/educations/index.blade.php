@extends('layouts.admin')
@section('content')
<div class="bar">
    <div>
        <h1>Pendidikan</h1>
        <p class="muted">Kelola riwayat pendidikan Anda.</p>
    </div><a class="btn primary" href="{{ route('admin.educations.create') }}"><i class="bi bi-plus-circle" style="margin-right:8px"></i>Tambah pendidikan</a>
</div>
<div class="card list">@forelse($items as $item)<div class="row">
        <div><strong>{{ $item->institution }}</strong>
            <div class="muted">{{ $item->degree }} · {{ $item->study_program }} · {{ $item->start_date }} - {{ $item->end_date ?: 'Sekarang' }}</div>
        </div>
        <div class="actions"><a class="btn" href="{{ route('admin.educations.edit',$item) }}"><i class="bi bi-pencil" style="margin-right:8px"></i>Edit</a>
            <form method="post" action="{{ route('admin.educations.destroy',$item) }}" class="delete-form">@csrf @method('DELETE')<button class="btn danger"><i class="bi bi-trash" style="margin-right:8px"></i>Hapus</button></form>
        </div>
    </div>@empty<p class="muted" style="padding:20px">Belum ada data pendidikan.</p>@endforelse</div>
@endsection