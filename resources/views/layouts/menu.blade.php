<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('messageshud') }}" class="nav-link {{ Request::is('messageshud') ? 'active' : '' }}">
        <i class="nav-icon fas fa-envelope"></i>
        <p>Messages</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('reportshud') }}" class="nav-link {{ Request::is('reportshud') ? 'active' : '' }}">
        <i class="nav-icon fas fa-fw fa-chart-area"></i>
        <p>Reports</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('scaleshud') }}" class="nav-link {{ Request::is('scaleshud') ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>Scales</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('usershud') }}" class="nav-link {{ Request::is('usershud') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>Officers Management</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('pointerhud') }}" class="nav-link {{ Request::is('pointerhud') ? 'active' : ''  }}">
        <i class="nav-icon fas fa-map-marker    "></i>
        <p>Register Point</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('marketplace') }}" class="nav-link {{ Request::is('marketplace') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cart-plus	"></i>
        <p>My Market</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('products') }}" class="nav-link {{ Request::is('products') ? 'active' : '' }}">
        <i class="nav-icon fas fa-dolly-flatbed		"></i>
        <p>Products</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('storage') }}" class="nav-link {{ Request::is('storage') ? 'active' : '' }}">
        <i class="nav-icon fas fa-boxes		"></i>
        <p>Storage</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('settings') }}" class="nav-link {{ Request::is('settings') ? 'active' : '' }}">
        <i class="nav-icon fas fa-cog		"></i>
        <p>Settings</p>
    </a>
</li>


