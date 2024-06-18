@php
    $user = Auth::user();
    $role = $user->role;
@endphp

<aside id="sidebar" class="sidebar position-fixed d-sm-block d-none ">
    <div class="vh-100 text-bg-dark px-sm-2 overflow-scroll">
        <small class="d-block text-center pt-3 px-1">{{ $user->teacher->name ?? $user->name }}</small>
        <hr>
        @switch($role)
            @case('admin')
                <ul class="nav nav-pills pb-2 flex-column">
                    <li class="nav-item">
                        <a href="{{ route('home') }}"
                            class="nav-link text-center text-sm-start text-white 
                    {{ Route::currentRouteName() == 'home' ? 'active' : '' }} ">
                            <i class="bi bi-house-door menu-icon"></i>
                            <span class="ms-2 d-none d-sm-inline">Home</span>
                            <br class="p-0 m-0 d-sm-none d-block">
                            <small class="m-0 p-0 d-sm-none d-sm-block">Home</small>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('student.index') }}"
                            class="nav-link text-center text-sm-start text-white
                    {{ Route::currentRouteName() == 'student.index' ? 'active' : '' }}">
                            <i class="bi bi-building menu-icon"></i>
                            <span class="ms-2 d-none d-sm-inline">Siswa</span>
                            <br class="d-sm-none d-inline">
                            <small class="m-0 p-0 d-sm-none d-sm-block">Siswa</small>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('score.index') }}"
                            class="nav-link text-center text-sm-start text-white
                    {{ Route::currentRouteName() == 'score.index' ? 'active' : '' }}">
                            <i class="bi bi-diagram-3 menu-icon"></i>
                            <span class="ms-2 d-none d-sm-inline">Nilai</span>
                            <br class="d-sm-none d-inline">
                            <small class="m-0 p-0 d-sm-none d-sm-block">Nilai</small>
                        </a>
                    </li>

                </ul>
            @break

            @case('user')
                <ul class="nav nav-pills pb-2 navbar-nav-scroll flex-column ">
                    <li class="nav-item">
                        <a href="{{ route('home') }}"
                            class="nav-link text-center text-sm-start text-white 
                    {{ Route::currentRouteName() == 'home' ? 'active' : '' }} ">
                            <i class="bi bi-house-door menu-icon"></i>
                            <span class="ms-2 d-none d-sm-inline">Home</span>
                            <br class="d-sm-none d-inline">
                            <small class="m-0 p-0 d-sm-none d-sm-block">Home</small>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('student.user') }}"
                            class="nav-link text-center text-sm-start text-white
                        {{ Route::currentRouteName() == 'student.user' ? 'active' : '' }}">
                            <i class="bi bi-check2-circle menu-icon"></i>
                            <span class="ms-2 d-none d-sm-inline">Verifikasi</span>
                            <br class="d-sm-none d-inline">
                            <small class="m-0 p-0 d-sm-none d-sm-block">Verifikasi</small>
                        </a>
                    </li>
                </ul>
            @break

            @default
        @endswitch
        <hr class="mb-1">
        <small class="d-block text-center pb-5 mb-4">versi 1.0.0</small>
    </div>
</aside>
