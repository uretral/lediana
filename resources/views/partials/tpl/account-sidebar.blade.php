<div class="lg:bg-white pt-16 sm:pt-32 lg:py-64">
    <div class="flex lg:block lg:mb-32">
        <div class="wh-100 rounded-full overflow-hidden mb-16">
            <img src="/assets/img/avatar.jpg" class="image-full" alt="" />
        </div>
        <div class="pl-16 lg:pl-0 pt-12 lg:pt-0">
            <div class="font-bold">{{@\Auth::user()->name}} {{@\Auth::user()->surname}}</div>
            <div class="text-secondary mt-4">{{@\Auth::user()->email}}</div>
        </div>
    </div>
    <ul class="whitespace-nowrap sm:flex flex-wrap lg:block -mx-10 lg:mx-0">
        <li class="border-b border-divider {{ (strcmp(Route::currentRouteName(), 'dashboard') == 0) ? 'text-primary lg:text-black lg:bg-divider pointer-events-none' : '' }}">
            <a href="{{route('dashboard')}}" class="px-10 lg:px-24 h-30 lg:h-48 flex items-center transition hover:text-primary">Мои заказы</a>
        </li>
        <li class="border-b border-divider {{ (strcmp(Route::currentRouteName(), 'lk.drafts') == 0) ? 'text-primary lg:text-black lg:bg-divider pointer-events-none' : '' }}">
            <a href="{{route('lk.drafts')}}" class="px-10 lg:px-24 h-30 lg:h-48 flex items-center transition hover:text-primary">Мои черновики</a>
        </li>
        <li class="border-b border-divider {{ (strcmp(Route::currentRouteName(), 'lk.sales') == 0) ? 'text-primary lg:text-black lg:bg-divider pointer-events-none' : '' }}">
            <a href="{{route('lk.sales')}}" class="px-10 lg:px-24 h-30 lg:h-48 flex items-center transition hover:text-primary">Персональные акции</a>
        </li>
        <li class="border-b border-divider {{ (strcmp(Route::currentRouteName(), 'lk.edit') == 0) ? 'text-primary lg:text-black lg:bg-divider pointer-events-none' : '' }}">
            <a href="{{route('lk.edit')}}" class="px-10 lg:px-24 h-30 lg:h-48 flex items-center transition hover:text-primary">Личные данные</a>
        </li>
        <li class="lg:text-secondary"><a href="{{route('logout')}}" class="px-10 lg:px-24 h-30 lg:h-48 flex items-center transition hover:text-primary">Выйти</a></li>
    </ul>
</div>
