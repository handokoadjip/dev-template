<aside class="main-sidebar sidebar-bg-dark sidebar-color-primary shadow">
    <div class="brand-container">
        <a href="{{ route('dashboard.index') }}" class="brand-link waitme">
            <img src="{{ asset('_assets/images/logo.png') }}" alt="Logo" class="brand-image opacity-80 rounded-circle shadow">
            <span class="brand-text fw-light">{{ config('app.name') }}</span>
        </a>
        <a class="pushmenu mx-1" data-lte-toggle="sidebar-mini" href="{{ route('dashboard.index') }}" role="button"><i class="fas fa-angle-double-left"></i></a>
    </div>
    <!-- Sidebar -->
    <div class="sidebar m-0 p-0">
        <nav class="mt-2">
            <!-- Sidebar Menu -->
            <ul class="nav nav-pills nav-sidebar flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <!-- Menu -->
                @foreach($data['menus'] as $menu)
                <li class="nav-item">
                    <a href="{{ count($menu->childs) ? 'javascript:;' : $menu->menu_item_tautan }}" class="nav-link {{ count($menu->childs) ? null : 'waitme' }}">
                        <i class="nav-icon {{ $menu->menu_item_icon }}"></i>
                        <p>{{ $menu->menu_item_label }} {!! count($menu->childs) ? '<i class="end fas fa-angle-left"></i>' : null !!}</p>
                    </a>

                    @if(count($menu->childs))
                    @include('partials.dashboard.menu', ['childs' => $menu->childs])
                    @endif
                </li>
                @endforeach
                <!-- /Menu -->
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>