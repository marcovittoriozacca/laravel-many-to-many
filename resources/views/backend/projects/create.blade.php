@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome del progetto <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error ('name') is-invalid @enderror" name="name" id="name"
                maxlength="150"
                required
                value="{{ old('name') }}"/>
                @error ('name')
                <div>
                    <p class="text-danger">{{ $message }}</p>
                </div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione del progetto <span class="text-danger">*</span></label>
                <textarea class="form-control @error ('description') is-invalid @enderror" name="description" id="description" rows="3" required>{{ old('description') }}</textarea>
                @error ('description')
                <div>
                    <p class="text-danger">{{ $message }}</p>
                </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipologia</label>
                <select
                    class="form-select @error ('type_id') is-invalid @enderror"
                    name="type_id"
                    id="type_id"
                >
                    <option selected value="">Seleziona una tipologia</option>
                    @foreach ($types as $type)    
                    <option 
                        value="{{ $type->id }}"
                        {{ $type->id == old('type_id') ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                    @endforeach
                    
                </select>
                @error ('type_id')
                <div>
                    <p class="text-danger">{{ $message }}</p>
                </div>
               @enderror 
            </div>
            
    
            <div class="mb-3">
                <label for="link" class="form-label">Link al progetto</label>
                <input type="text" class="form-control @error ('link') is-invalid @enderror" name="link" id="link" value="{{ old('link') }}"/>
                @error ('link')
                <div>
                    <p class="text-danger">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="proj_thumb" class="form-label">Immagine del progetto</label>
                <input type="file" class="form-control @error ('proj_thumb') is-invalid @enderror" name="proj_thumb" id="proj_thumb"
                    accept=".jpeg, .jpg, .png, .svg, .webp, .bmp, .tif, .tiff"
                    maxlength="1000"
                >
            </div>
            @error ('proj_thumb') 
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>
    </div>
@endsection
