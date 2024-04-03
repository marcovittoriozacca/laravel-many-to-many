@extends('layouts.app')

@section('content')
    <div class="container py-4">
        
        <form action="{{ route('types.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome dela tipologia <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    required maxlength="150" value="{{ old('name') }}" />
                @error('name')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection
