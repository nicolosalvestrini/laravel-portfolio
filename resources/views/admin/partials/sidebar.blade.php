<nav class="d-flex flex-column gap-2">
    <a
        href="{{ route('admin.dashboard') }}"
        class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <span class="sidebar-icon">⌂</span>
        <span>Dashboard</span>
    </a>

    <a
        href="{{ route('admin.projects.index') }}"
        class="sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
        <span class="sidebar-icon">▣</span>
        <span>Progetti</span>
    </a>

    <a
        href="{{ route('admin.technologies.index') }}"
        class="sidebar-link {{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}">
        <span class="sidebar-icon">◆</span>
        <span>Tecnologie</span>
    </a>
    
    <a href="#" class="sidebar-link">
        <span class="sidebar-icon">✉</span>
        <span>Messaggi</span>
    </a>

    <a href="/" class="sidebar-link">
        <span class="sidebar-icon">↗</span>
        <span>Visualizza sito</span>
    </a>

    <hr class="border-secondary my-3">

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button
            type="submit"
            class="sidebar-link border-0 bg-transparent w-100">
            <span class="sidebar-icon">↪</span>
            <span>Logout</span>
        </button>
    </form>
</nav>