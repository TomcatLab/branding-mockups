<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
        B<span>Mockups </span>
    </a>
    <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
    </div>
    </div>
    <div class="sidebar-body">
    <ul class="nav">
        @foreach($menu as $item)
            @if( $item['type'] == 'category')
            <li class="nav-item nav-category">{{ $item['label'] }}</li>
            @elseif($item['type'] == 'link')
            <li class="nav-item">
                <a href="{{URL::to($item['link'])}}" class="nav-link">
                    <i class="link-icon" data-feather="{{ $item['icon'] ? $item['icon'] : 'link-icon' }}"></i>
                    <span class="link-title">{{$item['label']}}</span>
                </a>
            </li>
            @elseif($item['type'] == 'dropdown')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#{{ $item['label'] }}" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon"  data-feather="{{ $item['icon'] ? $item['icon'] : 'father' }}"></i>
                    <span class="link-title">{{$item['label']}}</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="{{ $item['label'] }}">
                    <ul class="nav sub-menu">
                        @foreach($item['submenu'] as $submenu)
                        <li class="nav-item">
                            <a href="{{URL::to($submenu['link'])}}" class="nav-link">{{ $submenu['label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </li>
            @endif
        @endforeach
    </ul>
    </div>
</nav>
<!-- partial -->