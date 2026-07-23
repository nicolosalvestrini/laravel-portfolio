@extends('layouts.admin')

@section('title', 'Modifica tecnologia')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.technologies.index') }}" class="text-secondary text-decoration-none small">
        ← Torna alle tecnologie
    </a>

    <h1 class="h3 fw-bold text-dark mt-1 mb-0">
        Modifica tecnologia
    </h1>
</div>

<section class="card content-card shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.technologies.update', $technology) }}" method="POST">
            @include('admin.technologies.form')
        </form>
    </div>
</section>

@endsection