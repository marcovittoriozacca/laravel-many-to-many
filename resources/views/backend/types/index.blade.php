@extends('layouts.app')

@section('content')
    <div class="py-4">
        @if (count($types) == 0)
            <div class="text-center">
                <h1>Ancora nessuna tipologia da gestire</h1>
                <div class="container">
                    <a class="btn btn-danger btn-lg my-4 w-100" href="{{ route('types.create') }}">Aggiungi una tipologia</a>
                </div>
            </div>
        @else
            <div class="container">
                <a class="btn btn-danger btn-lg my-4 w-100" href="{{ route('types.create') }}">Aggiungi una tipologia</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-capitalize">id</th>
                            <th scope="col" class="text-capitalize">nome tipologia</th>
                            <th scope="col" class="text-capitalize">slug</th>
                            <th scope="col" class="text-capitalize">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td>{{ $type->id }}</td>
                                <td>
                                    <a class="text-danger" href="{{ route('types.show', $type->slug) }}">
                                        {{ $type->name }}
                                    </a>
                                </td>
                                <td>{{ $type->slug }}</td>
                                
                                <td>
                                    <div class="d-flex column-gap-2">
                                        <a class="btn btn-warning" href="{{ route('types.edit', $type->slug) }}">
                                            Modifica
                                        </a>

                                        <button type="button" id="modal-btn" class="btn btn-danger" data-bs-toggle="modal"
                                            data-slug="{{ $type->slug }}" data-path="types"
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
