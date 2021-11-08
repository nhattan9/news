<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{route('admin.home')}}"><img src="{{asset('adminTemplate/demo/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item ">
                    <a href="{{route('admin.home')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub {{ (request()->routeIs('admin.categories.*')) ? 'active' :"" }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Danh mục</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('admin.categories.create')}}">Thêm Danh mục </a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('admin.categories.index')}}">Danh mục </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ (request()->routeIs('admin.myArticle')) ? 'active' :"" }}  ">
                    <a href="{{route('admin.myArticle')}}" class='sidebar-link'>
                        <i class="bi bi-newspaper"></i>
                        <span>Bài viết của tôi</span>
                    </a>
                </li>
                 <li class="sidebar-item  ">
                    <a href="{{route('admin.articles.format')}}" class='sidebar-link'>
                       <i class="bi bi-file-earmark-plus-fill"></i>
                        <span>Thêm bài viết </span>
                    </a>
                </li>

                <li class="sidebar-item {{ (request()->routeIs('admin.articles.*')) ? 'active' :"" }}  ">
                    <a href="{{route('admin.articles.index')}}" class='sidebar-link'>
                        <i class="bi bi-newspaper"></i>
                        <span>Bài viết</span>
                    </a>
                </li>

                <li class="sidebar-item {{ (request()->routeIs('admin.settings.*')) ? 'active' : '' }}  ">
                    <a href="{{route('admin.settings.index')}}" class='sidebar-link'>
                        <i class="bi bi-gear-fill"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <li class="sidebar-item {{ (request()->routeIs('admin.users.*')) ? 'active' : '' }}">
                    <a href="{{route('admin.users.index')}}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span> Users </span>
                    </a>
                    </li>

                    <li class="sidebar-item {{ (request()->routeIs('admin.roles.*')) ? 'active' : '' }}">
                        <a href="{{route('admin.roles.index')}}" class='sidebar-link'>
                        <i class="bi bi-app-indicator"></i>
                            <span> Vai trò (Roles) </span>
                        </a>
                   </li>

                   <li class="sidebar-item {{ (request()->routeIs('admin.permissions.*')) ? 'active' : '' }}">
                        <a href="{{route('admin.permissions.index')}}" class='sidebar-link'>
                            <i class="bi bi-brush-fill"></i>
                            <span> Permissions </span>
                        </a>
                   </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
