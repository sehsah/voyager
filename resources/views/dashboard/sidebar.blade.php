<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>
                </a>
            </div><!-- .navbar-header -->

        </div>
        <div id="adminmenu">
            <ul class="nav navbar-nav">
                @foreach(menu('admin', '_json') as $menu)
                <li class="{{ $menu->children->count() ? 'dropdown' : '' }}">
                    <a target="_self"  href={{ $menu->children->count() > 0 ?  "#$menu->id-dropdown-element" : $menu->href }} 
                        data-toggle="{{ $menu->children->count() > 0 ? 'collapse' : false }}"
                        aria-expanded="{{ $menu->children->count() > 0 ?  $menu->active : false }}">
                        <span class="icon {{ $menu->icon_class }}"></span> 
                        <span class="title"> {{ __( $menu->title) }}</span></span>
                    </a>
                    @if($menu->children->count() > 0)
                    <div id="{{$menu->id}}-dropdown-element" class="panel-collapse collapse  {{ $menu->active ? 'in' : '' }}">
                        <div class="panel-body">
                            <ul class="p-0" style="padding:0px;">
                                @foreach($menu->children as $submenu)
                                <li class="">
                                    <a target="_self" href=" href={{ $submenu->children->count() > 0 ?  "#$submenu->id-dropdown-element" : $submenu->href }}">
                                        <span class="icon {{ $submenu->icon_class }}"></span> 
                                        <span class="title"> {{ __( $submenu->title) }}</span></span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>       
                    @endif                                 
                </li>
                @endforeach
            </ul>
        </div>
    </nav>
</div>
