@extends('layouts.admin')

@section('title', 'Modifica progetto')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.projects.show', $project) }}" class="text-secondary text-decoration-none small">
        ← Torna al progetto
    </a>

    <h1 class="h3 fw-bold text-dark mt-1 mb-0">
        Modifica progetto
    </h1>
</div>

<section class="card content-card shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @include('admin.projects.form')
        </form>
    </div>
</section>

@endsection