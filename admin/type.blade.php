{{-- Type view is handled by statistik.blade.php via tabs --}}
{{-- This file exists as a fallback --}}
@extends('cms::backend.layout.app', ['title' => 'Statistik'])
@section('content')
<script>window.location.href = '{{ route("admin.statistik") }}';</script>
@endsection
