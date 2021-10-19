<section class="footer">
    <section class="page-section bg-gray-800 py-7">
        <div class="page-wrapper grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="w-full">
                @include('includes.logo',['color' => 'text-white'])
                <h5 class="mt-10 md:mt-6 text-lg text-white font-bold font-secondary uppercase">
                    We are company
                </h5>
                <p class="mr-auto w-11/12 text-gray-400 mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Impedit
                    eaque voluptate
                    doloremque, repellendus
                    id, necessitatibus ipsum odit veritatis a eius vel nihil consectetur vero atque exercitationem amet
                    natus, cupiditate ducimus.</p>
            </div>
            <div class="w-full">
                <h5 class="mt-10 md:mt-6 text-lg text-white font-bold font-secondary uppercase">
                    Brief Contact
                </h5>

                <div class="brief-contact mt-4">
                    <p class="text-gray-400 mt-1 block">Somewhere 846/465, Big City</p>
                    <p class="text-gray-400 mt-1 block">64445 Big City, Big State</p>
                    <a class="text-gray-200 mt-3 block">random@email.com</a>
                    <a class="text-gray-200 mt-1 block">+1 6969 420 132</a>
                    <div class="text-gray-400 mt-3 block">
                        <span class="text-gray-400">
                            Mon-Thu:
                        </span>
                        <span class="text-gray-200">
                            07:00 - 21:00
                        </span>
                    </div>
                    <div class="text-gray-400 mt-1 block">
                        <span class="text-gray-400">
                            Fri-Sat:
                        </span>
                        <span class="text-gray-200">
                            06:00 - 22:00
                        </span>
                    </div>
                    <div class="text-gray-400 mt-1 block">
                        <span class="text-gray-400">
                            Sunday:
                        </span>
                        <span class="text-gray-200">
                            -Closed-
                        </span>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <h5 class="mt-10 md:mt-6 text-lg text-white font-bold font-secondary uppercase">
                    Menu Links
                </h5>

                <div class="mt-4">
                    <div>
                        <p class="text-gray-400">So you don't have to scroll to top :D,<br> just click down below.
                            You're
                            welcome</p>
                    </div>
                    <div class="mt-6">
                        <div
                            class="menu-link-footer-wrapper flex items-center {{ Request::routeIs('fe-pages.home') ? 'active' : "" }}">
                            <a href="{{ route('fe-pages.home') }}"
                                class="menu-link-footer text-gray-400 block mt-1 text-xl font-secondary">Home</a>
                            <div class="ball w-2 h-1 bg-gray-100 rounded-full opacity-0 transform translate-x-2"></div>
                        </div>
                        <div
                            class="menu-link-footer-wrapper flex items-center {{ Request::routeIs('fe-pages.about-us') ? 'active' : "" }}">
                            <a href="{{ route('fe-pages.about-us') }}"
                                class="menu-link-footer text-gray-400 block mt-1 text-xl font-secondary">About Us</a>
                            <div class="ball w-2 h-1 bg-gray-100 rounded-full opacity-0 transform translate-x-2"></div>
                        </div>
                        <div
                            class="menu-link-footer-wrapper flex items-center {{ Request::routeIs('fe-pages.contact') ? 'active' : "" }}">
                            <a href="{{ route('fe-pages.contact') }}"
                                class="menu-link-footer text-gray-400 block mt-1 text-xl font-secondary">Contact</a>
                            <div class="ball w-2 h-1 bg-gray-100 rounded-full opacity-0 transform translate-x-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-gray-900 py-4">
        <div class="page-wrapper flex justify-between flex-col sm:flex-row">
            <p class="text-gray-400">
                &#169; 2021. All Rights Reserved. <small class="text-2xs">Just kidding</small>
            </p>
            <p class="text-gray-400 mt-2 sm:mt-0">
                Created by Damián Hrubják
            </p>

        </div>
    </section>
</section>