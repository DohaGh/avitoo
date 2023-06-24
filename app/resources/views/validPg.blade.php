@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session()->has('bien'))
            <div class="alert alert-success">
                {{ session()->get('bien') }}
        @endif
        @if (session()->has('réussir'))
        <div class="alert alert-success">
            {{ session()->get('réussir') }}
    @endif
    </div>
@endsection
