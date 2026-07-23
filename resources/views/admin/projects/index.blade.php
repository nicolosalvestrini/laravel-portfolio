@extends('layouts.admin')

@section('title', 'Progetti')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">
            Progetti
        </h1>

        <p class="text-secondary mb-0">
            Gestisci i progetti del tuo portfolio.
        </p>
    </div>

    <div class="mt-3 mt-md-0">
        <a href="{{ route('admin.projects.create') }}" class="btn text-white fw-semibold px-4"
            style="background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));">
            + Nuovo progetto
        </a>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<section class="card content-card shadow-sm">
    <div class="card-body p-0">
        @if ($projects->isEmpty())
        <div class="p-5 text-center text-secondary">
            Nessun progetto presente al momento.
        </div>
        @else
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Progetto</th>
                        <th>Tipologia</th>
                        <th>Data completamento</th>
                        <th class="text-end pe-4">Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td class="ps-4">
                            <a href="{{ route('admin.projects.show', $project) }}"
                                class="fw-semibold text-decoration-none text-reset">
                                {{ $project->title }}
                            </a>
                        </td>

                        <td>
                            @if ($project->type)
                            <span class="badge bg-primary-subtle text-primary">
                                {{ $project->type->name }}
                            </span>
                            @else
                            <span class="text-secondary small">—</span>
                            @endif
                        </td>

                        <td class="text-secondary">
                            {{ $project->completed_at ? $project->completed_at->format('d/m/Y') : '—' }}
                        </td>

                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                    class="btn btn-sm btn-outline-secondary">
                                    Modifica
                                </a>

                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $project->id }}">
                                    Elimina
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Modal di eliminazione, uno per progetto, tenuti FUORI dalla tabella --}}
        @foreach ($projects as $project)
        <div class="modal fade" id="deleteModal{{ $project->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Conferma eliminazione</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                    </div>

                    <div class="modal-body">
                        Sei sicuro di voler eliminare il progetto <strong>{{ $project->title }}</strong>?
                        L'operazione non è reversibile.
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Annulla
                        </button>

                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
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

@if (! $projects->isEmpty())
<div class="mt-4">
    {{ $projects->links() }}
</div>
@endif

@endsection