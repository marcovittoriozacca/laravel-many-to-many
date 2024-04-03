@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <h1 class="py-5">Link a tutti i Database collegati al sito</h1>
        <div class="mb-3">
            <a class="btn btn-danger p-3" href="{{ route('projects.index') }}">Progetti</a>
        </div>
        <div class="mb-3">
            <a class="btn btn-danger p-3" href="{{ route('types.index') }}">Tipologie</a>
        </div>
        
    </div>
</div>
@endsection
