@extends('layouts.admin')

@section('title', 'Progetti')

@section('styles')
<style>
    .project-card {
        border: 0;
        border-radius: 18px;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 30px rgba(17, 24, 39, 0.1);
    }

    .project-cover {
        width: 100%;
        height: 180px;
        object-fit: cover;
        background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));
    }

    .project-cover-placeholder {
        width: 100%;
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: white;
        background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));
    }
</style>
@endsection

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
        <a href="#" class="btn text-white fw-semibold px-4"
            style="background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));">
            + Nuovo progetto
        </a>
    </div>
</div>

@if ($projects->isEmpty())
<section class="card content-card shadow-sm">
    <div class="card-body p-5 text-center text-secondary">
        Nessun progetto presente al momento.
    </div>
</section>
@else
<div class="row g-4">
    @foreach ($projects as $project)
    <div class="col-12 col-sm-6 col-xl-4">
        <a href="{{ route('admin.projects.show', $project) }}"
            class="text-decoration-none text-reset">
            <div class="card project-card shadow-sm h-100">
                @if ($project->cover_image)
                <img
                    src="{{ asset('storage/' . $project->cover_image) }}"
                    alt="{{ $project->title }}"
                    class="project-cover">
                @else
                <div class="project-cover-placeholder">
                    ▣
                </div>
                @endif

                <div class="card-body p-4">
                    <h3 class="h5 fw-bold mb-2">
                        {{ $project->title }}
                    </h3>

                    <p class="text-secondary small mb-3">
                        {{ Str::limit($project->description, 90) }}
                    </p>

                    @if ($project->completed_at)
                    <span class="badge bg-primary-subtle text-primary">
                        {{ $project->completed_at->format('d/m/Y') }}
                    </span>
                    @endif
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $projects->links() }}
</div>
@endif

@endsection