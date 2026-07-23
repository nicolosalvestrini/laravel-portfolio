@extends('layouts.admin')

@section('title', 'Tecnologie')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">
            Tecnologie
        </h1>

        <p class="text-secondary mb-0">
            Gestisci le tecnologie usate nei progetti.
        </p>
    </div>

    <div class="mt-3 mt-md-0">
        <a href="{{ route('admin.technologies.create') }}" class="btn text-white fw-semibold px-4"
            style="background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));">
            + Nuova tecnologia
        </a>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<section class="card content-card shadow-sm">
    <div class="card-body p-0">
        @if ($technologies->isEmpty())
        <div class="p-5 text-center text-secondary">
            Nessuna tecnologia presente al momento.
        </div>
        @else
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Nome</th>
                        <th class="text-end pe-4">Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($technologies as $technology)
                    <tr>
                        <td class="ps-4 fw-semibold">
                            {{ $technology->name }}
                        </td>

                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.technologies.edit', $technology) }}"
                                    class="btn btn-sm btn-outline-secondary">
                                    Modifica
                                </a>

                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $technology->id }}">
                                    Elimina
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @foreach ($technologies as $technology)
        <div class="modal fade" id="deleteModal{{ $technology->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Conferma eliminazione</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>

                    <div class="modal-body">
                        Sei sicuro di voler eliminare la tecnologia <strong>{{ $technology->name }}</strong>?
                        Verrà rimossa anche da tutti i progetti a cui è associata.
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Annulla
                        </button>

                        <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Elimina definitivamente
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>

@endsection