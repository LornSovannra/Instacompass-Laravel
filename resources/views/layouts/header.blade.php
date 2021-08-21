<div class="header-wrapper">
    <div id="logo">
        <a href="{{ route("home") }}">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Instagram_logo.svg/1280px-Instagram_logo.svg.png" alt="Instagram">
        </a>
    </div>
    <div id="search">
        <div class="search-wrapper">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search">
        </div>
    </div>
    <div id="menu-wrapper">
        <div id="menu">
            <a href="{{ route("home") }}"><i class="fas fa-home"></i></a>
            <a href=""><i class="fab fa-facebook-messenger"></i></a>
            <a href=""><i class="far fa-compass"></i></a>
            <a href=""><i class="far fa-heart"></i></a>
            <ul class="menu_profile">
                <div class="menu_profile_image"><img src="{{ $auth -> user_profile_image }}" alt="Profile"></div>
                <ul class="profile_span">
                    <li><a href="{{ route("profile") }}"><i class="far fa-user-circle"></i> Profile</a></li>
                    <li><a href=""><i class="far fa-bookmark"></i> Saved</a></li>
                    <li><a href="{{ route("edit") }}"><i class="fas fa-cog"></i> Setting</a></li>
                    <li><a href=""><i class="fas fa-exchange-alt"></i> Switch Accounts</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link name="btn_sign_out" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </ul>
            </ul>
        </div>
    </div>
</div>