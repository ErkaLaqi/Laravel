<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
                <div class="nav-profile-image">
                    <img src="{{asset('assets_pluginAdmin/images/faces/face1.jpg')}}" alt="profile" />
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                    <span class="font-weight-semibold mb-1 mt-2 text-center">{{ \Illuminate\Support\Facades\Auth::user()->name }} {{ \Illuminate\Support\Facades\Auth::user()->lastname }}</span>
                </div>
            </a>
        </li>
        <li class="nav-item pt-3">

            <form class="d-flex align-items-center" action="#">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" class="form-control border-0" placeholder="Search" />
                </div>
            </form>
        </li>
        <li class="pt-2 pb-1">
            <span class="nav-item-head">Options</span>
        </li>
     {{--   <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title">Transactions</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('purchases.index')}}">Purchases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/dropdowns.html">Sale Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Inventory Counting</a>
                    </li>
                </ul>
            </div>
        </li>--}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
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

