<li class="nav-item {{ request()->routeIs('Home')?'active':'' }}">
    <a class="nav-link" href="{{ route('Home') }}">Главная</a>
</li>

<li class="nav-item {{ request()->routeIs('news.index')?'active':'' }}">
    <a class="nav-link"  href="{{ route('news.index') }}">Новости</a>
</li>

<li class="nav-item {{ request()->routeIs('news.category.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.category.index') }}">Категории</a>
</li>

<li class="nav-item">
    <a class="nav-link"  href="{{ route('vkLogin') }}">VK Login</a>
</li>

@if(Auth::user() !== null && Auth::user()->is_admin)
    <li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">
        <a class="nav-link"  href="{{ route('admin.news.index') }}">Админка</a>
    </li>
@endif

