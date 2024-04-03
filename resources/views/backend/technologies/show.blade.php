@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title mb-3">{{ $technology->name }}</h1>
                        <p class="card-title">Slug: <strong>{{ $technology->slug }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection