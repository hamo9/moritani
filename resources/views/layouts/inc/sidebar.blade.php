<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tiris</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item text-right {{ Request::is('/')? 'active' : ''; }}" >
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>الرئيسيه</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    

    <li class="nav-item text-right {{ Request::is('categories.index')? 'active' : ''; }}" >
        <a class="nav-link" href="{{ route('categories.index') }}">
          
            <span> الاقسام الرئيسيه</span>
        </a>
    </li>

    <li class="nav-item text-right {{ Request::is('subCategories.index')? 'active' : ''; }}" >
        <a class="nav-link" href="{{ route('subCategories.index') }}">
          
            <span>كل الاقسام الفرعيه</span>
        </a>
    </li>

    <li class="nav-item text-right {{ Request::is('posts.index')? 'active' : ''; }}" >
        <a class="nav-link" href="{{ route('posts.index') }}">
           
            <span>المقالات</span>
        </a>
    </li>

    <li class="nav-item text-right {{ Request::is('posts.softDelete')? 'active' : ''; }}" >
        <a class="nav-link" href="{{ route('posts.softDelete') }}">
           
            <span>المقالات المحزوفه</span>
        </a>
    </li>

    <li class="nav-item text-right {{ Request::is('Videos.index')? 'active' : ''; }}" >
        <a class="nav-link" href="{{ route('Videos.index') }}">
            
            <span> الفيديوهات</span>
        </a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
