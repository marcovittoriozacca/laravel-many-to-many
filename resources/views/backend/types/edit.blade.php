@extends('layouts.app')

@section('content')
    <div class="container py-4">
        
        <form action="{{ route('types.update', $type->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome dela tipologia <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    required value="{{ old('name', $type->name) }}" />
                @error('name')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
@endsection
