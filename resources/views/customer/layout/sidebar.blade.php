<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('customer_home') }}">Панель </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('customer_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('customer/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer_home') }}"><i class="fa fa-hand-o-right"></i> <span>Панель</span></a></li>
            <li class="{{ Request::is('customer/orders/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('customer_orders_view') }}"><i class="fa fa-hand-o-right"></i> <span>Заказы</span></a></li>





        </ul>
    </aside>
</div>
