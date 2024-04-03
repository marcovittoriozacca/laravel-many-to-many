@extends('layouts.app')

@section('content')
    <div class="py-4">
        @if (count($technologies) == 0)
            <div class="text-center">
                <h1>Ancora nessuna tipologia da gestire</h1>
                <div class="container">
                    <a class="btn btn-danger btn-lg my-4 w-100" href="{{ route('technologies.create') }}">Aggiungi una tecnologia</a>
                </div>
            </div>
        @else
            <div class="container">
                <a class="btn btn-danger btn-lg my-4 w-100" href="{{ route('technologies.create') }}">Aggiungi una tecnologia</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize">id</th>
                            <th scope="col" class="text-capitalize">nome tecnologia</th>
                            <th scope="col" class="text-capitalize">slug</th>
                            <th scope="col" class="text-capitalize">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                <td>{{ $technology->id }}</td>
                                <td>
                                    <a class="text-danger" href="{{ route('technologies.show', $technology->slug) }}">
                                        {{ $technology->name }}
                                    </a>
                                </td>
                                <td>{{ $technology->slug }}</td>
                                
                                <td>
                                    <div class="d-flex column-gap-2">
                                        <a class="btn btn-warning" href="{{ route('technologies.edit', $technology->slug) }}">
                                            Modifica
                                        </a>

                                        <button type="button" id="modal-btn" class="btn btn-danger" data-bs-toggle="modal"
                                            data-slug="{{ $technology->slug }}" data-path="technologies"
                                            data-bs-target="#deleteModal">
                                            Elimina
                                        </button>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('partials.modal')
        @endif
    </div>
@endsection
