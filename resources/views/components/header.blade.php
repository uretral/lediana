
<header class="header">
    <div class="header-top">
        <div class="container">
            <a href="/" class="logo" aria-label="Главная страница"></a>
            <nav class="top-nav">
                <ul>
                    @foreach(@$menu->headerTopMenu->pages as $menuItem)
                        <li>
                            <a href="/{{@$menuItem->slug}}" class="link link--secondary">
                                @if(empty(@$menuItem->menu_title)) {{@$menuItem->title}} @else {{@$menuItem->menu_title}} @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="account-preview">
                <a href="#" class="account-preview__link">
                    <div class="account-preview__name">
                        <span>Alexander</span>
                        <span>Ebert</span>
                    </div>
                    <div class="account-preview__photo">
                        <img src="/assets/img/avatar.jpg" alt="user photo" />
                    </div>
                </a>
                <ul class="account-preview__list">
                    <li><a href="/account-orders.html">Мои заказы</a></li>
                    <li><a href="/account-drafts.html">Мои черновики</a></li>
                    <li><a href="/account-sales.html">Персональные акции</a></li>
                    <li><a href="/account-edit.html">Личные данные</a></li>
                    <li><a href="#">Выйти</a></li>
                </ul>
            </div>
            <a href="/cart.html" class="cart-preview">
                <i>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M4.32841e-05 -0.00878906V18.9927C-0.00548084 20.3125 0.517957 21.5805 1.45531 22.518C2.39267 23.4555 3.6672 23.9858 4.99889 23.9924H19.0012C20.3329 23.9858 21.6074 23.4555 22.5448 22.518C23.4821 21.5805 24.0056 20.3125 24 18.9927V-0.00878906H4.32841e-05ZM21.9956 18.9927C21.9982 19.3849 21.9228 19.7737 21.7737 20.137C21.6246 20.5003 21.4048 20.8309 21.1267 21.1099C20.8485 21.3889 20.5177 21.6108 20.153 21.763C19.7883 21.9152 19.3969 21.9946 19.0012 21.9968H4.99889C4.60317 21.9946 4.21181 21.9152 3.84709 21.763C3.48237 21.6108 3.15154 21.3889 2.87343 21.1099C2.59532 20.8309 2.37545 20.5003 2.22636 20.137C2.07727 19.7737 2.00185 19.3849 2.00451 18.9927V1.99474H21.9956V18.9927ZM12 12.9906C13.3319 12.984 14.6067 12.4535 15.5441 11.5157C16.4815 10.5779 17.0047 9.30963 16.9989 7.98959V5.99091H14.9944V7.98959C14.9944 8.77749 14.6787 9.53312 14.1166 10.0903C13.5544 10.6474 12.792 10.9604 11.9971 10.9604C11.2021 10.9604 10.4396 10.6474 9.87742 10.0903C9.31528 9.53312 8.99954 8.77749 8.99954 7.98959V5.99091H7.0012V7.98959C6.99782 8.64334 7.12445 9.29135 7.37389 9.89656C7.62333 10.5018 7.99072 11.0523 8.45497 11.5168C8.91922 11.9812 9.47113 12.3504 10.0794 12.6033C10.6877 12.8562 11.3404 12.9878 12 12.9906Z"
                        />
                    </svg>
                </i>
                <div class="cart-preview__empty">
                    <span>В корзине пусто</span>
                    <span>Пусто</span>
                </div>
            </a>
            <button class="btn-base mob-toggler" data-toggle-modal="mob-menu" aria-label="Меню">
                <svg aria-hidden="true"><use href="/svg/svg.svg#menu"></use></svg>
            </button>
        </div>
    </div>
    <div class="main-nav">
        <nav class="container">
            <ul>
                @foreach(@$menu->headerMainMenu->pages as $menuItem)
                    <li>
                        <a href="/{{@$menuItem->slug}}">
                            @if(empty(@$menuItem->menu_title)) {{@$menuItem->title}} @else {{@$menuItem->menu_title}} @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>

<div class="modal mob-menu-modal" hidden data-modal id="mob-menu">
    <div class="modal-content" data-modal-content>
        <ul class="mob-menu">
            @foreach(@$menu->headerMainMenu->pages as $menuItem)
                <li>
                    <a href="/{{@$menuItem->slug}}">
                        @if(empty(@$menuItem->menu_title)) {{@$menuItem->title}} @else {{@$menuItem->menu_title}} @endif
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="account-preview">
            <a href="#" class="account-preview__link" data-toggle="mob-account-preview-list">
                <div class="account-preview__name">
                    <span>Alexander</span>
                    <span>Ebert</span>
                </div>
                <div class="account-preview__photo">
                    <img src="/assets/img/avatar.jpg" alt="user photo" />
                </div>
            </a>
            <ul class="account-preview__list" data-dropdown id="mob-account-preview-list">
                <li><a href="/account-orders.html">Мои заказы</a></li>
                <li><a href="/account-drafts.html">Мои черновики</a></li>
                <li><a href="/account-sales.html">Персональные акции</a></li>
                <li><a href="/account-edit.html">Личные данные</a></li>
                <li><a href="#">Выйти</a></li>
            </ul>
        </div>

        <div class="top-nav">
            <ul>
                @foreach(@$menu->headerTopMenu->pages as $menuItem)
                    <li>
                        <a href="/{{@$menuItem->slug}}" class="link link--secondary">
                            @if(empty(@$menuItem->menu_title)) {{@$menuItem->title}} @else {{@$menuItem->menu_title}} @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>





