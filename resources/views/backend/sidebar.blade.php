<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-text">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Categories</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                 {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="{{ route('category') }}">Main Categories</a>
                <a class="collapse-item" href="{{ route('sub_category') }}">Sub Categories</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('tag') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Tag</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.pages') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pages</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.posts') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Posts</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.photos') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Photos</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.photo_essays') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Photo Essays</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.videos') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Videos</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.cartoons') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Cartoons</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.socials') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Contact</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.users') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.menus') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Menus</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseSub"
            aria-expanded="true" aria-controls="collapseSub">
            <i class="fas fa-fw fa-cog"></i>
            <span>Subscribes</span>
        </a>
        <div id="collapseSub" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('backend.subscribers') }}">Subscribers</a>
                <a class="collapse-item" href="{{ route('backend.newsletters') }}">Newsletters</a>
            </div>
        </div>
    {{-- </li>
    <div class="sidebar-heading">
        Addons
    </div> --}}

</ul>
