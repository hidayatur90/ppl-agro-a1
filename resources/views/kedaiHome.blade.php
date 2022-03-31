@extends('layouts.app')
@section('content')
@include('partials.navbar')
@include('partials.sidebarKedai')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body mt-4">
                    <h2>Dashboard Produksi</h2>
                    <h4>Coming soon...</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection