@extends('layouts.admin')

@section('title', $project->title)

@section('styles')
<style>
    .project-hero {
        width: 100%;
        max-height: 380px;
        object-fit: cover;
        border-radius: 18px;
    }

    .project-hero-placeholder {
        width: 100%;
        height: 260px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: white;
        background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));
    }
</style>
@endsection

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <a href="{{ route('admin.projects.index') }}" class="text-secondary text-decoration-none small">
            ← Torna ai progetti
        </a>

        <h1 class="h3 fw-bold text-dark mt-1 mb-0">
            {{ $project->title }}
        </h1>
    </div>

    <div class="mt-3 mt-md-0 d-flex gap-2">
        <a href="#" class="btn btn-outline-secondary fw-semibold px-4">
            Modifica
        </a>

        <form action="#" method="POST" onsubmit="return confirm('Eliminare questo progetto?');">
            <button type="submit" class="btn btn-outline-danger fw-semibold px-4">
                Elimina
            </button>
        </form>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-xl-8">
        <section class="card content-card shadow-sm mb-4">
            <div class="card-body p-4">
                @if ($project->cover_image)
                <img
                    src="{{ asset('storage/' . $project->cover_image) }}"
                    alt="{{ $project->title }}"
                    class="project-hero mb-4">
                @else
                <div class="project-hero-placeholder mb-4">
                    ▣
                </div>
                @endif

                <h2 class="h5 fw-bold mb-3">Descrizione</h2>

                <p class="text-secondary mb-0">
                    {{ $project->description }}
                </p>
            </div>
        </section>
    </div>

    <div class="col-12 col-xl-4">
        <section class="card content-card shadow-sm">
            <div class="card-body p-4">
                <h2 class="h5 fw-bold mb-4">Dettagli</h2>

                <div class="mb-3">
                    <small class="text-secondary d-block mb-1">Data completamento</small>
                    <span class="fw-semibold">
                        {{ $project->completed_at ? $project->completed_at->format('d/m/Y') : 'Non specificata' }}
                    </span>
                </div>

                <div class="mb-3">
                    <small class="text-secondary d-block mb-1">Repository GitHub</small>
                    @if ($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="fw-semibold">
                        {{ $project->github_url }}
                    </a>
                    @else
                    <span class="text-secondary">Non disponibile</span>
                    @endif
                </div>

                <div class="mb-0">
                    <small class="text-secondary d-block mb-1">Link progetto</small>
                    @if ($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank" rel="noopener" class="fw-semibold">
                        {{ $project->project_url }}
                    </a>
                    @else
                    <span class="text-secondary">Non disponibile</span>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>

@endsection