@extends('layouts.sbadmin2')

@section('title', 'Dashboard Editor')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Dashboard Editor</h1>
    <p>Halo, {{ Auth::user()->name }}! Anda login sebagai <strong>editor</strong>.</p>
@endsection
