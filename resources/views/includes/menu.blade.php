<section class="page-section shadow-lg">
    <div class="page-wrapper">
        <nav class="w-full py-4 flex justify-between items-center">
            @include('includes.logo',['color' => 'text-gray-800'])
            <div class="nav-items flex">
                <div class="nav-item {{ Request::routeIs('fe-pages.home') ? 'active' : "" }}">
                    <div class="nav-link-line"></div>
                    <a class="nav-link" href="{{ route('fe-pages.home') }}">Home</a>
                </div>
                <div class="nav-item {{ Request::routeIs('fe-pages.about-us') ? 'active' : "" }}">
                    <div class="nav-link-line"></div>
                    <a class="nav-link" href="{{ route('fe-pages.about-us') }}">About us</a>
                </div>
                <div class="nav-item {{ Request::routeIs('fe-pages.contact') ? 'active' : "" }}">
                    <div class="nav-link-line"></div>
                    <a class="nav-link" href="{{ route('fe-pages.contact') }}">Contact</a>
                </div>
            </div>
        </nav>
    </div>
</section>