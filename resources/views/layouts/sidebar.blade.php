<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li class="active">
            <a href="{{ url('/home') }}" class="svg-icon">
                <svg class="svg-icon" width="25" height="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="ml-4">Dashboards</span>
            </a>
        </li>

        @php
            $sidebar = Session('menu');
            // dump($sidebar);
        @endphp
        @isset($sidebar)
            @foreach ($sidebar as $key => $item)
                @if (empty($item['submenu'][0]))
                <li class="">
                    <a href="@if (Route::has($item['url_menu'])) {{ route($item['url_menu']) }} @endif" class="svg-icon">
                        <svg class="svg-icon" id="p-dash10" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <polyline points="17 11 19 13 23 9"></polyline>
                        </svg>
                        <span class="ml-4">{{ $item['nama_menu'] }}</span>
                    </a>
                </li>
                @else
                <li class=" ">
                    <a href="#menu{{ $key }}" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash10" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <polyline points="17 11 19 13 23 9"></polyline>
                        </svg>
                        <span class="ml-4">{{ $item['nama_menu'] }}</span>
                        <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                        <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                    </a>
                    <ul id="menu{{ $key }}" class="iq-submenu collapse" data-parent="#menu{{ $key }}">
                        @foreach ($item['submenu'] as $submenu)
                        @php $url = $submenu['url_menu']; @endphp
                        <li class="">
                            <a href="@if (Route::has($submenu['url_menu'])) {{ route($submenu['url_menu']) }} @endif">
                                <i class="las la-minus"></i><span>{{ $submenu['nama_menu'] }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
            @endforeach
        @endisset
        <li class="">
            <form action="{{ route('logout') }}" method="post" id="logout">
                @csrf
            </form>
            <a onclick="return document.getElementById('logout').submit()" class="svg-icon">
                <svg class="svg-icon mr-0 text-primary" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="ml-4">Logout</span>
            </a>
        </li>
    </ul>
</nav>