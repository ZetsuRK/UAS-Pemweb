@extends('layouts.sbadmin2')

@section('title', 'Tulis Berita')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Halaman Wartawan - Tulis Berita</h1>
    <p>Halo, {{ Auth::user()->name }}! Anda login sebagai <strong>wartawan</strong>.</p>
@endsection