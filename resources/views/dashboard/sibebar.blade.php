<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-hamburger"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DompixelShop</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Ekko::areActiveRoutes(['product*'], 'active') }}">
        <a class="nav-link" href="{{ route('product.index') }}">
            <i class="fas fa-hamburger"></i>
            <span>Catálogo de Produtos</span>
        </a>
    </li>

</ul>
