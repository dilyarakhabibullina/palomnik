<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Панель администратора</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="active"><a class="nav-link" href="{{ route('admin_home') }}"><i class="fa fa-hand-o-right"></i> <span>Панель</span></a></li>
            <li class=""><a class="nav-link" href="{{route('admin_slide_view')}}"><i class="fa fa-hand-o-right"></i> <span>Слайды</span></a></li>
            <li class=""><a class="nav-link" href="{{ route('admin_feature_view') }}"><i class="fa fa-hand-o-right"></i> <span>Особенности</span></a></li>
            <li class=""><a class="nav-link" href="{{ route('admin_testimonial_view') }}"><i class="fa fa-briefcase"></i> <span>Отзывы</span></a></li>
            <li class=""><a class="nav-link" href="{{ route('admin_post_view') }}" ><i class="fa fa-clipboard"></i> <span>Блог(посты)</span></a></li>

        </ul>
    </aside>
</div>
