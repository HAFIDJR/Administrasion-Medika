@extends('layouts.app')
@section('content')
    @php
        $role = Auth::user()->role;
    @endphp

@endsection
