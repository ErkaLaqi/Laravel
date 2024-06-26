<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
                <div class="nav-profile-image">


                    @if(Auth::user()->photo)
                        <img src="{{ asset('profile_photos/' . Auth::user()->photo) }}" alt="profile" />
                    @else
                        <img src="{{ asset('assets_pluginAdmin/images/faces/face1.jpg') }}" alt="profile" />
                    @endif

                </div>
                <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                    <span class="font-weight-bold mb-1 mt-2 text-center color-card-outer" >{{ \Illuminate\Support\Facades\Auth::user()->name }} {{ \Illuminate\Support\Facades\Auth::user()->lastname }}</span>
                    <span class=" mb-1 mt-2 text-center color-card-outer" >{{ \Illuminate\Support\Facades\Auth::user()->role }}</span>

                </div>
            </a>
        </li>
        <li class="nav-item pt-3">


        </li>
        <li class="pt-2 pb-1">
            <span class="nav-item-head">Options</span>
        </li>

        @if(Auth::user()->role=='admin' || Auth::user()->role=='manager')
            <li class="nav-item">
                <a class="nav-link" href="{{url("/users")}}">
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    <span class="menu-title">Users</span>
                </a>
            </li>
        @endif



        <li class="nav-item">
            <a class="nav-link" href="/profile">
                <i class="mdi mdi-contacts menu-icon"></i>
                <span class="menu-title">Profile</span>
            </a>
        </li>



        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="{{ route('logout') }}"   onclick="event.preventDefault();
             this.closest('form').submit();">
                    <i class="fa fa-sign-out menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Logout</span>
                </a>
            </form>
        </li>
    </ul>
</nav>
