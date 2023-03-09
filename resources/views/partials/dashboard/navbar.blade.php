<nav class="main-header navbar navbar-expand navbar-light">
    <div class="container-fluid">
        <!-- Start navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar-full" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link waitme">Dashboard</a>
            </li>
        </ul>

        <!-- End navbar links -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <img class="user-image img-circle shadow object-fit-cover" src="https://avatar.oxro.io/avatar.svg?name=r&background=157347&caps=3&bold=true" alt="User Image">
                    <span class="d-none d-md-inline">{{ Auth::user()->pengguna_nama }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!-- Menu Footer-->
                    <li>
                        <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat w-100 text-start waitme">Data Diri</a>
                    </li>
                    <li>
                        <a href="{{ route('change-password.edit') }}" class=" btn btn-default btn-flat w-100 text-start waitme">Ganti Password</a>
                    </li>
                    <li>
                        {{ Form::open(['route' => 'logout', 'method' => 'post']) }}
                        {{ Form::submit('Keluar', ['class' => 'btn btn-default btn-flat w-100 text-start waitme']) }}
                        {{ Form::close() }}
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>