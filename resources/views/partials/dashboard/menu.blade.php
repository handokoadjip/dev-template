<ul class="nav nav-treeview">
    @foreach($childs as $child)
    <li class="nav-item">
        <a href="{{ count($child->childs) ? 'javascript:;' : $child->menu_item_tautan }}" class="nav-link {{ count($child->childs) ? null : 'waitme' }}">
            <i class="nav-icon {{ $child->menu_item_icon }}"></i>
            <p>{{ $child->menu_item_label }} {!! count($child->childs) ? '<i class="end fas fa-angle-left"></i>' : null !!}</p>
        </a>
        @if(count($child->childs))
        @include('partials.dashboard.menu',['childs' => $child->childs])
        @endif
    </li>
    @endforeach
</ul>