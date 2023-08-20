<aside id="layout-menu" class="layout-menu menu-vertical menu bg-dark">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Online Shop</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{route('dashboard')}}" class="menu-link">
                <i class="tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">All Task</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Task</span>
        </li>
        <li class="menu-item">
            <a href="{{route('create')}}" class="menu-link">
                <i class="tf-icons bx bx-plus-circle"></i>
                <div data-i18n="Analytics">Add Task</div>
            </a>
        </li>
        <!-- Layouts -->
    </ul>
</aside>
