<aside class="app-sidebar">
    @if(Auth::user()->image)
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" class="img-circle"
                                            src="{{asset('assets/images/user/'.Auth::user()->image)}}" alt="User Image">
            @else
                <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" class="img-circle"
                                                    src="{{asset('assets/images/user/no_user.png')}}"
                                                    alt="User Image">
                    @endif
                    <div>
                        <p class="app-sidebar__user-name">{{ Auth::user()->name }} </p>
                        <p class="app-sidebar__user-designation">{{ Auth::user()->username }}</p>
                    </div>
                </div>
                <ul class="app-menu">
                    <li><a class="app-menu__item @if(request()->path() == 'home') active @endif"
                           href="{{url('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span
                                class="app-menu__label">Dashboard</span></a></li>
                    <li class="treeview @if(request()->path() == 'vmware/require_classify' || request()->route()->getName() == 'vmware.require_classify') is-expanded
                            @elseif(request()->path() == 'vmware/require_classify') is-expanded
                            @elseif(request()->path() == 'vmware/require_classify') is-expanded
                            @elseif(request()->path() == 'vmware/require_classify') is-expanded
                            @elseif(request()->path() == 'vmware/require_classify') is-expanded
                            @endif">
                        <a class="app-menu__item" href="#" data-toggle="treeview"><i
                                class="app-menu__icon fa fa-user"></i><span
                                class="app-menu__label"> Virtual Machine Manage</span><i
                                class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li>
                                <a class="treeview-item @if(request()->path() == 'vmware/require_classify' || request()->route()->getName() == 'vmware.require_classify') active @endif"
                                   href="{{ route('vmware.require_classify')  }}"><i class="icon fa fa-users"></i>
                                    Requirement Classification
                                </a></li>
                            <li>
                                <a class="treeview-item @if(request()->path() == 'vmware/require_classify') active @endif"
                                   href="{{ route('vmware.require_classify')  }}"><i class="icon fa fa-check"></i>
                                    Sizing </a>
                            </li>
                            <li>
                                <a class="treeview-item @if(request()->path() == 'vmware/require_classify') active @endif"
                                   href="{{ route('vmware.require_classify')  }}"><i class="icon fa fa-ban"></i>Change Proposal </a>
                            </li>
                        </ul>
                    </li>
                </ul>
</aside>
