<!-- MENU -->
<div class="menu w-80 fixed z-40 top-0 left-0 right-0 h-full flex flex-col bg-blue-gray-800 " id="menu-container">
    <div class="p-4 flex justify-center">
        @include('includes.logo',['color' => 'text-white'])
    </div>

    <div class="menu-items mt-48">
        <a class="menu-item {{ Request::routeIs('admin.home') ? " active" : "" }}" href="{{ route('admin.home') }}">
            <p class="icon flex items-center mr-4">
                <i class="ri-home-line"></i>
            </p>
            <p class="text">
                Home
            </p>
        </a>
        <a class="menu-item {{ Request::routeIs('admin.products*') ? " active" : "" }}"
            href="{{ route('admin.products.index') }}">
            <p class="icon flex items-center mr-4">
                <i class="ri-lightbulb-flash-line"></i>
            </p>
            <p class="text">
                Products
            </p>
        </a>
        <a class="menu-item {{ Request::routeIs('admin.product-categories*') ? " active" : "" }}"
            href="{{ route('admin.product-categories.index') }}">
            <p class="icon flex items-center mr-4">
                <i class="ri-list-settings-line"></i>
            </p>
            <p class="text">
                Products Categories
            </p>
        </a>
    </div>

    <div class="bottom mt-auto mb-0 p-4 flex justify-between">
        <a href="{{ route('fe-pages.home') }}" class="side-menu-bottom-link" type="submit">Back to home</a>
        <form method="POST" action="{{ route('auth.logout') }}">
            @csrf
            <button class="side-menu-bottom-link" type="submit">Log out</button>
        </form>

    </div>

</div>