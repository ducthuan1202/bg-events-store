<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="/" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="{{ config('app.name') }}" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image"/>
            </div>
            <div class="info">
                <a href="javascript:;" class="d-block">Admin</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link {{ request()->routeIs('events.*') ? 'active' : '' }}">
                        <i class="nav-icon {{ \App\Models\Event::icon() }}"></i>
                        <p>Events</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('events-logs.index') }}" class="nav-link {{ request()->routeIs('events-logs.*') ? 'active' : '' }}">
                        <i class="nav-icon {{ \App\Models\EventLog::icon() }}"></i>
                        <p>Events Logs</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('events-subscribes.index') }}" class="nav-link {{ request()->routeIs('events-subscribes.*') ? 'active' : '' }}">
                        <i class="nav-icon {{ \App\Models\EventSubscribe::icon() }}"></i>
                        <p>Events Subscribes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('aggregates.index') }}" class="nav-link {{ request()->routeIs('aggregates.*') ? 'active' : '' }}">
                        <i class="nav-icon {{ \App\Models\Aggregate::icon() }}"></i>
                        <p>Aggregates</p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>

</aside>
