<div class="page-section shadow-lg">
    <div class="page-wrapper">
        <nav class="nav-wrapper" id="nav-wrapper-id">
            <a href="{{ route('fe-pages.home') }}">
                @include('includes.logo',['color' => 'text-gray-800'])
            </a>
            <div class="hamburger text-3xl sm:hidden flex items-center" id="hamburger-btn">
                <i class="ri-menu-3-line"></i>
            </div>
            <div class="nav-items ">
                <div class="nav-item {{ Request::routeIs('fe-pages.home') ? 'active' : "" }}">
                    <div class="nav-link-line"></div>
                    <a class="nav-link" href="{{ route('fe-pages.home') }}">Home</a>
                </div>
                <div class="nav-item {{ Request::routeIs('fe-pages.products*') ? 'active' : "" }}">
                    <div class="nav-link-line"></div>
                    <a class="nav-link" href="{{ route('fe-pages.products.index-fe') }}">Products</a>
                </div>
                <div class="nav-item {{ Request::routeIs('fe-pages.contact') ? 'active' : "" }}">
                    <div class="nav-link-line"></div>
                    <a class="nav-link" href="{{ route('fe-pages.contact') }}">Contact</a>
                </div>
            </div>
        </nav>
    </div>
</div>