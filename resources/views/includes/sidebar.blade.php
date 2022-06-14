<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="back/img/profile.jpg" class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a>
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{(request()->is('dashboard*')) ? 'active' : ''}}">
                    <a href="{{ route('dashboard')}}">
                        <i class="fas fa-desktop"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{(request()->is('mahasiswa*')) ? 'active' : ''}}">
                    <a href="{{ route('mahasiswa.index')}}">
                        <i class="fas fa-user-graduate"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item {{(request()->is('gapmahasiswa*')) ? 'active' : ''}}">
                    <a href="{{ route('gapmahasiswa.index')}}">
                        <i class="fas fa-user-friends"></i>
                        <p>Gap Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item {{(request()->is('ranking*')) ? 'active' : ''}}">
                    <a href="{{ route('ranking.index')}}">
                        <i class="fas fa-trophy"></i>
                        <p>Ranking</p>
                    </a>
                </li>
                <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();"> <i class="fas fa-undo"></i><p>{{ __('Logout') }}</p></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->