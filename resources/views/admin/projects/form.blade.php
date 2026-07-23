@csrf

@if(isset($project))
@method('PUT')
@endif

<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Titolo</label>
    <input
        type="text"
        name="title"
        id="title"
        value="{{ $project->title ?? '' }}"
        class="form-control">
</div>

<div class="mb-3">
    <label for="description" class="form-label fw-semibold">Descrizione</label>
    <textarea
        name="description"
        id="description"
        rows="5"
        class="form-control">{{ $project->description ?? '' }}</textarea>
</div>

<div class="mb-3">
    <label for="type_id" class="form-label fw-semibold">Tipologia</label>
    <select name="type_id" id="type_id" class="form-select">
        <option value="">Seleziona una tipologia</option>
        @foreach ($types as $type)
        <option value="{{ $type->id }}" {{ (isset($project) && $project->type_id == $type->id) ? 'selected' : '' }}>
            {{ $type->name }}
        </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold d-block">Tecnologie</label>

    <div class="row">
        @foreach ($technologies as $technology)
        <div class="col-6 col-md-4">
            <div class="form-check">
                <input
                    type="checkbox"
                    name="technology_ids[]"
                    value="{{ $technology->id }}"
                    id="technology_{{ $technology->id }}"
                    class="form-check-input"
                    {{ (isset($project) && $project->technologies->contains($technology->id)) ? 'checked' : '' }}>

                <label class="form-check-label" for="technology_{{ $technology->id }}">
                    {{ $technology->name }}
                </label>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="row g-3">
    <div class="col-12 col-md-6">
        <label for="github_url" class="form-label fw-semibold">URL GitHub</label>
        <input
            type="url"
            name="github_url"
            id="github_url"
            value="{{ $project->github_url ?? '' }}"
            class="form-control"
            placeholder="https://github.com/...">
    </div>

    <div class="col-12 col-md-6">
        <label for="project_url" class="form-label fw-semibold">URL Progetto</label>
        <input
            type="url"
            name="project_url"
            id="project_url"
            value="{{ $project->project_url ?? '' }}"
            class="form-control"
            placeholder="https://...">
    </div>
</div>

<div class="mb-3 mt-3">
    <label for="completed_at" class="form-label fw-semibold">Data completamento</label>
    <input
        type="date"
        name="completed_at"
        id="completed_at"
        value="{{ isset($project) && $project->completed_at ? $project->completed_at->format('Y-m-d') : '' }}"
        class="form-control">
</div>

<div class="mt-4 d-flex gap-2">
    <button type="submit" class="btn text-white fw-semibold px-4"
        style="background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));">
        {{ isset($project) ? 'Salva modifiche' : 'Crea progetto' }}
    </button>

    <a href="{{ isset($project) ? route('admin.projects.show', $project) : route('admin.projects.index') }}"
        class="btn btn-outline-secondary fw-semibold px-4">
        Annulla
    </a>
</div>