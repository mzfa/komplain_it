<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('home') }}">
                    <div class="avatar avatar-40 rounded icon"><i class="bi bi-house-door"></i></div>
                    <div class="col">Dashboard</div>
                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                </a>
            </li>

            @php
                $sidebar = Session('menu');
                // dump($sidebar);
            @endphp
            @isset($sidebar)
                @foreach($sidebar as $item)
                    @if(empty($item['submenu'][0]))
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="@if(Route::has($item['url_menu'])) {{ route($item['url_menu']) }} @endif">
                                <div class="avatar avatar-40 rounded icon"><i class="{{ $item['icon_menu'] }}"></i></div>
                                <div class="col">{{ $item['nama_menu'] }}</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">
                                <div class="avatar avatar-40 rounded icon"><i class="{{ $item['icon_menu'] }}"></i></div>
                                <div class="col">{{ $item['nama_menu'] }}</div>
                                <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach($item['submenu'] as $submenu)
                                @php $url = $submenu['url_menu']; @endphp
                                <li><a class="dropdown-item nav-link" href="@if(Route::has($submenu['url_menu'])) {{ route($submenu['url_menu']) }} @endif">
                                    <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                                    </div>
                                    <div class="col">{{ $submenu['nama_menu'] }}</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            @endisset
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">
                    <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>
                    <div class="col">Konfigurasi</div>
                    <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item nav-link" href="{{ url('hakakses') }}">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                        </div>
                        <div class="col">Hak Akses</div>
                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                    </a></li>
                    <li><a class="dropdown-item nav-link" href="{{ url('menu') }}">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                        </div>
                        <div class="col">Menu</div>
                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                    </a></li>
                </ul>
            </li> --}}

            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">
                    <div class="avatar avatar-40 rounded icon"><i class="bi bi-person"></i></div>
                    <div class="col">Master Data</div>
                    <div class="arrow"><i class="bi bi-plus plus"></i> <i class="bi bi-dash minus"></i>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item nav-link" href="{{ url('user') }}">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                        </div>
                        <div class="col">User</div>
                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                    </a></li>
                    <li><a class="dropdown-item nav-link" href="{{ url('bagian') }}">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                        </div>
                        <div class="col">Bagian</div>
                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                    </a></li>
                    <li><a class="dropdown-item nav-link" href="{{ url('profesi') }}">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                        </div>
                        <div class="col">Profesi</div>
                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                    </a></li>
                    <li><a class="dropdown-item nav-link" href="{{ url('pegawai') }}">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                        </div>
                        <div class="col">Pegawai</div>
                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                    </a></li>
                    <li><a class="dropdown-item nav-link" href="{{ url('profesi') }}">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                        </div>
                        <div class="col">Profesi</div>
                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                    </a></li>
                    <li><a class="dropdown-item nav-link" href="{{ url('pendidikan') }}">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                        </div>
                        <div class="col">Pendidikan</div>
                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                    </a></li>
                    <li><a class="dropdown-item nav-link" href="{{ url('jenis_pelatihan') }}">
                        <div class="avatar avatar-40 rounded icon"><i class="bi bi-calendar2"></i>
                        </div>
                        <div class="col">Jenis Pelatihan</div>
                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                    </a></li>
                </ul>
            </li>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post" id="logout">
                    @csrf
                </form>
                <a class="nav-link" aria-current="page" onclick="return document.getElementById('logout').submit()">
                    <div class="avatar avatar-40 rounded icon"><i class="bi bi-box-arrow-right"></i></div>
                    <div class="col">Logout</div>
                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                </a>
            </li> --}}
        </ul>
    </div>
</div>