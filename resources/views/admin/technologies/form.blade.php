@csrf

@if(isset($technology))
    @method('PUT')
@endif

<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Nome tecnologia</label>
    <input
        type="text"
        name="name"
        id="name"
        value="{{ $technology->name ?? '' }}"
        class="form-control">
</div>

<div class="mt-4 d-flex gap-2">
    <button type="submit" class="btn text-white fw-semibold px-4"
        style="background: linear-gradient(135deg, var(--admin-primary), var(--admin-secondary));">
        {{ isset($technology) ? 'Salva modifiche' : 'Crea tecnologia' }}
    </button>

    <a href="{{ route('admin.technologies.index') }}" class="btn btn-outline-secondary fw-semibold px-4">
        Annulla
    </a>
</div>