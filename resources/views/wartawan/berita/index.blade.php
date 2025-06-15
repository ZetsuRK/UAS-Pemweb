@extends('layouts.app') {{-- Pastikan layout kamu sudah support SB Admin 2 --}}

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Berita Saya</h1>

    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tulis Berita Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($berita as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->kategori->nama }}</td>
                    <td>
                        @if($item->status === 'draft')
                            <span class="badge badge-warning">Draft</span>
                        @elseif($item->status === 'approved')
                            <span class="badge badge-success">Disetujui</span>
                        @else
                            <span class="badge badge-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>
                    <td>
                        @if($item->status === 'draft')
                            <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        @else
                            <button class="btn btn-sm btn-secondary" disabled>Sudah Diajukan</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
