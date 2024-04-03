@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <form action="{{ route('projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome del progetto <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    maxlength="150" required value="{{ old('name', $project->name) }}" />
                @error('name')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione del progetto <span
                        class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="3" required>{{ old('description', $project->description) }}</textarea>
                @error('description')
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
                    <option value="">Seleziona una tipologia</option>
                    @foreach ($types as $type)    
                    <option 
                        value="{{ $type->id }}"
                        {{ $type->id  == old('type_id', $project->type ? $project->type->id : '') ? 'selected' : ''}}
                        >
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
                <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link"
                    value="{{ old('link', $project->link) }}" />
                @error('link')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="@if ($project->proj_thumb) col-9 @else col-12 @endif">
                    <div class="mb-3">
                        <label for="proj_thumb" class="form-label">Cambia immagine del progetto</label>
                        <input type="file" class="form-control @error('proj_thumb') is-invalid @enderror"
                            name="proj_thumb" id="proj_thumb"
                            accept=".jpeg, .jpg, .png, .svg, .webp, .bmp, .tif, .tiff"
                            maxlength="1000"
                        >
                    </div>
                    @error('proj_thumb')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Modifica</button>

                        @if ($project->proj_thumb)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="thumb_remove" name="thumb_remove" />
                                <label class="form-check-label text-danger text-decoration-underline" for="thumb_remove">Rimuovi immagine</label>
                            </div>
                        @endif
                    </div>

                </div>
                @if ($project->proj_thumb)
                    <div class="col-3">
                        <div class="mb-3 text-end">
                            <h2>Immagine attuale:</h2>
                            @if ($project->proj_thumb)
                            <img class="card-img-top p-4" data-slug-img="{{ $project->proj_thumb }}" id="project_main_thumb" src="" alt="{{ $project->name }}">
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection
