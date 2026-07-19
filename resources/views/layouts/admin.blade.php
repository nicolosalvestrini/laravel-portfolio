<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Area Admin') | Portfolio</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        :root {
            --admin-primary: #6366f1;
            --admin-secondary: #8b5cf6;
            --admin-dark: #111827;
            --admin-sidebar: #1f2937;
            --admin-background: #f3f4f6;
        }

        body {
            background-color: var(--admin-background);
            color: #374151;
        }

        .admin-navbar {
            min-height: 70px;
            background: linear-gradient(135deg,
                    var(--admin-dark),
                    var(--admin-sidebar));
        }

        .admin-logo {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: linear-gradient(135deg,
                    var(--admin-primary),
                    var(--admin-secondary));
            color: white;
            font-weight: bold;
        }

        .admin-sidebar {
            min-height: calc(100vh - 70px);
            background-color: var(--admin-sidebar);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #d1d5db;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .sidebar-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.08);
            transform: translateX(4px);
        }

        .sidebar-link.active {
            color: white;
            background: linear-gradient(135deg,
                    var(--admin-primary),
                    var(--admin-secondary));
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.25);
        }

        .sidebar-icon {
            width: 28px;
            font-size: 1.2rem;
            text-align: center;
        }

        .admin-content {
            min-height: calc(100vh - 70px);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg,
                    var(--admin-primary),
                    var(--admin-secondary));
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        .offcanvas {
            background-color: var(--admin-sidebar);
        }
    </style>

    @yield('styles')
</head>

<body>
    {{-- Navbar --}}
    <header>
        <nav class="navbar navbar-dark admin-navbar shadow-sm sticky-top">
            <div class="container-fluid px-3 px-lg-4">
                <div class="d-flex align-items-center gap-3">
                    {{-- Pulsante menu mobile --}}
                    <button
                        class="navbar-toggler d-lg-none border-0"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#mobileSidebar"
                        aria-controls="mobileSidebar"
                        aria-label="Apri menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="navbar-brand d-flex align-items-center gap-3 mb-0">
                        <span class="admin-logo">NS</span>

                        <span>
                            <span class="d-block fw-bold lh-1">
                                Portfolio
                            </span>

                            <small class="text-white-50">
                                Area amministrativa
                            </small>
                        </span>
                    </a>
                </div>

                <div class="dropdown">
                    <button
                        class="btn text-white border-0 d-flex align-items-center gap-2"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="user-avatar">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </span>

                        <span class="d-none d-md-block text-start">
                            <span class="d-block fw-semibold lh-1">
                                {{ Auth::user()->name }}
                            </span>

                            <small class="text-white-50">
                                Amministratore
                            </small>
                        </span>

                        <span>⌄</span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                        <li>
                            <span class="dropdown-header">
                                {{ Auth::user()->email }}
                            </span>
                        </li>

                        <li>
                            <a class="dropdown-item" href="/">
                                Visualizza sito
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form
                                action="{{ route('logout') }}"
                                method="POST">
                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger">
                                    Esci dall’account
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-2 d-none d-lg-block admin-sidebar p-3">
                <div class="py-3">
                    <small class="text-uppercase text-secondary fw-bold px-3">
                        Menu principale
                    </small>
                </div>

                @include('admin.partials.sidebar')
            </aside>

            <main class="col-12 col-lg-10 admin-content p-3 p-md-4 p-xl-5">
                @yield('content')
            </main>
        </div>
    </div>

    
    <div
        class="offcanvas offcanvas-start text-white"
        tabindex="-1"
        id="mobileSidebar"
        aria-labelledby="mobileSidebarLabel">
        <div class="offcanvas-header border-bottom border-secondary">
            <h5 class="offcanvas-title" id="mobileSidebarLabel">
                Portfolio Admin
            </h5>

            <button
                type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"
                aria-label="Chiudi"></button>
        </div>

        <div class="offcanvas-body">
            @include('admin.partials.sidebar')
        </div>
    </div>

</body>

</html>