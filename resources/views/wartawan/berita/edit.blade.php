@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Berita</h1>

    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Judul Berita</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ $berita->kategori_id == $kat->id ? 'selected' : '' }}>{{ $kat->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Isi Berita</label>
            <textarea name="isi" rows="5" class="form-control" required>{{ $berita->isi }}</textarea>
        </div>

        <div class="form-group">
            <label>Gambar Lama</label><br>
            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" width="150">
            @else
                <p><i>Tidak ada gambar</i></p>
            @endif
        </div>

        <div class="form-group">
            <label>Ganti Gambar</label>
            <input type="file" name="gambar" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
