<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Панель администратора</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin/home')||Request::is('admin/room/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}" ></i> <span>Панель</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/amenity/view')? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-superpowers"></i><span>Комнаты</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/amenity/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_amenity_view') }}"><i class="fa fa-angle-right"></i>Услуги</a></li>
                    <li class="{{ Request::is('admin/room/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_room_view') }}"><i class="fa fa-angle-right"></i>Комнаты</a></li>
                </ul>
            </li>


            <li class="{{ Request::is('admin/page/about')||Request::is('admin/page/terms')||Request::is('admin/page/privacy')||Request::is('admin/page/contact')||Request::is('admin/page/photo-gallery')||Request::is('admin/page/video-gallery')||Request::is('admin/page/faq')||Request::is('admin/page/blog')||Request::is('admin/page/room')||Request::is('admin/page/cart')||Request::is('admin/page/checkout')||Request::is('admin/page/payment')||Request::is('admin/page/signup')||Request::is('admin/page/signin') ? 'active' : '' }}"><a href="#" class="nav-link has-dropdown"><i class="fa fa-arrows"></i><span>Страницы</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fa fa-angle-right"></i>О нас</a></li>
                    <li class="{{ Request::is('admin/page/terms') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_terms') }}"><i class="fa fa-angle-right"></i>Условия и положения</a></li>
                    <li class="{{ Request::is('admin/page/privacy') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_privacy') }}"><i class="fa fa-angle-right"></i>Конфиденциальность</a></li>
                    <li class="{{ Request::is('admin/page/contact') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_contact') }}"><i class="fa fa-angle-right"></i>Контакты</a></li>
                    <li class="{{ Request::is('admin/page/photo-gallery') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_photo_gallery') }}"><i class="fa fa-angle-right"></i>Фото галерея</a></li>
                    <li class="{{ Request::is('admin/page/video-gallery') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_video_gallery') }}"><i class="fa fa-angle-right"></i>Видео галерея</a></li>
                    <li class="{{ Request::is('admin/page/faq') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_faq') }}"><i class="fa fa-angle-right"></i>Часто задаваемые вопросы</a></li>
                    <li class="{{ Request::is('admin/page/blog') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_blog') }}"><i class="fa fa-angle-right"></i>Блог</a></li>
                    <li class="{{ Request::is('admin/page/room') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_room') }}"><i class="fa fa-angle-right"></i>Номер</a></li>
                    <li class="{{ Request::is('admin/page/cart') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_cart') }}"><i class="fa fa-angle-right"></i>Корзина</a></li>
                    <li class="{{ Request::is('admin/page/checkout') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_checkout') }}"><i class="fa fa-angle-right"></i>Оформление заказа</a></li>
                    <li class="{{ Request::is('admin/page/payment') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_payment') }}"><i class="fa fa-angle-right"></i>Оплата</a></li>
                    <li class="{{ Request::is('admin/page/signup') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_signup') }}"><i class="fa fa-angle-right"></i>Регистрации</a></li>
                    <li class="{{ Request::is('admin/page/signin') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_page_signin') }}"><i class="fa fa-angle-right"></i>Войти в систему</a></li>

                </ul>
            </li>



            <li class="{{ Request::is('admin/slide/*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin_slide_view')}}"><i class="fa fa-hand-o-right"></i> <span>Слайды</span></a></li>
            <li class="{{ Request::is('admin/feature/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_feature_view') }}"><i class="fa fa-hand-o-right"></i> <span>Особенности</span></a></li>
            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_testimonial_view') }}"><i class="fa fa-briefcase"></i> <span>Отзывы</span></a></li>
            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post_view') }}" ><i class="fa fa-clipboard"></i> <span>Блог(посты)</span></a></li>
            <li class="{{ Request::is('admin/photo/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_photo_view') }}" ><i class="fa fa-picture-o"></i> <span>Фото галерея</span></a></li>
            <li class="{{ Request::is('admin/video/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_video_view') }}" ><i class="fa fa-camera"></i> <span>Видео галерея</span></a></li>
            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_view') }}" ><i class="fa fa-bolt"></i> <span>Часто задаваемые вопросы</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/subscriber/show')||Request::is('admin/subscriber/send-email')||Request::is('admin/subscriber/showConfirmed') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-users"></i><span>Подписчики</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/subscriber/show') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber_show') }}"><i class="fa fa-angle-right"></i>Не подтвержденные</a></li>
                    <li class="{{ Request::is('admin/subscriber/showConfirmed') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber_showConfirmed') }}"><i class="fa fa-angle-right"></i>Подтвержденные</a></li>
                    <li class="{{ Request::is('admin/subscriber/send-email') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscriber_send_email') }}"><i class="fa fa-angle-right"></i>Послать эл.письмо</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/prayorder/view')||Request::is('admin/church/view')||Request::is('admin/treb/view') ? 'active' : '' }}"><a href="#" class="nav-link has-dropdown"><i class="fa fa-arrows"></i><span>Требы</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/prayorder/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_prayorder_view') }}"><i class="fa fa-angle-right"></i>Заказанные требы</a></li>
                    <li class="{{ Request::is('admin/church/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_church_view') }}"><i class="fa fa-angle-right"></i>Церкви</a></li>
                    <li class="{{ Request::is('admin/treb/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_treb_view') }}"><i class="fa fa-angle-right"></i>Категория треб</a></li>

                </ul>
            </li>

            <li class="{{ Request::is('admin/prayordermuslim/view')||Request::is('admin/mosque/view') ? 'active' : '' }}"><a href="#" class="nav-link has-dropdown"><i class="fa fa-arrows"></i><span>Мусульманские молитвы</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/prayordermuslim/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_prayordermuslim_view') }}"><i class="fa fa-angle-right"></i>Заказанные молитвы</a></li>
                    <li class="{{ Request::is('admin/mosque/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_mosque_view') }}"><i class="fa fa-angle-right"></i>Мечети</a></li>
                    <li class="{{ Request::is('admin/muslimpray/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_muslimpray_view') }}"><i class="fa fa-angle-right"></i>Категория молитв</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('admin/book/view')||Request::is('admin/author/view')||Request::is('admin/religion/view')||Request::is('admin/lang/view')||Request::is('admin/publisher/view')||Request::is('admin/genre/view') ? 'active' : '' }}"><a href="#" class="nav-link has-dropdown"><i class="fa fa-arrows"></i><span>Книги</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/book/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_book_view') }}"><i class="fa fa-angle-right"></i>Книга</a></li>
                    <li class="{{ Request::is('admin/author/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_author_view') }}"><i class="fa fa-angle-right"></i>Автор</a></li>
                    <li class="{{ Request::is('admin/religion/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_religion_view') }}"><i class="fa fa-angle-right"></i>Религия</a></li>
                    <li class="{{ Request::is('admin/lang/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_lang_view') }}"><i class="fa fa-angle-right"></i>Язык</a></li>
                    <li class="{{ Request::is('admin/publisher/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_publisher_view') }}"><i class="fa fa-angle-right"></i>Издательство</a></li>
                    <li class="{{ Request::is('admin/genre/view') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_genre_view') }}"><i class="fa fa-angle-right"></i>Жанр</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
