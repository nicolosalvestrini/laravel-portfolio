@extends('layouts.admin')

@section('title', 'Dashboard')

@section('styles')
<style>
    .welcome-banner {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 22px;
        color: white;
    }

    .welcome-banner::after {
        content: '';
        position: absolute;
        width: 230px;
        height: 230px;
        right: -70px;
        top: -90px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.1);
    }

    .stat-card {
        border: 0;
        border-radius: 18px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 30px rgba(17, 24, 39, 0.1);
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        font-size: 1.4rem;
    }

    .content-card {
        border: 0;
        border-radius: 18px;
    }

    .quick-action {
        text-decoration: none;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        color: #374151;
        transition: all 0.2s ease;
    }

    .quick-action:hover {
        border-color: #6366f1;
        background-color: #f5f3ff;
        color: #4f46e5;
        transform: translateY(-2px);
    }
</style>
@endsection

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">
            Dashboard
        </h1>

        <p class="text-secondary mb-0">
            Gestisci i contenuti del tuo portfolio.
        </p>
    </div>

    <div class="mt-3 mt-md-0">
        <span class="badge rounded-pill bg-white text-secondary shadow-sm px-3 py-2">
            {{ now()->format('d/m/Y') }}
        </span>
    </div>
</div>


<section class="welcome-banner shadow-sm p-4 p-md-5 mb-4">
    <div class="position-relative" style="z-index: 1;">
        <span class="badge bg-white text-primary mb-3">
            Area amministrativa
        </span>

        <h2 class="fw-bold">
            Bentornato, {{ Auth::user()->name }}!
        </h2>

        <p class="mb-4 text-white-50 col-lg-7">
            Da questa dashboard potrai aggiungere e modificare i progetti,
            gestire le tecnologie e aggiornare il tuo portfolio.
        </p>

        <a href="#" class="btn btn-light text-primary fw-semibold px-4">
            Aggiungi un progetto
        </a>

        <a href="/" class="btn btn-outline-light fw-semibold px-4 ms-2">
            Visita il sito
        </a>
    </div>
</section>


<section class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-secondary mb-2">Progetti</p>
                        <h3 class="fw-bold mb-0">0</h3>
                    </div>

                    <div class="stat-icon bg-primary-subtle text-primary">
                        ▣
                    </div>
                </div>

                <small class="text-secondary">
                    Progetti pubblicati
                </small>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-secondary mb-2">Tecnologie</p>
                        <h3 class="fw-bold mb-0">0</h3>
                    </div>

                    <div class="stat-icon bg-success-subtle text-success">
                        ◆
                    </div>
                </div>

                <small class="text-secondary">
                    Competenze inserite
                </small>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-secondary mb-2">Messaggi</p>
                        <h3 class="fw-bold mb-0">0</h3>
                    </div>

                    <div class="stat-icon bg-warning-subtle text-warning">
                        ✉
                    </div>
                </div>

                <small class="text-secondary">
                    Messaggi ricevuti
                </small>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card stat-card shadow-sm h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-secondary mb-2">Profilo</p>
                        <h3 class="fw-bold mb-0">100%</h3>
                    </div>

                    <div class="stat-icon bg-info-subtle text-info">
                        ●
                    </div>
                </div>

                <small class="text-secondary">
                    Profilo completato
                </small>
            </div>
        </div>
    </div>
</section>

<div class="row g-4">

    <div class="col-12 col-xl-7">
        <section class="card content-card shadow-sm h-100">
            <div class="card-body p-4">
                <div class="mb-4">
                    <h2 class="h5 fw-bold mb-1">Azioni rapide</h2>
                    <p class="text-secondary small mb-0">
                        Accedi velocemente alle funzioni principali.
                    </p>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <a href="#" class="quick-action d-block p-3">
                            <div class="fw-semibold">Nuovo progetto</div>
                            <small class="text-secondary">
                                Aggiungi un lavoro al portfolio
                            </small>
                        </a>
                    </div>

                    <div class="col-12 col-md-6">
                        <a href="#" class="quick-action d-block p-3">
                            <div class="fw-semibold">Gestisci progetti</div>
                            <small class="text-secondary">
                                Modifica i progetti esistenti
                            </small>
                        </a>
                    </div>

                    <div class="col-12 col-md-6">
                        <a href="#" class="quick-action d-block p-3">
                            <div class="fw-semibold">Tecnologie</div>
                            <small class="text-secondary">
                                Gestisci le tue competenze
                            </small>
                        </a>
                    </div>

                    <div class="col-12 col-md-6">
                        <a href="/" class="quick-action d-block p-3">
                            <div class="fw-semibold">Anteprima portfolio</div>
                            <small class="text-secondary">
                                Controlla il sito pubblico
                            </small>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <div class="col-12 col-xl-5">
        <section class="card content-card shadow-sm h-100">
            <div class="card-body p-4">
                <h2 class="h5 fw-bold mb-4">Il tuo profilo</h2>

                <div class="d-flex align-items-center gap-3 mb-4">
                    <div
                        class="user-avatar"
                        style="width: 60px; height: 60px; font-size: 1.4rem;">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>

                    <div>
                        <h3 class="h6 fw-bold mb-1">
                            {{ Auth::user()->name }}
                        </h3>

                        <p class="text-secondary small mb-0">
                            {{ Auth::user()->email }}
                        </p>
                    </div>
                </div>

                <div class="alert alert-primary border-0 mb-0">
                    <strong>Suggerimento:</strong>
                    aggiungi i tuoi progetti migliori per rendere il
                    portfolio più interessante per i recruiter.
                </div>
            </div>
        </section>
    </div>
</div>
@endsection