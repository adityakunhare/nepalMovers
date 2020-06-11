<div class="navigation">
    <div class="container">
        <div class="nav-brand">
            <a href="{{ route('home') }}"><img src="{{ asset('front/images/brand/MoverLogo.svg') }}" alt="" /></a>
        </div>
        <nav>
            <div class="nav-mobile">
                <a id="nav-toggle" href="{{ route('home') }}"><span></span></a>
            </div>
            <ul class="nav-list">
                <li class="active">
                    <a href="{{ route('home') }}">Home</a>
                </li>

                <li>
                    <a href="#!">Services</a>
                    <ul class="nav-dropdown">
                        <li>
                            <a href="#!">Document Cargo</a>
                        </li>
                        <li>
                            <a href="#!">Office and Home Shift</a>
                        </li>
                        <li>
                            <a href="#!">Hire on Vehicle</a>
                        </li>
                        <li>
                            <a href="#!">Boxing and Packaging</a>
                        </li>
                        <li>
                            <a href="#!">Professional Handyman</a>
                        </li>
                        <li>
                            <a href="#!">Risk Coverage Insurance</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{#!}">Partners</a>
                </li>

                <li>
                    <a href="#!">Help and Support</a>
                </li>
                <li>
                    @auth
                        <a href="{{ route('logout') }}">Logout</a>
                    @endauth
                    @guest
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Login / Signup</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest

                </li>
            </ul>
        </nav>
    </div>
</div>
